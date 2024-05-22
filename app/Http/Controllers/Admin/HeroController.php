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
        return view('admin.hero.index');
    }

    public function update(HeroUpdateRequest $request) :RedirectResponse {
        $imagePath = $this->uploadImage($request,'background');

        Hero::updateOrCreate(
            ['id' => 1],
            [
                'background' => !empty($imagePath) ? $imagePath : '',
                'title' => $request->sub_title,
                'sub_title' => $request->sub_title
            ]

            );

            toastr()->success('Updated successfully');
        return redirect()->back();
    }
}
