<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blogcategories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BlogcategoriesControllers extends Controller
{
    //
    public function __construct() {

        $this->middleware('auth');

    }

    public function index() {

        $testimonials = Blogcategories::latest()->get();

        // dd($testimonials);

        return view('admin.blogcategories.index',compact('testimonials'));

    }

    public function create() {

        return view('admin.blogcategories.create');
    }

    public function store(Request $request) {

        //dd($request->all());
        $request->validate([
            "name" => 'required',
            "description" => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            
			
            ]);
        $slug = $this->slugify(request('name'));    
        $blogcategories = new Blogcategories([
         'name' => request('name'),
         'slug' => $slug,
         'description' => request('description'),
         'status' =>request('status')?'active':'inactive',   


        ]);
            
        if($request->hasFile('image'))

        {
            $image = $request->file('image');

            
            
            $time = rand(1000,9999).".".time();


            $extensionpath = $image->getClientOriginalExtension();
           
			$time = rand(1000,9999).".".time();
								
			$image_name = $time.".".$extensionpath;
			$destinationPath = '/images/category/' . $image_name;
			$image_resize = Image::make($image->getRealPath());
								
								// dd(public_path($destinationPath));

			$img = $image_resize->resize(200,200)->save(public_path($destinationPath),100);		

								
			$blogcategories->image = $image_name; 	
								// dd($img);
									
			$blogcategories->save();


        }

        $blogcategories->save();
         return redirect()->back()->with(['alert' => 'success', 'message' => 'Blogcategories Saved Succesfully']);
    }

    public function edit($id) {

        $blogcategories = Blogcategories::findorfail($id);
        return view('admin.blogcategories.edit',compact('blogcategories'));

    }

    public function update(Request $request,$id) {
        //dd($request->all());
        $request->validate([
            "name" => 'required',
            "description" => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
            ]);
        $slug = $this->slugify(request('name'));     
        $blogcategories = Blogcategories::findorfail($id);
        $blogcategories->name = $request->get('name');
        $blogcategories->slug = $slug;
        $blogcategories->description = $request->get('description');
        $blogcategories->status = $request->get('status')?'active':'inactive';
            
        if($request->hasFile('image'))

        {
            \File::delete(public_path(). '/images/category/' .$blogcategories->image);
            $image = $request->file('image');

            
            
            $time = rand(1000,9999).".".time();


            $extensionpath = $image->getClientOriginalExtension();
           
			$time = rand(1000,9999).".".time();
								
			$image_name = $time.".".$extensionpath;
			$destinationPath = '/images/category/' . $image_name;
			$image_resize = Image::make($image->getRealPath());
								
								// dd(public_path($destinationPath));

			$img = $image_resize->resize(200,200)->save(public_path($destinationPath),100);		

								
			$blogcategories->image = $image_name; 	
								// dd($img);
									
			$blogcategories->save();


        }
        $blogcategories->update();
        return redirect()->back()->with(['alert' => 'success', 'message' => 'Blogcategories Updated Succesfully']);


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

    public function slugify($text, string $divider = '-')
    {
      // replace non letter or digits by divider
      $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, $divider);

      // remove duplicate divider
      $text = preg_replace('~-+~', $divider, $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }


}
