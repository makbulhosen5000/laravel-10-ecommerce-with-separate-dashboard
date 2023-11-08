<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $data['brands'] = Brand::all();

        return view('admin.pages.brand.view-brand',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.brand.create-brand');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:brands|max:255',
            'image' => 'required',
        ]);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($brand->name);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $newImage=time().'.'.$extension;
            $file->move('public/images/brand/',$newImage);
            $brand->image=$newImage;
        }else{
            return $request;
            $brand->image='';
        }
        $brand->save();
        Session::flash('success','Brand Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $Brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brandId = Brand::find($id);
        return view('admin.pages.brand.edit-brand', compact('brandId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'required',
        ]);
        $brand=Brand::find($id);
        $brand->name=$request->name;
        $brand->slug = Str::slug($brand->name);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $newImage=time().'.'.$extension;
            $file->move('public/images/brand/',$newImage);
            $brand->image=$newImage;
        }else{
            return $request;
            $brand->image='';
        }
        $brand->update();
        Session::flash('success','Brand Updated successfully');
         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand,$id)
    {
        $deleteData=Brand::find($id);
        if(file_exists('public/images/brand/'.$deleteData->image)AND ! empty($deleteData->image))
        {
         unlink('public/images/brand/'.$deleteData->image);
        }
        $deleteData->delete();
       return redirect()->route('view.brand');
    }
}
