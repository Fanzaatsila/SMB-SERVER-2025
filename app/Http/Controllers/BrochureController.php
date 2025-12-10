<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Brochure;

class BrochureController extends Controller
{    
    public function index() {
        try {
            $cities = City::all();
            $brochures = Brochure::paginate(6);

            return view('brosur', [
                'cities' => $cities,
                'brochures' => $brochures,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
