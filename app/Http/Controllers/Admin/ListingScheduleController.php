<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ListingScheduleDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ListingScheduleStoreRequest;
use App\Models\ListingSchedule;
use Illuminate\View\View;
use Illuminate\Http\Response;
use App\Models\Listing;

class ListingScheduleController extends Controller
{
    public function index(ListingScheduleDataTable $dataTable, string $listingId)
    {
        $dataTable->with('listingId', $listingId);
        return $dataTable->render('admin.listings.listing-schedule.index',compact('listingId'));
    }

    public function create(Request $request, string $listingId){
        return view('admin.listings.listing-schedule.create',compact('listingId'));
    }

    public function store(ListingScheduleStoreRequest $request, string $listingId) : RedirectResponse
    {
        $schedule = new ListingSchedule();
        $schedule->listing_id = $listingId;
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->status = $request->status;
        $schedule->save();

        toastr()->success('Created Successfully!');

        return to_route('admin.listing-schedule.index', $listingId);
    }

    public function edit(string $id)
    {
       $schedule = ListingSchedule::findOrFail($id);
       return view('admin.listings.listing-schedule.edit',compact('schedule'));
    }

    public function update(ListingScheduleStoreRequest $request, string $id) {

        $schedule = ListingSchedule::findOrFail($id);
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->status = $request->status;
        $schedule->save();

        toastr()->success('Update Successfully!');

        return to_route('admin.listing-schedule.index', $schedule->listing_id);
    }


    public function destroy(string $id)
    {
        try {
            $schedule = ListingSchedule::findOrFail($id);
            $schedule->delete();

            return response(['status' => 'success', 'message' => 'Deleted successfully!']);
        }catch(\Exception $e){
            logger($e);
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }



}
