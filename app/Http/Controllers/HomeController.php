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

use App\Models\PikrMember;

use Session;

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
        $product = Product::all();

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

    public function login_home()
    {
        $product = Product::all();

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

        return view('home.product_details',compact('data','count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Product Added to The Cart Successsfully');

        return redirect()->back();
    }

    public function mycart()
    {
        if (Auth::id()) 
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }

        return view('home.mycart',compact('count','cart'));
    }

    public function remove_cart($id)
    {

        $cart = Cart::find($id);

        if ($cart && $cart->user_id == Auth::id()) 
        {
            
            $cart->delete();

            toastr()->timeOut(5000)->closeButton()->addSuccess('Product removed from the cart successfully.');
        } 

        else 

        {
            toastr()->timeOut(5000)->closeButton()->addError('Failed to remove product.');
        }

        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;

        $address = $request->address;

        $phone = $request->phone;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id',$userid)->get();

        foreach ($cart as $carts) 
        {
            $order = new Order;

            $order->name = $name;

            $order->rec_address = $address;

            $order->phone = $phone;

            $order->user_id = $userid;

            $order->product_id = $carts->product_id;

            $order->save();            
        }

        $cart_remove = Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);

            $data->delete();
        }

        toastr()->timeOut(5000)->closeButton()->addSuccess('Order placed successfully.');

        return redirect()->back();
        
    }

    public function myorders()
    {
        $user = Auth::user()->id;

        $count = Order::where('user_id',$user)->get()->count();

        $order = Order::where('user_id',$user)->get();

        return view('home.order',compact('count','order'));
    }

    public function stripe($value)
    {
        return view('home.stripe',compact('value'));
    }

    public function stripePost(Request $request,$value)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "idr",
                "source" => $request->stripeToken,
                "description" => "Test payment from complete" 
        ]);

        $name = Auth::user()->name;

        $phone = Auth::user()->phone;

        $address = Auth::user()->address;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id',$userid)->get();

        foreach ($cart as $carts) 
        {
            $order = new Order;

            $order->name = $name;

            $order->rec_address = $address;

            $order->phone = $phone;

            $order->user_id = $userid;

            $order->product_id = $carts->product_id;

            $order->payment_status = "paid";

            $order->save();            
        }

        $cart_remove = Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);

            $data->delete();
        }

        toastr()->timeOut(5000)->closeButton()->addSuccess('Order placed successfully.');

        return redirect('mycart');
    }

    public function shop()
    {
        $product = Product::all();
        $categories = Category::all();

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

        $categories = Category::all();

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
            'email.unique' => 'This email is already registered. Please use a different email address.'
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
            'You have successfully registered as a PIK-R member! <br> Wait for the next info'
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
        $events = Event::all();

        $meetings = Meeting::all();

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
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        // Menampilkan view dengan data pengguna
        return view('home.edit_profile', compact('user', 'count'));
    }

    // Memperbarui Profil Pengguna
    public function update_profile(Request $request)
    {
        // Validasi input untuk name, phone, address, dan email
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Update data pengguna
        $user->update([
            'profile_picture' => $request->profile_picture,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        toastr()->timeOut(5000)->closeButton()->addSuccess(
            'You have successfully edit your profile'
        );

        return redirect()->back();
    }
    
}
