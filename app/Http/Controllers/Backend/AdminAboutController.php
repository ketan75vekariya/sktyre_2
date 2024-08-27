<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Tbl_about;

class AdminAboutController extends Controller
{
    //view
    public function index(){
        $about = Tbl_about::orderBy('created_at', 'DESC')->get();
        return view('backend.about',[
            'abouts' =>$about
        ]);
    }
     //This method for edit services
     public function edit($id){
        $about = Tbl_about::findOrFail($id);
        return response()->json([
            'status'=>200,
            'about'=>$about,
        ]);
        
    }

    //This method for update services
    public function update(Request $request){
        $rules = [
            'title' => 'required|min:5',
            'description'=>'required|min:50'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('about.index')->withInput()->withErrors($validator);
        }

        //here we insert the data in the db
        $about_id = $request->about_id;
        $about = Tbl_about::findOrFail($about_id);
        $about->title = $request->title;
        $about->description = $request->description;
        $about->update();

        return redirect()->route('about.index')->with('success','About updated successfully');        
    }
}
