<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tbl_company;
use App\Models\Tbl_message;
use App\Models\Tbl_service;

class ContactController extends Controller
{
    function index(){
        $company = Tbl_company::orderBy('created_at', 'DESC')->get();
        $service = Tbl_service::orderBy('created_at', 'DESC')->get();
        return view('frontend.contact',[
            'companies' =>$company,'services' =>$service
        ]);
    }
    //Data storing  from frontend form 
    public function store(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone'=>'required|max:15',
            'subject'=>'required|min:10',
            'message' => 'required|min:50'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('contact.index')->withInput()->withErrors($validator);
        }

        //here we insert the data in the db
        $message = new Tbl_message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();

       
        return redirect()->route('contact.index')->with('success','message added successfully');

    }
}
