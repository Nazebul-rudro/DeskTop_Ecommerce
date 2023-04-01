<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::latest()->paginate(10);;

        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('backend.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsRequest $request)
    {
        //
        // dd($request->all());
        // $exe = $request->file('ProductImage')->getClientOriginalExtension();
        // $fileName = time() . uniqid() . '.' . $exe;
        // $request->file('ProductImage')->storeAs('public/Products/' . $fileName);

        try {
            //code...
            Product::create([
                "ProductName" => $request->ProductName,
                "ProductCode" => $request->ProductCode,
                "categoriesId" => $request->categoriesId,
                "ProductPrice" => $request->ProductPrice,
                "DiscountPrice" => $request->DiscountPrice,
                "AfterDiscount" => $request->AfterDiscount,
                "ShortDescription" => $request->ShortDescription,
                "LongDescription" => $request->LongDescription,
                "ProductQuantity" => $request->ProductQuantity,
                "ProductImage" =>  $this->uploadImage(Request()->file('ProductImage')),
            ]);
            return redirect()->route('products.list')->with('message', "Product Store Successfully!");
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('products.create')->back();
        }
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
    public function edit($id)
    {
        //

        $product = Product::find($id);
        $categories = Category::all();
       return view('backend.products.edit', compact('product', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductsRequest $request, Product $product)
    {
        //
        try {
            //code...
            $product->update([
                "ProductName" => $request->ProductName,
                "ProductCode" => $request->ProductCode,
                "categoriesId" => $request->categoriesId,
                "ProductPrice" => $request->ProductPrice,
                "DiscountPrice" => $request->DiscountPrice,
                "AfterDiscount" => $request->AfterDiscount,
                "ShortDescription" => $request->ShortDescription,
                "LongDescription" => $request->LongDescription,
                "ProductQuantity" => $request->ProductQuantity,
                "ProductImage" =>  $this->uploadImage(Request()->file('ProductImage')),
            ]);
            return redirect()->route('products.list')->with('message', "Product update Successfully!");
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.list')->with('message', "Product Delete Successfully!");
    }

    public function traste(){
       $trastData = Product::onlyTrashed()->paginate(10);
       return view('backend.products.traste', compact('trastData'));
    }

public function restore($id){
$restoreData = Product::onlyTrashed()->findOrFail($id);
$restoreData->restore();
return redirect()->route('products.list')->with('message', "Product Delete Successfully!");
}


public function delete($id)
{
    $deleteData = Product::onlyTrashed()->findOrFail($id);
    $deleteData->forceDelete();
    return redirect()->route('products.trast');
}











    public function uploadImage($file){
        $fileName = time() . uniqid() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->resize(300, 200)->save(storage_path('/app/public/products/'. $fileName));
        return $fileName;
    }
}
