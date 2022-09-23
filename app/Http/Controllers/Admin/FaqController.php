<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class FaqController extends Controller
{
    //
    public function __construct() {

        $this->middleware('auth');

    }

    public function index() {

        $faqs = Faq::orderBy('id','desc')->get();

        // dd($testimonials);

        return view('admin.faq.index',compact('faqs'));

    }

    public function create() {

        return view('admin.faq.create');
    }

    public function store(Request $request) {


        $this->validate($request,['question'=>"required", 'answer'=>"required"]);
        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        if($faq->save())
        {      
          return redirect()->back()->with(['alert' => 'success', 'message' => 'Faq Saved Succesfully']);
        }
        else
        {
          return redirect()->back()->with(['alert' => 'success', 'message' => 'Faq has not been created!.']);  
        }
    }

    public function edit($id) {

        $faq = Faq::findorfail($id);
        return view('admin.faq.edit',compact('faq'));

    }

    public function update(Request $request,$id) {
        $this->validate($request,['question'=>"required", 'answer'=>"required"]);
        $faq = Faq::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        if($faq->save())
        {   
            return redirect()->back()->with(['alert' => 'success', 'message' => 'Faq Updated Succesfully']);
        }
        else
        { 
            return redirect()->back()->with(['alert' => 'success', 'message' => 'Faq has not been updated!']);
        }
        


    }

    public function show($id) {

        $faq = faq::findorfail($id);

        return view('admin.faq.show', compact('faq'));


    }


}
