<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListingImageGallery;
use App\Traits\FileUploadTraits;
use Illuminate\Http\Request;

class ListingImageGalleryController extends Controller
{
    use FileUploadTraits;

    public function index()
    {
        return view('admin.listings.listing-image-gallery.index');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'images' => ['required'],
            'images.*' => ['image','max:10000'],
            'listing_id' => ['required']
        ],[
            'images.*.image' => 'One or more selected files are not valid image.',
            'images.*.max' => 'The :attribute may not be greater than 10MB.'
        ]);

        $imagePaths = $this->uploadMultipleImage($request, 'images');

        foreach($imagePaths as $path){
            $image = new ListingImageGallery();
            $image->listing_id = $request->listing_id;
            $image->image = $path;
            $image->save();
        }

        toastr()->success('Uploaded Successfully !');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
