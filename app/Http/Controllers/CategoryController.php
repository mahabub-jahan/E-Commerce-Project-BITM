<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function addCategoryInfo()
    {
        return view('admin.category.add-category');
    }


    public function saveCategoryInfo(Request $request)
    {
        /* $category = new Category();
         $category->category_name = $request->category_name;
         $category->category_description = $request->category_description;
         $category->publication_status = $request->publication_status;
         $category->save();*/

//        Category::create($request->all());


        \DB::table('categories')->insert([
            'category_name' => $request->category_name,
            'category_description'=> $request->category_description,
            'publication_status' => $request->publication_status,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        return redirect('/category/manage-category')->with('message','Category info add successfully');
    }


    public function manageCategoryInfo(){
//        $categories = Category::all();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.manage-category',compact('categories'));
    }

    public function unpublishedCategoryInfo($data){
        $categoryById = Category::find($data);
        $categoryById->publication_status = 0;
        $categoryById->save();

        return redirect('/category/manage-category')->with('message','Category info unpublished');


    }

    public function publishedCategoryInfo($data){
        $categoryById = Category::find($data);
        $categoryById->publication_status = 1;
        $categoryById->save();

        return redirect('/category/manage-category')->with('message','Category info published');


    }


    public function editCategoryInfo($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit-category',compact('category'));
    }


    public function updateCategoryInfo(Request $request, $id){
        $categoryById = Category::find($id);
        $categoryById->category_name = $request->category_name;
        $categoryById->category_description = $request->category_description;
        $categoryById->publication_status = $request->publication_status;
        $categoryById->save();
        return redirect('/category/manage-category')->with('message','Category Update Successfully');
    }

    public function deleteCategoryInfo($id)
    {
        $categoryById = Category::find($id);
        $categoryById->delete();
        return redirect('/category/manage-category')->with('destroy','Category Delete Successfully');
    }
}
