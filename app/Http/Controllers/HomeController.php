<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return  view('welcome');
    }
    public function about_us(){
    return  view('aboutus');
  }
  public function contact_us(){
    return  view('contactus');
  }
  public function feature(){
    return  view('features');
  }
  
}