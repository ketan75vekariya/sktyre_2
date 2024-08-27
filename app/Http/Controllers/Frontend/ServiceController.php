<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tbl_company;
use App\Models\Tbl_service;

class ServiceController extends Controller
{
    function index(){
        $company = Tbl_company::orderBy('created_at', 'DESC')->get();
        $service = Tbl_service::orderBy('created_at', 'DESC')->get();
        return view('frontend.services',['companies' =>$company,'services' =>$service]); 
    }

    
    function singleService($id){
        $company = Tbl_company::orderBy('created_at', 'DESC')->get();
        $services = Tbl_service::orderBy('created_at', 'DESC')->get();
        $service = Tbl_service::findOrFail($id);
        return view('frontend.service-single',[
            'companies' =>$company,
            'service' =>$service,
            'services' =>$services
        ]);
    }
}
