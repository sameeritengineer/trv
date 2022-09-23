<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PageControllers extends Controller
{
    //
    public function __construct() {

        $this->middleware('auth');

    }

    public function index() {

        $pages = Page::latest()->get();

        // dd($testimonials);

        return view('admin.pages.index',compact('pages'));

    }

    public function create() {

        return view('admin.pages.create');
    }

    public function store(Request $request) {


        $request->validate([
            "name" => 'required',
            "description" => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            
			
            ]);
            
        $pages = new Page([
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
            $uploadSuccess = $image->move(public_path('/images/pages/'), $image_name);	

								
			$pages->image = $image_name; 	
								// dd($img);
									
			$pages->save();


        }

        $pages->save();
         return redirect()->back()->with(['alert' => 'success', 'message' => 'Saved Succesfully']);
    }

    public function edit($id) {

        $pages = Page::findorfail($id);
        return view('admin.pages.edit',compact('pages'));

    }

    public function update(Request $request,$id) {
        //dd($request->all());
        $request->validate([
            "name" => 'required',
            "description" => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
            ]);
            
        $pages = Page::findorfail($id);
        $pages->name = $request->get('name');
        $pages->description = $request->get('description');
        $pages->status = $request->get('status')?1:0;
            
        if($request->hasFile('image'))

        {
            \File::delete(public_path(). '/images/pages/' .$pages->image);
            $image = $request->file('image');

            
            
            $time = rand(1000,9999).".".time();


            $extensionpath = $image->getClientOriginalExtension();
           
			$time = rand(1000,9999).".".time();
								
			$image_name = $time.".".$extensionpath;
            $uploadSuccess = $image->move(public_path('/images/pages/'), $image_name);  	

								
			$pages->image = $image_name; 	
								// dd($img);
									
			$pages->save();


        }
        $pages->update();
        return redirect()->back()->with(['alert' => 'success', 'message' => 'Updated Succesfully']);


    }

    public function show($id) {

        $pages = Page::findorfail($id);

        return view('admin.pages.show', compact('pages'));


    }

    public function destroy(Request $request) {
        $id = $request->pagesId;
        $pages = Page::findorfail($id);
        \File::delete(public_path(). '/images/pages/' .$pages->image);
        $pages->delete();

        return redirect()->back()->with(['alert' => 'success', 'message' => 'Deleted Succesfully']);

    }


}
