<?php

namespace App\Http\Controllers;

use App\Models\notif;
use App\Models\product;
use App\Models\user;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        //
        // $zoz =user::findorfail(1);
        // $zoz->comments[0]->name;

        // $zoz =user::findorfail($request->user_id);
        // $we = $zoz->name;
        ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $products =new product();
        $products->name =$request->name;
        $products->dis =$request->dis;
        $products->price =$request->price;
        $products->type =$request->type;

        $products->user_id =$request->user_id;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = public_path('img/');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move($path, $imageName);


        $products->image = $imageName;

        $products->save();
        $zoz =user::findorfail($request->user_id);
        $we = $zoz->name;

        return redirect()->route('dashboard')->with('created','سيتم عرض المنتج على الادمن للتاكد من البيانات');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
        $products =product::all();
        return view('welcome',["products"=>$products]);

    }
    public function view1(product $product)
    {
        //
        $products =product::all();
        return view("products.computer",["products"=>$products]);

    }
    public function view2(product $product)
    {
        //
        $products =product::all();
        return view("products.computertool",["products"=>$products]);

    }
    public function view3(product $product)
    {
        //
        $products =product::all();
        return view("products.printer",["products"=>$products]);

    }
    public function view4(product $product)
    {
        //
        $products =product::all();
        return view("products.camera",["products"=>$products]);

    }
    public function view5(product $product)
    {
        //

        $products =product::all();
        return view("products.network",["products"=>$products]);

    }
    public function view6(product $product)
    {
        //

        $products =product::all();
        return view("products.bag",["products"=>$products]);

    }
    public function view7(product $product)
    {
        //

        $products =product::all();
        return view("products.game",["products"=>$products]);

    }
    public function prof(product $product)
    {
        //

        $products =product::all();
        return view('users.prof',["products"=>$products]);

    }
    public function view8(product $product)
    {
        //

        $products =product::all();
        return view("products.projector",["products"=>$products]);

    }
    public function prod3(product $product)
    {
        //

        $products =product::all();
        return view("cat.printer",["products"=>$products]);

    }
    public function prod1(product $product)
    {
        //


        $products =product::all();
        return view("cat.computer",["products"=>$products]);

    }public function prod2(product $product)
    {
        //

        $products =product::all();
        return view("cat.computertool",["products"=>$products]);

    }public function prod4(product $product)
    {
        //

        $products =product::all();
        return view("cat.camera",["products"=>$products]);

    }public function prod5(product $product)
    {
        //

        $products =product::all();
        return view("cat.network",["products"=>$products]);

    }public function prod6(product $product)
    {
        //

        $products =product::all();
        return view("cat.projector",["products"=>$products]);

    }public function prod7(product $product)
    {
        //

        $products =product::all();
        return view("cat.game",["products"=>$products]);

    }public function prod8(product $product)
    {
        //

        $products =product::all();
        return view("cat.bag",["products"=>$products]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product , $id)
    {
        //
        $products=product::findorfail($id);
        return view('products.edit' ,["products"=>$products]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product,$id)
    {
        //
        $products =product::findorfail($id);
        $products->name =$request->name;
        $products->dis =$request->dis;
        $products->price =$request->price;
        $products->allaw =$request->allaw;
        $products->type =$request->type;
        $products->save();


         return redirect()->route('computer')->with('update','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product ,$id)
    {
        //
        $products =product::findorfail($id)->delete();

        return redirect()->route('dashboard')->with('delete','تم الحذف بنجاح');
    }
    public function test($id)
    {
        //
        $products =product::findorfail($id);
        return view('shopping_cart',["products"=>$products]);
    }
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->search;

        // Search in the title and body columns from the posts table
        $products = product::query()
            ->where('dis', 'LIKE', "%{$search}%")

            ->get();


        // Return the search view with the resluts compacted
        return view('details', ["products" => $products]);
    }
}
