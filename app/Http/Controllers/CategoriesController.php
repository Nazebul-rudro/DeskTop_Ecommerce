<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Intervention\Image\Facades\Image;

class CategoriesController extends Controller
{

    public function index()
    {
        //

        $categories = Category::latest()->paginate(10);
        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('categories-create');
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriesRequest $request)
    {
        try {
            Category::create([
                "CategoryName" => $request->CategoryName,
                "CategoryDatials" => $request->CategoryDatials,
                "CategoryImage" =>$this->uploadImage(Request()->file('CategoryImage')) ,

            ]);
            return redirect()->route('categories.list')->with('message', "Category Store Successfully!");
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
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
    public function edit(Category $category)
    {

        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriesRequest $request, Category $Category)
    {

        //dd($Category->id);
        //         $categories = Categories::all();
        // dd($categories);
        // dd($request->all());
        // dd($request->all());
        // $fileName = time() . uniqid() . '.' . $exe;
        // if($request->hasFile('CategoryImage')){
        //     $request->file('CategoryImage')->storeAs('/public/categories', $fileName);
        // }
        try {
            $Category->update([

                'CategoryName' => $request->CategoryName,
                'CategoryDatials' => $request->CategoryDatials,
                'CategoryImage' => $this->uploadImage(request()->file('CategoryImage')),
            ]);
            // dd($request);
            return redirect()->route('categories.list')->with('message', "Category update Successfully!");
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }

        // $categories->update($requestCategories);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $Category)
    {
        //
        $Category->delete();
        return redirect()->route('categories.list');
    }

    public function traste()
    {
        $trastData = Category::onlyTrashed()->paginate(10);
        //dd($trustData->all());
        return view('backend.categories.traste', compact('trastData'));
    }

    public function restore($id)
    {
        $restoreData = Category::onlyTrashed()->findOrFail($id);
        $restoreData->restore();
        return redirect()->route('categories.list')->with('message', "Category Restore Successfully!");
    }
    public function delete($id)
    {
        $deleteData = Category::onlyTrashed()->findOrFail($id);
        $deleteData->forceDelete();
        return redirect()->route('categories.truste');
    }


public function uploadImage($file){
    //$fileName = $file->file('CategoryImage')->getClientOriginalExtension();
$fileName = time(). uniqid().'.' . $file->getClientOriginalExtension();
Image::make($file)->resize(300, 200)->save(storage_path('/app/public/categories/'. $fileName));
return $fileName;
}



}
