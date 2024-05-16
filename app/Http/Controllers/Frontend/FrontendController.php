<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function Index(){
        // return view('frontend.layouts.master');
        return view('Frontend.home.index');
    }
}
