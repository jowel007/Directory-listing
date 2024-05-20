<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Traits\FileUploadTraits;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Redirect;
use Auth;

class ProfileController extends Controller
{
    use FileUploadTraits;
    public function Userprofile(){
        $user = Auth::user();
        return view('Frontend.dashboard.profile.userprofile',compact('user'));
    }

    public function Updateprofile(ProfileUpdateRequest $request) : RedirectResponse{

        $avaterPath = $this->uploadImage($request, 'avatar',$request->old_avatar);
        $bannerPath = $this->uploadImage($request, 'banner',$request->old_banner);
        // dd($avaterPath);

        $user = Auth::user();
        $user->avatar = !empty($avaterPath) ? $avaterPath : $request->old_avatar;
        $user->banner = !empty($bannerPath) ? $bannerPath : $request->old_banner;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->about = $request->about;
        $user->website = $request->website;
        $user->fb_link = $request->fb_link;
        $user->x_link = $request->x_link;
        $user->in_link = $request->in_link;
        $user->wa_link = $request->wa_link;
        $user->insta_link = $request->insta_link;
        $user->save();

        toastr()->success('Updated Successfully !');

        return redirect()->back();
    }


    public function UpdateprofilePassword(Request $request) : RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required','min:5', 'confirmed']
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        toastr()->info('User Password Updated Successfully !');

        return redirect()->back();
    }
}
