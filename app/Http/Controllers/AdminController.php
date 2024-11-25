<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{

    public function view_category()
    {
        $data = Category::all();

        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Category Added Successsfully');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        toastr()->timeOut(5000)->closeButton()->addWarning('Category Deleted Successsfully');

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request,$id)
    {
        $data = Category::find($id);

        $data->category_name=$request->category;

        $data->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Category Updated Successsfully');

        return redirect('/view_category');
    }

    public function add_product()
    {
        $category =  Category::all();

        return view('admin.add_product',compact('category'));
    }

    public function upload_product(Request $request)
    {
        $product = new Product();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->qty;
        $product->category = $request->category;
        $product->seller_id = auth()->id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('products', $imagename);
            $product->image = $imagename;
        }

        $product->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Product Added Successfully');
        return redirect('/view_product');
    }

    public function view_product()
    {
        $user = auth()->user();
        $product = Product::where('seller_id', $user->id)->paginate(5);

        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id)
    {
         $data = Product::find($id);

         $image_path = public_path('products/'.$data->image);

         if (file_exists($image_path))
         {
            unlink($image_path);
         }

         $data->delete();

         toastr()->timeOut(5000)->closeButton()->addSuccess('Product Deleted Successsfully');

         return redirect()->back();
    }

    public function update_product($slug)
    {
        $data = Product::where('slug',$slug)->get()->first();

        $category= Category::all();

        return view('admin.update_page',compact('data','category'));
    }

    public function edit_product(Request $request,$id)
    {
        $data = Product::find($id);

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->quantity;

        $data->category = $request->category;

        $image = $request->image;

        if ($image) 
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $data->image = $imagename;
        }

        $data->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Product Updated Successsfully');

        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;
        $user = auth()->user();

        $product = Product::where('seller_id', $user->id)
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('category', 'LIKE', '%' . $search . '%');
            })
            ->paginate(5);

        return view('admin.view_product', compact('product'));
    }


    public function view_orders()
    {
        $user = auth()->user();
        $data = Order::whereHas('product', function($query) use ($user) {
            $query->where('seller_id', $user->id);
        })->get();

        return view('admin.order', compact('data'));
    }

    public function on_the_way($id)
    {

        $data = Order::find($id);

        $data->status = 'On the way';

        $data->save();

        return redirect('/view_orders');
    }

    public function delivered($id)
    {

        $data = Order::find($id);

        $data->status = 'Delivered';

        $data->save();

        return redirect('/view_orders');
    }

    public function print_pdf($id)
    {
        $data = Order::find($id);

        $pdf = Pdf::loadView('admin.invoice',compact('data'));

        return $pdf->download('invoice.pdf');

    }
}
