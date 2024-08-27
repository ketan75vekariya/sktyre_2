<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tbl_message;

class AdminMessageController extends Controller
{
    //This method for view messages
    public function index(){
        $message = Tbl_message::orderBy('created_at', 'DESC')->get();
        return view('backend.message',[
            'messages' =>$message
        ]);
    }
    
    //This method for store messages
    public function store(Request $request){
        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'phone'=>'required|max:15',
            'subject'=>'required|min:10',
            'message' => 'required|min:50'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('message.index')->withInput()->withErrors($validator);
        }

        //here we insert the data in the db
        $message = new Tbl_message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();

       
        return redirect()->route('message.index')->with('success','message added successfully');

    }

    //This method for edit messages
    public function edit($id){
        $message = Tbl_message::findOrFail($id);
        return response()->json([
            'status'=>200,
            'message'=>$message,
        ]);
        
    }
    //This method for update messages
    public function update(Request $request){
        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'phone'=>'required|max:15',
            'subject'=>'required|min:10',
            'message' => 'required|min:50'
        ];

        if($request->image != ""){
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('message.index')->withInput()->withErrors($validator);
        }

        //here we insert the data in the db
        $message_id = $request->message_id;
        $message = Tbl_message::findOrFail($message_id);
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->update();

       
        return redirect()->route('message.index')->with('success','message updated successfully');        
    }
    //This method for destroy messages
    public function destroy(Request $request){
        $id = $request->message_id;
        $message = Tbl_message::findOrFail($id);
        //message delete
        $message->delete();
        return redirect()->route('message.index')->with('success', 'message deleted sucessfully');
    }
}
