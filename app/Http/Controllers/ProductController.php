<?php

namespace App\Http\Controllers;
use App\SubImage;
use Image;
use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function showProductForm()
    {
        $publicationCagegories = Category::where('publication_status', 1)->get();
        $publicationBrands = Brand::where('publication_status', 1)->get();
        return view('admin.product.add-product',compact('publicationCagegories','publicationBrands'));
    }

    public function saveProductInfo(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required'
        ]);

        // return $request->all();
        // resizing an uploaded file

        $productImage = $request->file('product_image');
        $uniqueName = substr(md5(time()),'0','10');
        $uniqueImageName = $uniqueName.'.'.$productImage->getClientOriginalExtension();
        $directory = 'product-images/';
        $imageUrl = $directory.$uniqueImageName;
        // $productImage->move($directory.$uniqueImageName);
        Image::make($productImage)->save($imageUrl);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->publication_status = $request->publication_status;
        $product->product_image = $imageUrl;
        $product->save();
        $productId = $product->id; // when $product->save() work, it create a new id and row in database and this imidiate row id take it

        $subImages = $request->file('sub_image');
        foreach ($subImages as $subImage) {
            $uniqueSubName = substr(md5(random_int(1,10000)),'0','10');
            $subUniqueImageName =$uniqueSubName.'.'.$subImage->getClientOriginalExtension();
            $subImagedirectory = 'sub-images/';
            $subImageUrl = $subImagedirectory.$subUniqueImageName;
            Image::make($subImage)->save($subImageUrl);

            $subImage = new SubImage();
            $subImage->product_id = $productId;
            $subImage->sub_image = $subImageUrl;
            $subImage->save();
        }
        return redirect('/product/add-product')->with('message', 'Product info create successfully');


    }


    public function manageProductInfo()
    {
        return view('admin.product.manage-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
