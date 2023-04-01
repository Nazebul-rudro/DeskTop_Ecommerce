<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    //
    public function index()
    {
        //
        $sliders = Slider::latest()->paginate(10);
        // $categories = Category::latest()->paginate(10);
        return view('backend.slider.index', compact('sliders'));
    }

//     /**
//      * Show the form for creating a new resource.
//      */
    public function create()
    {
        //
        return view('backend.slider.create');
    }

//     /**
//      * Store a newly created resource in storage.
//      */
    public function store(SliderRequest $request)
    {

        try {
            //code...
            //
            // $exe = $request->file('CategoryImage')->getClientOriginalExtension();
            //$fileName = time() . uniqid() . '.' . $exe;
            // $request->file('CategoryImage')->storeAs('public/categories', $fileName);
            Slider::create([
                "SliderName" => $request->SliderName,
                "SliderTitle" => $request->SliderTitle,
                "SliderDatials" => $request->SliderDatials,
                "SliderImage" => $this->uploadImage(Request()->file('SliderImage')),

            ]);
            return redirect()->route('slider.list')->with('message', "Slider Store Successfully!");
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
    public function edit(Slider $slider)
    {
        return view('backend.slider.edit', compact('slider'));
    }

//     /**
//      * Update the specified resource in storage.
//      */
    public function update(SliderRequest $request, Slider $slider)
    {
        try {
            $slider->update([
                "SliderName" => $request->SliderName,
                "SliderTitle" => $request->SliderTitle,
                "SliderDatials" => $request->SliderDatials,
                "SliderImage" => $this->uploadImage(Request()->file('SliderImage')),
            ]);
            // dd($request);
            return redirect()->route('slider.list')->with('message', "Slider update Successfully!");
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }

        // $categories->update($requestCategories);

    }

//     /**
//      * Remove the specified resource from storage.
//      */
    public function destory(Slider $slider)
    {
        //
        // dd('calling');
        $slider->delete();
        return redirect()->route('slider.list')->with('message', "Slider Delete Successfully!");
    }

    public function traste()
    {
        // dd('ok boss');
        $trastData = Slider::onlyTrashed()->paginate(10);
        //dd($trustData->all());
        return view('backend.slider.traste', compact('trastData'));
    }

    public function restore($id)
    {
        // dd('calling boss');
        $restoreData = Slider::onlyTrashed()->findOrFail($id);
        $restoreData->restore();
        return redirect()->route('slider.list')->with('message', "Slider Restore Successfully!");
    }
    public function delete($id)
    {
        // dd('boss calling');
        $deleteData = Slider::onlyTrashed()->findOrFail($id);
        $deleteData->forceDelete();
        return redirect()->route('slider.trast');
    }


public function uploadImage($file){
    //$fileName = $file->file('CategoryImage')->getClientOriginalExtension();
$fileName = time(). uniqid().'.' . $file->getClientOriginalExtension();
Image::make($file)->resize(1160, 365)->save(storage_path('/app/public/slider/'. $fileName));
return $fileName;
}



 }
