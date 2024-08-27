<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tbl_about;
use App\Models\Tbl_company;
use App\Models\Tbl_service;
use App\Models\Tbl_testimonial;

class HomeController extends Controller
{
    public function index(){
        $company = Tbl_company::orderBy('created_at', 'DESC')->get();
        $about = Tbl_about::orderBy('created_at', 'DESC')->get();
        $service = Tbl_service::orderBy('created_at', 'DESC')->get();
        $testimonial = Tbl_testimonial::orderBy('created_at', 'DESC')->get();
        return view('frontend.index',[
            'companies' => $company,
            'about' => $about,
            'services' => $service,
            'testimonials'=>$testimonial
        ]);
    }
}
