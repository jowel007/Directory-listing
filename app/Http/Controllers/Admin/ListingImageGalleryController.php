<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingImageGallery;
use App\Traits\FileUploadTraits;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ListingImageGalleryController extends Controller
{
    use FileUploadTraits;

    public function index(Request $request)
    {

        $images = ListingImageGallery::where('listing_id', $request->id)->get();
        $listing_title = Listing::select('title')->where('id',$request->id)->first();
        return view('admin.listings.listing-image-gallery.index', compact('images','listing_title'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'images' => ['required'],
            'images.*' => ['image', 'max:10000'],
            'listing_id' => ['required']
        ], [
            'images.*.image' => 'One or more selected files are not valid image.',
            'images.*.max' => 'The :attribute may not be greater than 10MB.'
        ]);

        $imagePaths = $this->uploadMultipleImage($request, 'images');

        foreach ($imagePaths as $path) {
            $image = new ListingImageGallery();
            $image->listing_id = $request->listing_id;
            $image->image = $path;
            $image->save();
        }

        toastr()->success('Uploaded Successfully !');

        return redirect()->back();
    }

    public function destroy(string $id) : Response
    {
        try {
            $image = ListingImageGallery::findOrFail($id);
            $this->deleteFile($image->image);
            $image->delete();

            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
