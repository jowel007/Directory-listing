<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Redirect;

class ProfileController extends Controller
{
    public function Userprofile(){
        return view('Frontend.dashboard.profile.userprofile');
    }

    public function Updateprofile(ProfileUpdateRequest $request) : RedirectResponse{
        dd($request->all());
        return Redirect()->back();
    }
}
