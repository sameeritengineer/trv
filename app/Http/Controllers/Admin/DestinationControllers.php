<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Includedata;
use App\Models\Excludedata;
use App\Models\Depositedata;
use App\Models\Destination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use DB;

class DestinationControllers extends Controller
{
	public function __construct() {

        $this->middleware('auth');

    }
    public function index() {

        $destination = Destination::latest()->get();

        // dd($testimonials);

        return view('admin.destination.index',compact('destination'));

    }
    public function create() {
        
        $include = Includedata::get();
        $exclude = Excludedata::get();
        $deposite = Depositedata::get();
        $countries = DB::table('tbl_countries')->get();
        $data = array(
            'includes' => $include,
            'excludes' => $exclude,
            'deposite' => $deposite,
            'countries' => $countries
        );
        return view('admin.destination.create',compact('data'));
    }
    public function store(Request $request) {

        //dd($request->all());
        $request->validate([
            "name" => 'required',
            "price" => 'required',
            "destSdaytime" => 'required',
            "destEdaytime" => 'required',
            "description" => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
		    [
		        'name.required' => 'The name field field is required!',
		        'price.required' => 'The price field field is required!',
		        'destSdaytime.required' => 'The Start Date & Time field field is required!',
		        'destEdaytime.required' => 'The End Date & Time field is required!',
		    ]);
        //$start = date('Y-m-d h:i:s', strtotime($request->destSdaytime));
        //$end = date('Y-m-d h:i:s', strtotime($request->destEdaytime));   
        $destination = new Destination([
         'name' => request('name'),
         'price' => request('price'),
         'start_date_time' => $request->destSdaytime,
         'end_date_time' => $request->destEdaytime,
         'description' => request('description'),
         'video' => request('video'),
         'countryId' => request('country'),
         'hotelname' => request('hotelname'),
         'hoteladd' => request('hoteladd'),
         'addinfo' => request('addinfo'),
         'status' =>request('status')?1:0,   
        ]);
        /* Check Include Data from request */
        if($request->has('includes')){
        	$Includesdata = '';
	        $IncludesdataArr = [];
	        foreach ($request->includes as $include) {
                $IncludesdataArr[] = $include;
            }
            if (!empty($IncludesdataArr)) {
                $Includesdata = implode(',', $IncludesdataArr);
            }
            $destination->includesId = $Includesdata;
        }else{
        	$Includesdata = null;
        	$destination->includesId = $Includesdata;
        }
        /* Check Excludes Data from request */
        if($request->has('excludes')){
        	$Excludesdata = '';
	        $ExcludesdataArr = [];
	        foreach ($request->excludes as $exclude) {
                $ExcludesdataArr[] = $exclude;
            }
            if (!empty($ExcludesdataArr)) {
                $Excludesdata = implode(',', $ExcludesdataArr);
            }
            $destination->excludesId = $Excludesdata;
        }else{
        	$Excludesdata = null;
        	$destination->excludesId = $Excludesdata;
        }
        /* Check Deposite Data from request */
        if($request->has('deposite')){
            $Depositedata = '';
            $DepositedataArr = [];
            foreach ($request->deposite as $deposite) {
                $DepositedataArr[] = $deposite;
            }
            if (!empty($DepositedataArr)) {
                $Depositedata = implode(',', $DepositedataArr);
            }
            $destination->depositeId = $Depositedata;
        }else{
            $Depositedata = null;
            $destination->depositeId = $Depositedata;
        }
        /* Check Activities Data from request */
        if($request->has('activities')){
        	$Activitiesdata = '';
	        $ActivitiesdataArr = [];
	        foreach ($request->activities as $activity) {
                $ActivitiesdataArr[] = $activity;
            }
            if (!empty($ActivitiesdataArr)) {
                $Activitiesdata = implode(',', $ActivitiesdataArr);
            }
            $destination->activities = $Activitiesdata;

        }else{
        	$Activitiesdata = null;
        	$destination->activities = $Activitiesdata;
        }

            
        if($request->hasFile('image'))
        {
            $image = $request->file('image');

            
            
            $time = rand(1000,9999).".".time();


            $extensionpath = $image->getClientOriginalExtension();
           
			$time = rand(1000,9999).".".time();
								
			$image_name = "featured".$time.".".$extensionpath;
			/* Resize Image */
			$destinationPath = '/images/destination/' . $image_name;
			$image_resize = Image::make($image->getRealPath());
			$img = $image_resize->resize(380,290)->save(public_path($destinationPath),100);		
            $uploadSuccess = $image->move(public_path('/images/destination/original_featured'), $image_name);
								
			$destination->image = $image_name; 	
								// dd($img);
									
			$destination->save();


        }
        $batchImage = '';
        $batchImageArr = [];
        if (!empty($request->file('dest_gallery'))) {
            foreach ($request->file('dest_gallery') as $file) {
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                /* Resize Image */
			$destinationPath = '/images/destination/gallery/' . $filename;
			$image_resize = Image::make($file->getRealPath());
			$img = $image_resize->resize(380,290)->save(public_path($destinationPath),100);		
            $uploadSuccess = $file->move(public_path('/images/destination/gallery/original'), $filename);

                $batchImageArr[] = $filename;
            }
            if (!empty($batchImageArr)) {
                $batchImage = implode(',', $batchImageArr);
                $destination->dest_gallery = $batchImage;
            }
        }

        $destination->save();
         return redirect()->back()->with(['alert' => 'success', 'message' => 'Destination Saved Succesfully']);
    }
    public function edit($id) {

        $destination = Destination::findorfail($id);
        $include = Includedata::get();
        $exclude = Excludedata::get();
        $deposite = Depositedata::get();
        $countries = DB::table('tbl_countries')->get();
        $data = array(
            'includes' => $include,
            'excludes' => $exclude,
            'deposite' => $deposite,
            'countries' => $countries
        );
        return view('admin.destination.edit',compact('destination','data'));

    }
    public function update(Request $request,$id) {
        //dd($request->all());
        $request->validate([
            "name" => 'required',
            "price" => 'required',
            "destSdaytime" => 'required',
            "destEdaytime" => 'required',
            "description" => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
		    [
		        'name.required' => 'The name field field is required!',
		        'price.required' => 'The price field field is required!',
		        'destSdaytime.required' => 'The Start Date & Time field field is required!',
		        'destEdaytime.required' => 'The End Date & Time field is required!',
		    ]);
        //$start = date('Y-m-d h:i:s', strtotime($request->destSdaytime));
       //$end = date('Y-m-d h:i:s', strtotime($request->destEdaytime));

        $destination = Destination::findorfail($id);
        $destination->name = $request->get('name');
        $destination->price = $request->get('price');
        $destination->start_date_time = $request->destSdaytime;
        $destination->end_date_time = $request->destEdaytime;
        $destination->description = $request->get('description');
        $destination->video = $request->get('video');
        $destination->countryId = $request->get('country');
        $destination->hotelname = $request->get('hotelname');
        $destination->hoteladd = $request->get('hoteladd');
        $destination->addinfo = $request->get('addinfo');
        $destination->status = $request->get('status')?1:0;
        /* Check Include Data from request */
        if($request->has('includes')){
        	$Includesdata = '';
	        $IncludesdataArr = [];
	        foreach ($request->includes as $include) {
                $IncludesdataArr[] = $include;
            }
            if (!empty($IncludesdataArr)) {
                $Includesdata = implode(',', $IncludesdataArr);
            }
            $destination->includesId = $Includesdata;
        }else{
        	$Includesdata = null;
        	$destination->includesId = $Includesdata;
        }
        /* Check Excludes Data from request */
        if($request->has('excludes')){
        	$Excludesdata = '';
	        $ExcludesdataArr = [];
	        foreach ($request->excludes as $exclude) {
                $ExcludesdataArr[] = $exclude;
            }
            if (!empty($ExcludesdataArr)) {
                $Excludesdata = implode(',', $ExcludesdataArr);
            }
            $destination->excludesId = $Excludesdata;
        }else{
        	$Excludesdata = null;
        	$destination->excludesId = $Excludesdata;
        }
        if($request->has('deposite')){
            $Depositedata = '';
            $DepositedataArr = [];
            foreach ($request->deposite as $deposite) {
                $DepositedataArr[] = $deposite;
            }
            if (!empty($DepositedataArr)) {
                $Depositedata = implode(',', $DepositedataArr);
            }
            $destination->depositeId = $Depositedata;
        }else{
            $Depositedata = null;
            $destination->depositeId = $Depositedata;
        }
        /* Check Activities Data from request */
        if($request->has('activities')){
        	$Activitiesdata = '';
	        $ActivitiesdataArr = [];
	        foreach ($request->activities as $activity) {
                $ActivitiesdataArr[] = $activity;
            }
            if (!empty($ActivitiesdataArr)) {
                $Activitiesdata = implode(',', $ActivitiesdataArr);
            }
            $destination->activities = $Activitiesdata;

        }else{
        	$Activitiesdata = null;
        	$destination->activities = $Activitiesdata;
        }
        if($request->hasFile('image'))

        {
            \File::delete(public_path(). '/images/destination/' .$destination->image);
            \File::delete(public_path(). '/images/destination/original_featured/' .$destination->image);
            $image = $request->file('image');

            
            
            $time = rand(1000,9999).".".time();


            $extensionpath = $image->getClientOriginalExtension();
           
			$time = rand(1000,9999).".".time();
								
			$image_name = "featured".$time.".".$extensionpath;
			/* Resize Image */
			$destinationPath = '/images/destination/' . $image_name;
			$image_resize = Image::make($image->getRealPath());
			$img = $image_resize->resize(380,290)->save(public_path($destinationPath),100);		
            $uploadSuccess = $image->move(public_path('/images/destination/original_featured'), $image_name);
								
			$destination->image = $image_name; 	
								// dd($img);
									
			$destination->save();


        }
        /* gallery Images */
        $batchImage = '';
        $batchImageArr = [];
        if (!empty($request->file('dest_gallery'))) {
            foreach ($request->file('dest_gallery') as $file) {
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                /* Resize Image */
			$destinationPath = '/images/destination/gallery/' . $filename;
			$image_resize = Image::make($file->getRealPath());
			$img = $image_resize->resize(380,290)->save(public_path($destinationPath),100);		
            $uploadSuccess = $file->move(public_path('/images/destination/gallery/original'), $filename);

                $batchImageArr[] = $filename;
            }
            $previous_gallery = explode(',',$destination->dest_gallery);
            $final_gallery = array_merge($previous_gallery,$batchImageArr);
            if (!empty($final_gallery)) {
                $batchImage = implode(',', $final_gallery);
                $destination->dest_gallery = $batchImage;
            }
        }
        
        $destination->update();
        return redirect()->back()->with(['alert' => 'success', 'message' => 'Destination Updated Succesfully']);
    }
    public function gdestroyimage($id,$name) {
          $destination = Destination::where('id',$id)->first('dest_gallery');
          $gallery = explode(',',$destination->dest_gallery);
          $pos = array_search($name, $gallery);

			// array_seearch returns false if an element is not found
			// so we need to do a strict check here to make sure
			if ($pos !== false) {
			    unset($gallery[$pos]);
			    \File::delete(public_path(). '/images/destination/gallery/' .$name);
			    \File::delete(public_path(). '/images/destination/gallery/original/' .$name);
			}
            $final = implode(',',$gallery);
            $update = Destination::where('id', $id)->update(['dest_gallery' => $final]);
            if($update){
            	return redirect()->back()->with(['alert' => 'success', 'message' => 'Gallery Image deleted Succesfully']);
            }
         
    }
    public function createExtra($type) {
        if($type == 'include'){
        $data = Includedata::orderBy('created_at','desc')->get();
        }elseif($type == 'excludes'){
        $data = Excludedata::orderBy('created_at','desc')->get();
        }else{
        $data = Depositedata::orderBy('created_at','desc')->get();    
        }
        return view('admin.extra.create',compact('data','type'));
    }
    public function storeExtra(Request $request) {

        $request->validate([
            "name" => 'required'
            ]); 
        if($request->type== 'include'){
        $data = new Includedata([
         'name' => request('name')  
        ]);
        }elseif($request->type== 'exclude'){
        $data = new Excludedata([
         'name' => request('name')  
        ]);
        }else{
            $data = new Depositedata([
         'name' => request('name')  
           ]); 
        }
        $data->save();
         return redirect()->back()->with(['alert' => 'success', 'message' => 'Data Saved Succesfully']);
        
    }
    public function destroyExtra(Request $request) {
        $id = $request->extraId;
        $type = $request->extraType;
        if($type == 'include'){
         $extra = Includedata::findorfail($id);
        }elseif($type == 'exclude'){
         $extra = Excludedata::findorfail($id);
        }else{
         $extra = Depositedata::findorfail($id);
        }
        $extra->delete();
        

        return redirect()->back()->with(['alert' => 'success', 'message' => 'Data Deleted Succesfully']);

    }

}