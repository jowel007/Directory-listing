<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function Index(){
        // return view('frontend.layouts.master');
        $hero = Hero::first();
        return view('Frontend.home.index',compact('hero'));
    }
}
