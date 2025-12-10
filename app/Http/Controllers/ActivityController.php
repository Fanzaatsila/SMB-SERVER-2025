<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\City;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::with('city')->paginate(6);
        $cities = City::all();
        
        return view('galeri', compact('activities', 'cities'));
    }
}
