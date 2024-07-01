<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ListingScheduleDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ListingScheduleController extends Controller
{
    public function index(ListingScheduleDataTable $dataTable) : JsonResponse
    {
        return $dataTable->render('admin.listings.listing-schedule.index');
    }

    public function create(){
        return view('admin.listings.listing-schedule.create');
    }
}
