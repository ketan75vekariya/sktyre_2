<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Tbl_testimonial;

class AdminTestimonialController extends Controller
{
    //This method for view Testimonial
    public function index(){
        $testimonial = Tbl_testimonial::orderBy('created_at', 'DESC')->get();
        return view('backend.testimonial',[
            'testimonials' =>$testimonial
        ]);
    }
    
    //This method for store Testimonial
    public function store(Request $request){
        $rules = [
            'client_name' => 'required',
            'testimonial'=>'required',
        ];

        if($request->image != ""){
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('testimonial.index')->withInput()->withErrors($validator);
        }

        //here we insert the data in the db
        $testimonial = new Tbl_testimonial();
        $testimonial->client_name = $request->client_name;
        $testimonial->testimonial = $request->testimonial;
        $testimonial->save();

        if($request->image != ""){
        //Here we store the image
        $image = $request->image;
        $ext= $image->getClientOriginalExtension();
        $imageName =time().'.'.$ext; //unique image name

        //save image in public directory
        $image->move(public_path('uploads/testimonial'),$imageName);

        //save image name in database
        $testimonial->image = $imageName;
        $testimonial->save();
        }
        return redirect()->route('testimonial.index')->with('success','Testimonial added successfully');

    }

    //This method for edit Testimonial
    public function edit($id){
        $testimonial = Tbl_testimonial::find($id);
        return response()->json([
            'status'=>200,
            'testimonial'=>$testimonial,
        ]);
        
    }
    //This method for update Testimonial
    public function update(Request $request){
        $rules = [
            'client_name' => 'required',
            'testimonial'=>'required',
        ];

        if($request->image != ""){
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('testimonial.index')->withInput()->withErrors($validator);
        }

        //here we insert the data in the db
        $testimonial_id = $request->testimonial_id;
        $testimonial = Tbl_testimonial::findOrFail($testimonial_id);
        $testimonial->client_name = $request->client_name;
        $testimonial->testimonial = $request->testimonial;
        $testimonial->update();

        if($request->image != ""){

        //Delete old image
        File::delete(public_path('uploads/testimonial/'.$testimonial->image));
        
        //Here we store the image
        $image = $request->image;
        $ext= $image->getClientOriginalExtension();
        $imageName =time().'.'.$ext; //unique image name

        //save image in public directory
        $image->move(public_path('uploads/testimonial'),$imageName);

        //save image name in database
        $testimonial->image = $imageName;
        $testimonial->save();
        }
        return redirect()->route('testimonial.index')->with('success','Testimonial updated successfully');        
    }
    //This method for destroy Testimonial
    public function destroy(Request $request){
        $id = $request->testimonial_id;
        $testimonial = Tbl_testimonial::findOrFail($id);

         //Delete old image
         File::delete(public_path('uploads/testimonial/'.$testimonial->image));

         //Testimonial delete
         $testimonial->delete();

         return redirect()->route('testimonial.index')->with('success', 'Testimonial deleted sucessfully');
    }
}
