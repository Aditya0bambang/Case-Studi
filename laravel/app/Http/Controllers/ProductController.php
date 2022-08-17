<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product=Product::all();
        // error_log(print_r($product, TRUE));
        // file_put_contents('php://stderr', print_r($product, TRUE)); 
        // echo("$product");
        // return view("index", ["title"=>"index", "products"=>Product::all()]);
        return view("index", ["title"=>"index", "products"=>Product::with("Product_Asset.asset")->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("form", ["title"=>"Create", "categories"=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => "required",
            'price' => "required",
            'description' => "required"
        ]);
        // return $request;
        Product::create($validatedData);
        return redirect("/index")->with('success', "new product added");
        // return view("index", ["title"=>"index", "products"=>Product::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // $product = DB::table('products')->where('product_slug', $product)->first();
        // error_log(print_r($product, TRUE));
        // file_put_contents('php://stderr', print_r($product, TRUE)); 
        // echo("$product");
        // $name=$product["product_name"];
        $product->load("Product_Asset.asset");
        return view('detail', ["title"=>$product["product_name"], "product"=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('edit',["title"=>"update", "product"=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect("/index")->with('delete', "a product is deleted");
    }
}
