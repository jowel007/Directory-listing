<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListingVideoGallary;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListingVideoGallaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $videos = ListingVideoGallary::where('listing_id', $request->id)->get();
        $listing_video = Listing::select('title')->where('id',$request->id)->first();
        return view('admin.listings.listing-video-gallery.index',compact('videos','listing_video'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'video_url' => 'required|url',
            'listing_id' => 'required'
        ]);

        $video  = new ListingVideoGallary();
        $video->video_url = $request->video_url;
        $video->listing_id = $request->listing_id;
        $video->save();

        toastr()->success('Created Succesgfully Done.');

        return redirect()->back();

    }


    public function destroy(string $id) :Response
    {
        try {
            $video = ListingVideoGallary::findOrFail($id);
            $video->delete();

            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
