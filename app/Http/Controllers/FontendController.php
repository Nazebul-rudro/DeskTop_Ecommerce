<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Specialoffers;
use Illuminate\Http\Request;

class FontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        $specialoffers = Specialoffers::limit(2)->get();
        //$products = Product::limit(8)->get();
        $sliders = Slider::all();
        return view('fontend.index', compact('sliders', 'categories','specialoffers'));
    }
    public function productdetails($id){
$productdetail = Product::find($id);
        return view('components.fontend.layouts.partials.details', compact('productdetail'));
    }
}
