<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Destination;
use App\Models\Testimonial;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class WebhomeControllers extends Controller
{

	public function index()
    {
    	$banners = Banner::get();
    	$destination = Destination::where('status',1)->latest()->take(6)->get();
    	$testimonial = Testimonial::where('status',1)->latest()->take(6)->get();
        $data = array(
            'banner' => $banners,
            'destination' => $destination,
            'testimonial' => $testimonial
        );
        return view('frontend.home',compact('data'));
    }
    public function pages($id)
    {
        $page = Page::where('id',$id)->first();
        return view('frontend.pages',compact('page'));

    }

}