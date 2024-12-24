<?php

namespace App\Http\Controllers;

use App\Models\RideActivity;
use Illuminate\Http\Request;

class RideActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }
    public function rideList(){
        $rideActivityRecords = RideActivity::all();
        return view('admin.ride_activity.list',compact('rideActivityRecords'));
    }
}
