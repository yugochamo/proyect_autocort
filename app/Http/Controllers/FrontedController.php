<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontedController extends Controller
{
    public function index(){
        return view('frontend');
    }
    public function abouted(){
        return view('abouted');
    }
    public function shop(){
        return view('shop');
    }
    public function contact(){
        return view('contact');
    } 
    public function single(){
        return view('single');
    }

}
