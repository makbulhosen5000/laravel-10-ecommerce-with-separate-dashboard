<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $data['products'] = Product::all();
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();

        return view('admin.pages.product.view-product',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        return view('admin.pages.product.create-product',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|max:255',
            'price'                 => 'required|numeric',
            'discount'              => 'nullable',
            'thumbnail'             => 'required',
            'category_id'           => 'required|exists:categories,id',
            'stock'                 => 'required',
            'status'                => 'boolean',
            'image'                 => 'required|image|mimes:jpeg,png,jpg,gif',
            'short_description'     => 'required',
            'long_description'      => 'required',
            'image'                 => 'nullable'
        ]);

        $imageName = null;
        if ($request->hasFile('thumbnail')) {
            $imageName = date('YmdHis') . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->storeAs('uploads', $imageName, 'public');
        }

        $product = Product::create([
            
            'name'                  => $request->name,
            'slug'                  => Str::slug($request->name),
            'price'                 => $request->price,
            'discount'              => $request->discount,
            'thumbnail'             => $imageName,
            'category_id'           => $request->category_id,
            'brand_id'              => $request->brand_id,
            'status'                => $request->input('status', true),
            'featured'              => $request->input('featured', true),
            'stock'                 => $request->stock,
            'image'                 => $imageName,
            'short_description'     => $request->short_description,
            'long_description'      => $request->long_description,         
           
        ]);

        Session::flash('success','product Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['productId'] = Product::find($id);
        return view('admin.pages.product.edit-product',$data);
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = Product::find($id);
         $request->validate([
            'name'                  => 'required|max:255',
            'price'                 => 'required|numeric',
            'discount'              => 'nullable',
            'thumbnail'             => 'required',
            'category_id'           => 'required|exists:categories,id',
            'stock'                 => 'required',
            'status'                => 'boolean',
            'image'                 => 'required|image|mimes:jpeg,png,jpg,gif',
            'short_description'     => 'required',
            'long_description'      => 'required',
            'image'                 => 'nullable'
        ]);
        $imageName = null;
        if ($request->hasFile('thumbnail')) {
            $imageName = date('YmdHis') . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->storeAs('uploads', $imageName, 'public');
        }

        $update->update([
            'name'                  => $request->name,
            'slug'                  => Str::slug($request->name),
            'price'                 => $request->price,
            'discount'              => $request->discount,
            'thumbnail'             => $imageName,
            'category_id'           => $request->category_id,
            'brand_id'              => $request->brand_id,
            'status'                => $request->input('status', true),
            'featured'              => $request->input('featured', true),
            'stock'                 => $request->stock,
            'image'                 => $imageName,
            'short_description'     => $request->short_description,
            'long_description'      => $request->long_description,
           
        ]);
        Session::flash('success','product Updated successfully');
         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product,$id)
    {
        $deleteData=Product::find($id);
        if(file_exists('public/images/product/'.$deleteData->image)AND ! empty($deleteData->image))
        {
         unlink('public/images/product/'.$deleteData->image);
        }
        $deleteData->delete();
       return redirect()->route('view.product');
    }
    
    public function gallery($id)
    {
        $product = Product::find($id);
       return view('admin.pages.product.product-gallery',compact('product'));
    }

    public function galleryStore(Request $request ){

        try {
            $postImageNames = [];

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imageUniqueName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('uploads', $imageUniqueName, 'public');
                    $postImageNames[] = $imageUniqueName;
                }
            }

            $product = Gallery::create([
                "product_id" => $request->product_id,
                "images" => serialize($postImageNames),
            ]);

            Session::flash('success', 'Images uploaded successfully');
            return redirect()->route('product.gallery', $product->id)->with('success', 'Gallery Updated');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
