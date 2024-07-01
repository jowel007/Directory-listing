<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ListingScheduleDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ListingScheduleStoreReqeust;
use App\Http\Requests\Admin\ListingScheduleStoreRequest;
use App\Models\ListingSchedule;

class ListingScheduleController extends Controller
{
    public function index(ListingScheduleDataTable $dataTable)
    {
        return $dataTable->render('admin.listings.listing-schedule.index');
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

        return to_route('admin.listing-schedule.index', ['id' => $listingId]);
    }



}
