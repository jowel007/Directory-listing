<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeroUpdateRequest;
use App\Traits\FileUploadTraits;
use App\Models\Hero;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    use FileUploadTraits;
    public function index(){
        $hero = Hero::first();
        return view('admin.hero.index',compact('hero'));
    }

    public function update(HeroUpdateRequest $request) :RedirectResponse {

        $imagePath = $this->uploadImage($request,'background',$request->old_background);

        Hero::updateOrCreate(
            ['id' => 1],
            [
                'background' => !empty($imagePath) ? $imagePath : $request->old_background,
                'title' => $request->title,
                'sub_title' => $request->sub_title
            ]

            );

            toastr()->success('Updated successfully');
        return redirect()->back();
    }
}
