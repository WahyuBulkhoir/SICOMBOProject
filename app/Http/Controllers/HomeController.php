<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use App\Models\Event;
use App\Models\Meeting;
use App\Models\CandidatePikrMember;
use App\Models\Testimonial;
use Stripe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home()
    {
        $product = Product::orderBy('created_at', 'desc')->take(12)->get();
        $count = '';
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }
        return view('home.index', compact('product', 'count'));
    }

    public function login_home()
    {
        $product = Product::orderBy('created_at', 'desc')->get();
        if (Auth::id()) 
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = '';
        }
        return view('home.index',compact('product','count'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);
        $isOutOfStock = $data->quantity == 0;
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
        return view('home.product_details', compact('data', 'count', 'isOutOfStock'));
    }

    public function add_cart($id)
    {
        $product = Product::find($id);
        if (!$product || $product->quantity <= 0) {
            toastr()->error('Produk ini sudah habis.');
            return redirect()->back();
        }
        $user = Auth::user();
        $user_id = $user->id;
        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->product_id = $product->id;
        $cart->save();
        toastr()->success('Produk berhasil ditambahkan ke keranjang.');
        return redirect()->back();
    }

    public function mycart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)
                        ->orderBy('created_at', 'desc')
                        ->get();
        }
        return view('home.mycart', compact('count', 'cart'));
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        if ($cart && $cart->user_id == Auth::id()) 
        {
            $cart->delete();
            toastr()->timeOut(5000)->closeButton()->addSuccess('Produk berhasil dihapus dari keranjang.');
        } 
        else 
        {
            toastr()->timeOut(5000)->closeButton()->addError('Gagal menghapus produk.');
        }
        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|min:12|max:15',
        ]);
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();
        foreach ($cart as $carts) {
            $product = Product::find($carts->product_id);
            if (!$product || $product->quantity <= 0) {
                toastr()->error('Stok produk "' . $product->title . '" habis.');
                continue;
            }
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $product->id;
            $order->save();
            $product->quantity -= 1;
            $product->save();
        }
        Cart::where('user_id', $userid)->delete();
        toastr()->success('Pemesanan berhasil dilakukan.');
        return redirect()->back();
    }

    public function myorders()
    {
        $user = Auth::user()->id;
        $count = Order::where('user_id', $user)->get()->count();
        $order = Order::where('user_id', $user)
                    ->orderBy('created_at', 'desc')
                    ->get();
        return view('home.order', compact('count', 'order'));
    }

    public function stripe($value)
    {
        return view('home.stripe',compact('value'));
    }

    public function stripePost(Request $request, $value)
    {
        $max_amount = 999999999999;
        if ($value * 100 > $max_amount) {
            toastr()->timeOut(5000)->closeButton()->addSuccess('Jumlah pembayaran melebihi batas yang diizinkan.');
            return redirect()->back();
        }
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $value * 100,
            "currency" => "idr",
            "source" => $request->stripeToken,
            "description" => "Tes pembayaran berhasil dilakukan"
        ]);
        $name = Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()->address;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();
        foreach ($cart as $carts) {
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->payment_status = "paid";
            $order->save();
            $product = Product::find($carts->product_id);
            if ($product && $product->quantity > 0) {
                $product->quantity -= 1;
                $product->save();
            }
        }
        $cart_remove = Cart::where('user_id', $userid)->get();
        foreach ($cart_remove as $remove) {
            $data = Cart::find($remove->id);
            $data->delete();
        }
        toastr()->timeOut(5000)->closeButton()->addSuccess('Pemesanan berhasil dilakukan.');
        return redirect('mycart');
    }

    public function shop()
    {
        $product = Product::orderBy('created_at', 'desc')->get();
        $categories = Category::orderBy('category_name', 'asc')->get();
        if (Auth::id()) 
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }
        return view('home.shop', compact('product', 'categories', 'count'));
    }

    public function search_shop(Request $request)
    {
        $search = $request->search;
        $selectedCategory = $request->category;
        $keywords = explode(' ', $search);
        $query = Product::query();
        $query->where(function($q) use ($keywords) {
            foreach ($keywords as $keyword) {
                $q->orWhere('title', 'LIKE', '%'.$keyword.'%');
            }
        });
        if ($selectedCategory) {
            $query->where('category', $selectedCategory);
        }
        $product = $query->paginate(10);
        if (Auth::id()) 
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }
        $categories = Category::orderBy('category_name', 'asc')->get();
        return view('home.shop', compact('product', 'count', 'categories'));
    }

    public function registerCandidatePikrMember(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:candidate_pikr_members,email',
            'phone' => 'required|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048'
        ], [
            'email.unique' => 'Email ini sudah terdaftar. Silakan gunakan alamat email yang berbeda.'
        ]);
        $cvPath = null;
        if ($request->hasFile('cv')) {
            $extension = $request->file('cv')->getClientOriginalExtension();
            $cvFileName = str_replace(' ', '_', $request->name) . '_CV.' . $extension;
            $cvPath = $request->file('cv')->storeAs('cv_uploads', $cvFileName, 'public');
        }
        CandidatePikrMember::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'jenis_kelamin' => $request->jenis_kelamin,
            'cv' => $cvPath
        ]);
        toastr()->timeOut(5000)->closeButton()->addSuccess(
            'Kamu berhasil daftar sebagai calon anggota PIK-R <br> Tunggu info selanjutnya ya.'
        );
        return redirect()->back();
    }

    public function testimonial()
    {
        $count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;
        $testimonials = Testimonial::with('user')->latest()->get();
        return view('home.testimonial', compact('count', 'testimonials'));
    }

    public function view_testimonial(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        Testimonial::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);
        toastr()->timeOut(5000)->closeButton()->addSuccess(
            'Testimoni berhasil ditambahkan.'
        );
        return redirect()->back();
    }

    public function contact()
    {
        if (Auth::id()) 
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = '';
        }     
        return view('home.contact',compact('count'));
    }

    public function about()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        $meetings = Meeting::orderBy('created_at', 'desc')->get();
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
        return view('home.about', compact('events', 'meetings', 'count'));
    }

    public function edit_profile_customer()
    {
        $user = Auth::user();
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
        return view('home.edit_profile_customer', compact('user', 'count'));
    }

    public function update_profile_customer(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ], [
            'email.unique' => 'Email sudah digunakan oleh pengguna lain.',
        ]);
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        toastr()->timeOut(5000)->closeButton()->addSuccess(
            'Kamu telah berhasil memperbarui profil'
        );
        return redirect()->back();
    }

    public function sendMessage(Request $request)
    {
        $userEmail = Auth::check() ? Auth::user()->email : $request->input('email');
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => Auth::check() ? 'nullable' : 'required|email',
            'phone' => 'required',
            'description' => 'required|string',
        ]);
        $data = [
            'name' => $request->input('name'),
            'email' => $userEmail,
            'phone' => $request->input('phone'),
            'description' => $request->input('description'),
        ];
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new \App\Mail\ContactFormMail($data));
        toastr()->timeOut(5000)->closeButton()->addSuccess(
            'Pesan kamu berhasil dikirim'
        );
        return redirect()->back();
    }
}
