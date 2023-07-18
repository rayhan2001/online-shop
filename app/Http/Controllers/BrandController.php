<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
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
            'brand_name' => 'required',
            'slug' => 'required',
        ], [
            'brand_name.required' => 'This filed is required!',
            'slug.required' => 'This filed is required!',
        ]);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->slug = $this->makeSlug($request);
        $brand->save();

        return response()->json(['status'=>200]);
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
        $brand = Brand::find($id);
        return view('admin.brands.edit',compact('brand'));
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
        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->status = $request->status;
        $brand->slug = $this->makeSlug($request);
        $brand->save();

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

        $brand = Brand::find($id);
        $brand->delete();
        return response()->json([
            'status'=>200
        ]);
    }
    public function status($id){
        $brand = Brand::find($id);
        if ($brand->status == 1) {
            $brand->status = 0;
        } else {
            $brand->status = 1;
        }
        $brand->save();

        return response()->json([
            'status'=>200
        ]);
    }
}
