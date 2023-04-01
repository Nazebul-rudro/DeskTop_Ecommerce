<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecialofferRequest;
use Intervention\Image\Facades\Image;
use App\Models\Specialoffers;
use Illuminate\Http\Request;

class SpecialofferController extends Controller
{
    //
    public function index()
    {
        $specialoffers = Specialoffers::latest()->paginate(10);
        return view('backend.specialoffer.index', compact('specialoffers'));
    }

    public function create()
    {
        return view('backend.specialoffer.create');
    }

    public function store(SpecialofferRequest $request)
    {
        try {
            //code...
            Specialoffers::create([
                "OfferName" => $request->OfferName,
                "OfferDiscount" => $request->OfferDiscount,
                "OfferImage" =>  $this->uploadImage(Request()->file('OfferImage')),
            ]);
            return redirect()->route('specialoffer.list')->with('message', "Offer Store Successfully!");
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

    public function edit(Specialoffers $specialoffer)
    {

        return view('backend.specialoffer.edit', compact('specialoffer'));
    }

    public function update(SpecialofferRequest $request, Specialoffers $specialoffer)
    {

        try {
            //code...
            $specialoffer->update([
                "OfferName" => $request->OfferName,
                "OfferDiscount" => $request->OfferDiscount,
                "OfferImage" =>  $this->uploadImage(Request()->file('OfferImage')),
            ]);
            return redirect()->route('specialoffer.list')->with('message', "Offer update Successfully!");
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

    public function destory(Specialoffers $specialoffer)
    {
        $specialoffer->delete();
        return redirect()->route('specialoffer.list')->with('message', "Offer destroy Successfully!");
    }

    public function trast()
    {
        // dd('calling');
        $trastData = Specialoffers::onlyTrashed()->paginate(10);
        return view('backend.specialoffer.traste', compact('trastData'));

    }
    public function restore($id)
    {
        // dd('calling boss');
        $restoreData = Specialoffers::onlyTrashed()->findOrFail($id);
        $restoreData->restore();
        return redirect()->route('specialoffer.list')->with('message', "Offer Restore Successfully!");
    }
    public function delete($id)
    {
        // dd('calling boss');
        $deletedata = Specialoffers::onlyTrashed()->findOrFail($id);
        $deletedata->forceDelete();
        return redirect()->route('specialoffer.list')->with('message', "Offer Restore Successfully!");
    }



    public function uploadImage($file)
    {
        //$fileName = $file->file('CategoryImage')->getClientOriginalExtension();
        $fileName = time() . uniqid() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->resize(1160, 365)->save(storage_path('/app/public/specialoffer/' . $fileName));
        return $fileName;
    }
}
