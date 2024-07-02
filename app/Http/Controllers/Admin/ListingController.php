<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ListingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ListingStoreRequest;
use App\Http\Requests\Admin\ListingUpdateRequest;
use App\Models\Amenitie;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\ListingAmenity;
use App\Traits\FileUploadTraits;
use Auth;
use Str;

class ListingController extends Controller
{
    use FileUploadTraits;
    public function index(ListingDataTable $dataTable)
    {
        return $dataTable->render('admin.listings.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        $amenities = Amenitie::all();
        return view('admin.listings.create',compact('categories','locations','amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ListingStoreRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'image');
        $thumbnailPath = $this->uploadImage($request, 'thumbnail_image');
        $filePath = $this->uploadImage($request,'file');

        $listing = new Listing();
        $listing->user_id = Auth::user()->id;
        $listing->package_id = 0;
        $listing->image = $imagePath;
        $listing->thumbnail_image = $thumbnailPath;
        $listing->title = $request->title;
        $listing->slug = Str::slug($request->title);
        $listing->category_id = $request->category;
        $listing->location_id = $request->location;
        $listing->address = $request->address;
        $listing->phone = $request->phone;
        $listing->email = $request->email;
        $listing->website = $request->website;
        $listing->facebook_link = $request->facebook_link;
        $listing->x_link = $request->x_link;
        $listing->linkedin_link = $request->linkedin_link;
        $listing->whatsapp_link = $request->whatsapp_link;
        $listing->file = $filePath;
        $listing->description = $request->description;
        $listing->google_map_emded_code = $request->google_map_emded_code;
        $listing->seo_title = $request->seo_title;
        $listing->seo_description = $request->seo_description;
        $listing->status = $request->status;
        $listing->is_verified = $request->is_verified;
        $listing->is_featured = $request->is_featured;
        $listing->expire_date = date('Y-m-d');
        $listing->save();


        foreach ($request->amenities as $amenityId) {
            $amenity = new ListingAmenity();
            $amenity->listing_id = $listing->id;
            $amenity->amenity_id = $amenityId;
            $amenity->save();
        }

        toastr()->success('Created successfully');
        return to_route('admin.listing.index');

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
        $listing = Listing::findOrFail($id);

        $listingAmenities = ListingAmenity::where('listing_id', $listing->id)
                                            ->pluck('amenity_id')
                                            ->toArray();
        // dd($listingAmenities);

        $categories = Category::all();
        $locations = Location::all();
        $amenities = Amenitie::all();
        return view('admin.listings.edit',compact('categories','locations','amenities','listing','listingAmenities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ListingUpdateRequest $request, string $id)
    {
        // dd($request->all());

        $listing = Listing::findOrFail($id);

        $imagePath = $this->uploadImage($request, 'image', $request->old_image);
        $thumbnailPath = $this->uploadImage($request, 'thumbnail_image', $request->old_thumbnail_image);
        $filePath = $this->uploadImage($request,'file', $request->old_file);


        $listing->user_id = Auth::user()->id;
        $listing->package_id = 0;
        $listing->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $listing->thumbnail_image = !empty($thumbnailPath) ? $thumbnailPath : $request->old_thumbnail_image;
        $listing->title = $request->title;
        $listing->slug = Str::slug($request->title);
        $listing->category_id = $request->category;
        $listing->location_id = $request->location;
        $listing->address = $request->address;
        $listing->phone = $request->phone;
        $listing->email = $request->email;
        $listing->website = $request->website;
        $listing->facebook_link = $request->facebook_link;
        $listing->x_link = $request->x_link;
        $listing->linkedin_link = $request->linkedin_link;
        $listing->whatsapp_link = $request->whatsapp_link;
        $listing->file = !empty($filePath) ? $filePath : $request->old_file;
        $listing->description = $request->description;
        $listing->google_map_emded_code = $request->google_map_emded_code;
        $listing->seo_title = $request->seo_title;
        $listing->seo_description = $request->seo_description;
        $listing->status = $request->status;
        $listing->is_verified = $request->is_verified;
        $listing->is_featured = $request->is_featured;
        $listing->expire_date = date('Y-m-d');
        $listing->save();


        ListingAmenity::where('listing_id',$listing->id)->delete();
        foreach ($request->amenities as $amenityId) {
            $amenity = new ListingAmenity();
            $amenity->listing_id = $listing->id;
            $amenity->amenity_id = $amenityId;
            $amenity->save();
        }

        toastr()->success('Updated successfully');
        return to_route('admin.listing.index');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Listing::findOrFail($id)->delete();

            return response(['status'=> 'success','message'=>'Deleted Successfully']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status'=> 'error','message'=>$e->getMessage()]);
        }
    }
}
