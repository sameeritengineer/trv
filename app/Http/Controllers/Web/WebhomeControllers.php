<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Destination;
use App\Models\Testimonial;
use App\Models\Page;
use App\Models\Faq;
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
    public function sDestination($id)
    {
        $destination = Destination::where('id',$id)->first();
        return view('frontend.single',compact('destination'));
    
    }
    public function allDestination()
    {
     $destinations = Destination::where('status',1)->latest()->get();
     return view('frontend.destination',compact('destinations'));
    }
    public function contact()
    {
     return view('frontend.contact');
    }
    public function faq()
    {
     $faqs = Faq::get(); 
     return view('frontend.faq',compact('faqs'));
    }


}