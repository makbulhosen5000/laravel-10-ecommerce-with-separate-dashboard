<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MultipleImage;
use Illuminate\Http\Request;
use Session;
class MultipleImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function multipleImageCreate()
    {
         return view('admin.pages.product.multiple-image');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function multipleImageStore(Request $request)
    {
        dd($request->all());
        $image = $request->file('images');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('public/images/product'),$imageName);       
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
