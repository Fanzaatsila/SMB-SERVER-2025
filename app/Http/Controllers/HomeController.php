<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Client;
use App\Models\Activity;
use App\Models\City;
use App\Models\Timetable;
use App\Models\Brochure;
use App\Models\Training;
use App\Models\CertificationType;
use App\Models\TimetableType;

class HomeController extends Controller
{
    public function index() {
        try {
            $profile = Profile::all()->first();
            $activities = Activity::all();
            $cities = City::all();
            $clients = Client::all();
            $brochures = Brochure::all();
            $trainings = Training::with(['trainingType', 'city'])
                ->whereNotNull('start_date')
                ->orderBy('start_date', 'asc')
                ->get()
                ->map(function ($training) {
                    // Ensure dates are in Y-m-d format without timezone conversion
                    return [
                        'id' => $training->id,
                        'title' => $training->title,
                        'description' => $training->description,
                        'start_date' => $training->start_date instanceof \Carbon\Carbon 
                            ? $training->start_date->format('Y-m-d') 
                            : $training->start_date,
                        'end_date' => $training->end_date instanceof \Carbon\Carbon 
                            ? $training->end_date->format('Y-m-d') 
                            : $training->end_date,
                        'city' => $training->city,
                        'training_type' => $training->trainingType,
                    ];
                });
            
            // Get all timetable types with their associated timetables
            $timetableTypes = TimetableType::with('timetables')->get();
            
            // Create a mapping of timetable types to their timetables for easy access
            $timetables = [];
            foreach ($timetableTypes as $type) {
                $timetables[$type->id] = $type->timetables->first(); // Get first timetable for each type
            }
            
            // Load certification types for dropdown menu
            $certificationTypes = CertificationType::with('certifications')->get();
            
            // dd($profile);

            return view('index', [
                'profile' => $profile,
                'activities' => $activities,
                'cities' => $cities,
                'clients' => $clients,
                'brochures' => $brochures,
                'trainings' => $trainings,
                'timetableTypes' => $timetableTypes,
                'timetables' => $timetables,
                'certificationTypes' => $certificationTypes,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
