<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use App\Models\Event;
use App\Models\Meeting;
use App\Models\CandidatePikrMember;
use Stripe;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index()
    {
        $user = User::where('usertype', 'user')->count();
        $sellerId = auth()->id();
        $totalCustomers = Order::whereHas('product', function ($query) use ($sellerId) {
            $query->where('seller_id', $sellerId);
        })->distinct('user_id')->count('user_id');
        $totalProducts = Product::where('seller_id', $sellerId)->count();
        $totalOrders = Order::whereHas('product', function ($query) use ($sellerId) {
            $query->where('seller_id', $sellerId);
        })->count();
        $deliveredOrders = Order::where('status', 'Delivered')
            ->whereHas('product', function ($query) use ($sellerId) {
                $query->where('seller_id', $sellerId);
            })->count();
        return view('admin.index', compact('user', 'totalCustomers', 'totalProducts', 'totalOrders', 'deliveredOrders'));
    }

    public function home()
    {
        $product = Product::orderBy('created_at', 'desc')->get();
        $count = '';
        if (Auth::check())
        {
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
        return view('home.testimonial',compact('count'));
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

    public function edit_profile()
    {
        $user = Auth::user();
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
        return view('home.edit_profile', compact('user', 'count'));
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);
        $user = Auth::user();
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
}
