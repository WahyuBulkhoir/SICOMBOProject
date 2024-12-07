<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Meeting;
use App\Models\CandidatePikrMember;
use App\Models\PikrMember;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductSeller;
use Carbon\Carbon;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superadmin.index');
    }

    public function transaction_history()
    {
        $totalOrders = Order::count();
        $codOrders = Order::where('payment_status', 'cash on delivery')->count();
        $stripeOrders = Order::where('payment_status', 'paid')->count();
        $codPercentage = $totalOrders > 0 ? round(($codOrders / $totalOrders) * 100, 2) : 0;
        $stripePercentage = $totalOrders > 0 ? round(($stripeOrders / $totalOrders) * 100, 2) : 0;
        $totalCustomers = Order::distinct('user_id')->count('user_id');

        return view('superadmin.transaction_history', [
            'codOrders' => $codOrders,
            'stripeOrders' => $stripeOrders,
            'codPercentage' => $codPercentage,
            'stripePercentage' => $stripePercentage,
            'totalCustomers' => $totalCustomers,
        ]);
    }

    public function add_event()
    {
        $event =  Event::all();
        return view('superadmin.add_event',compact('event'));
    }

    public function store_event(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);
        Event::create($validated);
        toastr()->timeOut(5000)->closeButton()->addSuccess('Event berhasil ditambahkan.');
        return redirect()->back();
    }

    public function view_events()
    {
        $events = Event::orderBy('created_at','desc')->get();
        return view('superadmin.view_event', compact('events'));
    }

    public function edit_event($id)
    {
        $data = Event::findOrFail($id);
        return view('superadmin.edit_event', compact('data'));
    }

    public function update_event(Request $request, $id)
    {
        $data = Event::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);
        $data->update($request->only(['title', 'description', 'date', 'location'
        ]));
        toastr()->timeOut(5000)->closeButton()->addSuccess('Event berhasil diperbarui.');
        return redirect('/view_events');
    }

    public function delete_event($id)
    {
         $data = Event::find($id);
         $data->delete();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Event berhasil dihapus.');
         return redirect()->back();
    }

    public function add_meeting()
    {
        $meetings = Meeting::orderBy('created_at','desc')->get();
        return view('superadmin.add_meeting', compact('meetings'));
    }

    public function store_meeting(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
        Meeting::create($validated);
        toastr()->timeOut(5000)->closeButton()->addSuccess('Pertemuan berhasil ditambahkan.');
        return redirect()->back();
    }

    public function view_meetings()
    {
        $meetings = Meeting::all();
        return view('superadmin.view_meeting', compact('meetings'));
    }

    public function edit_meeting($id)
    {
        $data = Meeting::findOrFail($id);
        return view('superadmin.edit_meeting', compact('data'));
    }

    public function update_meeting(Request $request, $id)
    {
        $data = Meeting::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
        $data->update($request->only([
            'title', 'description', 'date', 'location', 'start_time', 'end_time'
        ]));
        toastr()->timeOut(5000)->closeButton()->addSuccess('Pertemuan berhasil diperbarui.');
        return redirect('/view_meetings');
    }

    public function delete_meeting($id)
    {
        $data = Meeting::findOrFail($id);
        $data->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Pertemuan berhasil dihapus.');
        return redirect()->back();
    }

    public function viewCandidateMembers()
    {
        $candidates = CandidatePikrMember::orderBy('name', 'asc')->get();
        return view('superadmin.candidate_member', compact('candidates'));
    }

    public function delete_candidate($id)
    {
         $data = CandidatePikrMember::find($id);
         $data->delete();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Calon anggota berhasil dihapus.');
         return redirect()->back();
    }

    public function add_member(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pikr_members,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);
        PikrMember::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        toastr()->timeOut(5000)->closeButton()->addSuccess('Anggota berhasil ditambahkan.');
        return redirect()->back();
    }

    public function showAddMember()
    {
        return view('superadmin.add_member');
    }

    public function viewMembers()
    {
        $members = PikrMember::orderBy('name', 'asc')->get();
        $totalMembers = $members->count();
        return view('superadmin.view_member', compact('members', 'totalMembers'));
    }

    public function edit_member($id)
    {
        $data = PikrMember::findOrFail($id);
        return view('superadmin.edit_member', compact('data'));
    }

    public function update_member(Request $request, $id)
    {
        $data = PikrMember::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pikr_members,email,' . $id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);
        $data->update($request->only([
            'name', 'email', 'phone', 'address', 'jenis_kelamin'
        ]));
        toastr()->timeOut(5000)->closeButton()->addSuccess('Data anggota berhasil diperbarui.');
        return redirect('/view_members');
    }

    public function delete_member($id)
    {
        $data = PikrMember::findOrFail($id);
        $data->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Anggota berhasil dihapus.');
        return redirect()->back();
    }

    public function view_seller()
    {
        $sellers = User::whereIn('usertype', ['admin'])->get();
        $totalSellers = $sellers->count();
        return view('superadmin.view_seller', compact('sellers'));
    }

    public function view_product_byseller($id)
    {
        $product_seller = User::findOrFail($id);
        $products = Product::where('seller_id', $id)->orderBy('created_at', 'desc')->get();
        $totalProducts = Product::count(); 
        if ($products->isEmpty()) {
            return view('superadmin.view_product_byseller', [
                'product_seller' => $product_seller,
                'products' => [],
                'message' => 'Tidak ada produk pada seller ini.'
            ]);
        }
        return view('superadmin.view_product_byseller', compact('product_seller', 'products'));
    }

    public function export_seller_product($id)
    {
        return Excel::download(new ProductSeller($id), 'seller_products.xlsx');
    }

    public function edit_seller($id)
    {
        $seller = User::where('id', $id)->where('usertype', 'admin')->first();
        if (!$seller) {
            return redirect()->back()->with('error', 'Seller not found or not an admin.');
        }
        return view('superadmin.edit_seller', compact('seller'));
    }

    public function update_seller(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);
        $seller = User::where('id', $id)->where('usertype', 'admin')->first();
        if (!$seller) {
            return redirect()->back()->with('error', 'Seller tidak ditemukan.');
        }
        $seller->name = $request->input('name');
        $seller->email = $request->input('email');
        $seller->phone = $request->input('phone');
        $seller->address = $request->input('address');
        $seller->save();
        return redirect('view_seller')->with('success', 'Seller berhasil diperbarui.');
    }

    public function delete_seller($id)
    {
        $seller = User::where('id', $id)->where('usertype', 'admin')->first();
        $seller->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Seller berhasil dihapus.');
        return redirect()->back();
    }

    public function add_seller(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
        ], [
            'email.unique' => 'Email sudah digunakan oleh pengguna lain.',
            'email.email' => 'Format email tidak valid.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password,
            'email_verified_at' => Carbon::now(),
            'usertype' => 'admin',
        ]);
        toastr()->timeOut(5000)->closeButton()->addSuccess('Seller berhasil ditambahkan.');
        return redirect()->back();
    }

    public function showAddSeller()
    {
        return view('superadmin.add_seller');
    }
}

