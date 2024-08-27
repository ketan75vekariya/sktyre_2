<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Tbl_service;

class AdminServiceController extends Controller
{
    //This method for view services
    public function index(){
        $service = Tbl_service::orderBy('created_at', 'DESC')->get();
        return view('backend.service',[
            'services' =>$service
        ]);
    }
    
    //This method for store services
    public function store(Request $request){
        $rules = [
            'title' => 'required|min:5',
            's_description'=>'required|min:5',
            'description'=>'required|min:50'
        ];

        if($request->image != ""){
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('service.index')->withInput()->withErrors($validator);
        }

        //here we insert the data in the db
        $service = new Tbl_service();
        $service->title = $request->title;
        $service->short_description = $request->s_description;
        $service->main_description = $request->description;
        $service->save();

        if($request->image != ""){
        //Here we store the image
        $image = $request->image;
        $ext= $image->getClientOriginalExtension();
        $imageName =time().'.'.$ext; //unique image name

        //save image in public directory
        $image->move(public_path('uploads/service'),$imageName);

        //save image name in database
        $service->image = $imageName;
        $service->save();
        }
        return redirect()->route('service.index')->with('success','Service added successfully');

    }

    //This method for edit services
    public function edit($id){
        $service = Tbl_service::find($id);
        return response()->json([
            'status'=>200,
            'service'=>$service,
        ]);
        
    }
    //This method for update services
    public function update(Request $request){
        $rules = [
            'title' => 'required|min:5',
            's_description'=>'required|min:5',
            'description'=>'required|min:50'
        ];

        if($request->image != ""){
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('service.index')->withInput()->withErrors($validator);
        }

        //here we insert the data in the db
        $service_id = $request->service_id;
        $service = Tbl_service::find($service_id);
        $service->title = $request->title;
        $service->short_description = $request->s_description;
        $service->main_description = $request->description;
        $service->update();

        if($request->image != ""){

        //Delete old image
        File::delete(public_path('uploads/service/'.$service->image));
        
        //Here we store the image
        $image = $request->image;
        $ext= $image->getClientOriginalExtension();
        $imageName =time().'.'.$ext; //unique image name

        //save image in public directory
        $image->move(public_path('uploads/service'),$imageName);

        //save image name in database
        $service->image = $imageName;
        $service->save();
        }
        return redirect()->route('service.index')->with('success','Service updated successfully');        
    }
    //This method for destroy services
    public function destroy(Request $request){
        $id = $request->service_id;
        $service = Tbl_service::findOrFail($id);

         //Delete old image
         File::delete(public_path('uploads/service/'.$service->image));

         //Service delete
         $service->delete();

         return redirect()->route('service.index')->with('success', 'Service deleted sucessfully');
    }
}
