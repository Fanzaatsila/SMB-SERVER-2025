<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\City;
use App\Models\TrainingType;
use App\Models\Timetable;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Get all timetable types with their associated timetables
            $timetableTypes = TimetableType::with('timetables')->get();
            
            // Create a mapping of timetable types to their timetables for easy access
            $timetables = [];
            foreach ($timetableTypes as $type) {
                $timetables[$type->id] = $type->timetables->first(); // Get first timetable for each type
            }

            return view('jadwal', [
                'timetableTypes' => $timetableTypes,
                'timetables' => $timetables,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage()); // Debugging untuk menangkap error
        }
    }
}