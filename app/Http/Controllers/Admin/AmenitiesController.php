<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AmenityDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AmenityStoreRequest;
use App\Http\Requests\Admin\AmenityUpdateRequest;
use App\Models\Amenitie;
use Illuminate\Http\Request;
use Str;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AmenityDataTable $dataTable)
    {
        return $dataTable->render('admin.amenity.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.amenity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AmenityStoreRequest $request)
    {
        $amenity = new Amenitie();
        $amenity->icon = $request->icon;
        $amenity->name = $request->name;
        $amenity->slug = Str::slug($request->name);
        $amenity->status = $request->status;
        $amenity->save();

        toastr()->success('Created Successfully');

        return to_route('admin.amenity.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $amenity = Amenitie::findOrFail($id);
        return view('admin.amenity.edit',compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AmenityUpdateRequest $request, string $id)
    {
        // dd($request->all());
        $amenity = Amenitie::findOrFail($id);
        // $amenity->icon = $request->fails('icon') ? $request->icon : $amenity->icon;
        // Check if 'icon' field exists and is not null
        if ($request->has('icon') && !is_null($request->icon)) {
            $amenity->icon = $request->icon;
        }
        $amenity->name = $request->name;
        $amenity->slug = Str::slug($request->name);
        $amenity->status = $request->status;
        $amenity->save();

        toastr()->success('Updated Successfully');

        return to_route('admin.amenity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Amenitie::findOrFail($id)->delete();

            return response(['status'=> 'success','message'=>'Deleted Successfully']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status'=> 'error','message'=>$e->getMessage()]);
        }
    }
}
