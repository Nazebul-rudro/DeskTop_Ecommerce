<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function profile()
    {

        return view('backend.userinformation.profile');
    }
    public function profileupdate(Request $request)
    {

     try {
        //code...
           // dd($request);
           $id = Auth::user()->id;
           User::find($id)->update([


               'name' => $request->name,
               'title' => $request->title,
               'email' => $request->email,
               'dateofbirth' => $request->dateofbirth,
               'customRadio' => $request->customRadio,
               'country' => $request->country,
               'region' => $request->region,
               'postalcode' => $request->postalcode,
               'phone' => $request->phone,
               'address' => $request->address,
               'visacard' => $request->visacard,
               'paypalid' => $request->paypalid,
               'checkbox' => $request->checkbox,

           ]);
           return redirect()->route('user.profile')->with('message', "Profile Update Successfully!");
     } catch (\Throwable $th) {
        //throw $th;
        dd($th->getMessage());
     }
    }

    public function profileimageupdate(Request $request){
// print_r($request);
        // dd($request);
        // $id = Auth::user()->id;
        // User::find($id)->update([
        //     "image" => $this->uploadImage(Request()->file('image')),
        // ]);

if($request->hasFile('image')){
$exe = $request->file('image')->getClientOriginalExtension();
$fileName = time(). uniqid().'.' .$exe;
$request->file('image')->storeAs('/public/userprofile/', $fileName);

//Image::make($request)->resize(300, 200)->save(storage_path('/app/public/userProfile/'. $fileName))->getRealPath();
$id = Auth::user()->id;
User::find($id)->update([
    'image' => $fileName,

]);
return redirect()->route('user.profile')->with('message', "Profile Picture Update Successfully!");

    }
    }
}

