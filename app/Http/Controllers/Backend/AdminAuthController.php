<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    //Register
    public function register(){
        echo"<h1>register</h1>";
    }

    //Login
    public function login(){
        echo"<h1>Login</h1>";
    }
    //Logout
    public function logout(){
        echo"<h1>logout</h1>";
    }
    //User
    public function profile(){
        echo"<h1>Profile</h1>";
    } 


}
