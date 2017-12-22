<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubImage;
use DB;
use App\Product;
use Illuminate\Http\Request;

class FrontIndexController extends Controller
{

    public function homeIndex(){
        $products = Product::where('publication_status', 1)->orderBy('id', 'desc')->take(8)->get();

        return view('front.home.home-content',compact('products'));
    }

    public function productCategory($id){
        $products = Product::where('category_id', $id)->get();
        return view('front.category.category-content',compact('products'));
    }

    public function productDetails($id){

//        $product = Product::find($id);

        $product = DB::table('products')
            ->join('categories', 'products.category_id','=','categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->where('products.id', $id)
            ->first();
//        dd($product);

        $subImages = SubImage::where('product_id', $id)->get();

        $latestProducts = Product::where('publication_status', 1)
            ->orderBy('id','desc')
            ->take(5)
            ->get();

        $categoryProducts = Product::where('category_id', $product->category_id)
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        return view('front.product.product-details-content',[
            'product' => $product,
            'subImages' => $subImages,
            'latestProducts' => $latestProducts,
            'categoryProducts' => $categoryProducts
        ]);
    }





    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
