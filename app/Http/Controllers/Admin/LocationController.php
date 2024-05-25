<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LocationDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationStoreRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use Response;
use Str;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LocationDataTable $dataTable)
    {
        return $dataTable->render('admin.location.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.location.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationStoreRequest $request)
    {
        $location = new Location();
        $location->name = $request->name;
        $location->slug = Str::slug($request->name);
        $location->show_at_home = $request->show_at_home;
        $location->status = $request->status;
        $location->save();

        toastr()->success('Location Created Successfully');

        // return redirect()->route('admin.category.index');
        return to_route('admin.location.index');
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
        $location = Location::findOrFail($id);
        return view('admin.location.edit',compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $location =  Location::findOrFail($id);
        $location->name = $request->name;
        $location->slug = Str::slug($request->name);
        $location->show_at_home = $request->show_at_home;
        $location->status = $request->status;
        $location->save();

        toastr()->success('Location Updated Successfully');

        // return redirect()->route('admin.category.index');
        return to_route('admin.location.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Location::findOrFail($id)->delete();

            return response(['status'=> 'success','message'=>'Deleted Successfully']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status'=> 'error','message'=>$e->getMessage()]);
        }

    }
}
