<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class TestimonialsControllers extends Controller
{
    //
    public function __construct() {

        $this->middleware('auth');

    }

    public function index() {

        $testimonials = Testimonial::latest()->get();

        // dd($testimonials);

        return view('admin.testimonial.index',compact('testimonials'));

    }

    public function create() {

        return view('admin.testimonial.create');
    }

    public function store(Request $request) {


        $request->validate([
            "name" => 'required',
            "description" => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            
			
            ]);
            
        $testimonial = new Testimonial([
         'name' => request('name'),
         'description' => request('description'),
         'status' =>request('status')?1:0,   


        ]);
            
        if($request->hasFile('image'))

        {
            $image = $request->file('image');

            
            
            $time = rand(1000,9999).".".time();


            $extensionpath = $image->getClientOriginalExtension();
           
			$time = rand(1000,9999).".".time();
								
			$image_name = $time.".".$extensionpath;
			$destinationPath = '/images/testimonial/' . $image_name;
			$image_resize = Image::make($image->getRealPath());
								
								// dd(public_path($destinationPath));

			$img = $image_resize->resize(200,200)->save(public_path($destinationPath),100);		

								
			$testimonial->image = $image_name; 	
								// dd($img);
									
			$testimonial->save();


        }

        $testimonial->save();
         return redirect()->back()->with(['alert' => 'success', 'message' => 'Testimonial Saved Succesfully']);
    }

    public function edit($id) {

        $testimonial = Testimonial::findorfail($id);
        return view('admin.testimonial.edit',compact('testimonial'));

    }

    public function update(Request $request,$id) {
        //dd($request->all());
        $request->validate([
            "name" => 'required',
            "description" => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
            ]);
            
        $testimonial = Testimonial::findorfail($id);
        $testimonial->name = $request->get('name');
        $testimonial->description = $request->get('description');
        $testimonial->status = $request->get('status')?1:0;
            
        if($request->hasFile('image'))

        {
            \File::delete(public_path(). '/images/testimonial/' .$testimonial->image);
            $image = $request->file('image');

            
            
            $time = rand(1000,9999).".".time();


            $extensionpath = $image->getClientOriginalExtension();
           
			$time = rand(1000,9999).".".time();
								
			$image_name = $time.".".$extensionpath;
			$destinationPath = '/images/testimonial/' . $image_name;
			$image_resize = Image::make($image->getRealPath());
								
								// dd(public_path($destinationPath));

			$img = $image_resize->resize(200,200)->save(public_path($destinationPath),100);		

								
			$testimonial->image = $image_name; 	
								// dd($img);
									
			$testimonial->save();


        }
        $testimonial->update();
        return redirect()->back()->with(['alert' => 'success', 'message' => 'Testimonial Updated Succesfully']);


    }

    public function show($id) {

        $testimonial = Testimonial::findorfail($id);

        return view('admin.testimonial.show', compact('testimonial'));


    }

    public function destroy(Request $request) {
        $id = $request->testimonialId;
        $testimonial = Testimonial::findorfail($id);
        \File::delete(public_path(). '/images/testimonial/' .$testimonial->image);
        $testimonial->delete();

        return redirect()->back()->with(['alert' => 'success', 'message' => 'Testimonial Deleted Succesfully']);

    }


}
