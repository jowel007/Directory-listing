<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function Userprofile(){
        return view('Frontend.dashboard.profile.userprofile');
    }
}
