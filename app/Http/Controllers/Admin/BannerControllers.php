<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BannerControllers extends Controller
{
    //
    public function __construct() {

        $this->middleware('auth');

    }

    public function index() {

        $banner = Banner::latest()->get();

        return view('admin.banner.index',compact('banner'));

    }

    public function create() {

        return view('admin.banner.create');
    }

    public function store(Request $request) {


        $request->validate([
            "name" => 'required',
            "description" => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            
			
            ]);
            
        $banner = new Banner([
         'title' => request('name'),
         'desc' => request('description'),
         'status' =>request('status')?1:0,   


        ]);
            
        if($request->hasFile('image'))

        {
            $image = $request->file('image');

            
            
            $time = rand(1000,9999).".".time();


            $extensionpath = $image->getClientOriginalExtension();
           
			$time = rand(1000,9999).".".time();
								
			$image_name = $time.".".$extensionpath;
			$uploadSuccess = $image->move(public_path('/images//banner/'), $image_name);	

								
			$banner->image = $image_name; 	
								// dd($img);
									
			$banner->save();


        }

        $banner->save();
         return redirect()->back()->with(['alert' => 'success', 'message' => 'Banner Saved Succesfully']);
    }

    public function edit($id) {

        $banner = Banner::findorfail($id);
        return view('admin.banner.edit',compact('banner'));

    }

    public function update(Request $request,$id) {
        //dd($request->all());
        $request->validate([
            "name" => 'required',
            "description" => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
            ]);
            
        $banner = Banner::findorfail($id);
        $banner->title = $request->get('name');
        $banner->desc = $request->get('description');
        $banner->status = $request->get('status')?1:0;
            
        if($request->hasFile('image'))

        {
            \File::delete(public_path(). '/images/banner/' .$banner->image);
            $image = $request->file('image');

            
            
            $time = rand(1000,9999).".".time();


            $extensionpath = $image->getClientOriginalExtension();
           
			$time = rand(1000,9999).".".time();
								
			$image_name = $time.".".$extensionpath;
			$uploadSuccess = $image->move(public_path('/images//banner/'), $image_name);	

								
			$banner->image = $image_name; 	
								// dd($img);
									
			$banner->save();


        }
        $banner->update();
        return redirect()->back()->with(['alert' => 'success', 'message' => 'Banner Updated Succesfully']);


    }

    public function show($id) {

        $banner = Banner::findorfail($id);

        return view('admin.banner.show', compact('banner'));


    }

    public function destroy(Request $request) {
        $id = $request->bannerId;
        $banner = Banner::findorfail($id);
        \File::delete(public_path(). '/images/banner/' .$banner->image);
        $banner->delete();

        return redirect()->back()->with(['alert' => 'success', 'message' => 'Banner Deleted Succesfully']);

    }


}
