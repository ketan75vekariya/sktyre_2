<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Tbl_company;

class AdminCompanyController extends Controller
{
    //view
    public function index(){
        $company = Tbl_company::orderBy('created_at', 'DESC')->get();
        return view('backend.company',[
            'companies' =>$company
        ]);
    }
     //This method for edit services
     public function edit($id){
        $company = Tbl_company::findOrFail($id);
        return response()->json([
            'status'=>200,
            'company'=>$company,
        ]);
        
    }

    //This method for update services
    public function update(Request $request){
        $rules = [
            'email' => 'required|email',
            'phone' => 'required|max:15',
            'address'=>'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('company.index')->withInput()->withErrors($validator);
        }

        //here we insert the data in the db
        $company_id = $request->company_id;
        $company = Tbl_company::findOrFail($company_id);
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $company->update();

        return redirect()->route('company.index')->with('success','Service updated successfully');        
    }
}
