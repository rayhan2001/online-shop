<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('parent')->get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_cat_id')->get();
        return view('admin.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'category_name' => 'required',
            'slug' => 'required',
        ], [
            'category_name.required' => 'This filed is required!',
            'slug.required' => 'This filed is required!',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->parent_cat_id = $request->parent_cat_id;
        $category->slug = $this->makeSlug($request);
        $category->image = $this->saveImage($request);
        $category->save();

        return response()->json(['status'=>200]);
    }
    public function saveImage(Request $request){
        $image =$request->file('image');
        $imageName =rand().'.'.$image->getClientOriginalExtension();
        $path ='upload/category/';
        $imageUrl = $path.$imageName;
        $image->move($path,$imageName);
        return $imageUrl;
    }
    public function makeSlug($request){
        if ($request->slug){
            $str = $request->slug;
            return preg_replace('/\s+/u','-',trim($str));
        }
        $str =$request->title;
        return preg_replace('/\s+/u','-',trim($str));
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
        $category = Category::find($id);
        $categories = Category::whereNull('parent_cat_id')->get();
        return view('admin.category.edit',compact('category','categories'));
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
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->parent_cat_id = $request->parent_cat_id;
        $category->status = $request->status;
        $category->slug = $this->makeSlug($request);
        $category->image = $this->saveImage($request);
        $category->save();

        return response()->json(['status'=>200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->image){
            unlink($category->image);
        }
        $category->delete();
        return response()->json([
            'status'=>200
        ]);
    }
    public function status($id){
        $category = Category::find($id);
        if ($category->status == 1) {
            $category->status = 0;
        } else {
            $category->status = 1;
        }
        $category->save();

        return response()->json([
            'status'=>200
        ]);
    }
}
