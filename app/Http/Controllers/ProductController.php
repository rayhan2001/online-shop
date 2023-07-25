<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_cat_id')->get();
        $brands = Brand::where('status',1)->get();
        return view('admin.products.create',compact('categories','brands'));
    }
    public function getSubCategory($cat_id)
    {
        $subcat_id = Category::find($cat_id)->child;
        return response()->json($subcat_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $validator = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'sku' => 'required',
            'price' => 'required|numeric',
            'track_quantity' => 'required',
            'cat_id' => 'required',
            'subcat_id' => 'required',
            'brand_id' => 'required',
            'featured_product' => 'required',
        ], [
            'title.required' => 'This filed is required!',
            'slug.required' => 'This filed is required!',
            'sku.required' => 'This filed is required!',
            'price.required' => 'This filed is required!',
            'track_quantity.required' => 'This filed is required!',
            'cat_id.required' => 'This filed is required!',
            'subcat_id.required' => 'This filed is required!',
            'brand_id.required' => 'This filed is required!',
            'featured_product.required' => 'This filed is required!',
        ]);

        $product = new Product();
        $product->cat_id = $request->cat_id;
        $product->sub_cat_id = $request->subcat_id;
        $product->brand_id = $request->brand_id;
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->sku = $request->sku;
        $product->barcode = $request->barcode;
        $product->featured_product = $request->featured_product;
        $product->track_quantity = $request->track_quantity;
        $product->price = $request->price;
        $product->compare_price = $request->compare_price;
//        $product->image = $request->$this->saveImage(Request, $request);
        $product->description = $request->description;
        $product->status = $request->status;
        $images = array();
        $files = $request->file('product_images');
        if (!empty($files)){
            foreach ($files as $file){
                $imageName = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $imageFullName = $imageName.'.'.$ext;
                $dir = 'upload/product_image/';
                $imageUrl=$dir.$imageFullName;
                $file->move($dir,$imageFullName);
                $images[]=$imageUrl;
            }
            $product['image']=implode("|",$images);
        }
        $product->save();

        return response()->json(['status'=>200]);
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
