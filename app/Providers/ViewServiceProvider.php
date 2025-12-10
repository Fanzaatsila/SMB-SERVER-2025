<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Timetable;
use App\Models\CertificationType;
use App\Models\TimetableType;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('partials.header', function ($view) {
            $onlineTimetable = Timetable::with('timetableType')
                ->whereHas('timetableType', function ($query) {
                    $query->where('type', 'Online');
                })
                ->first();

            $inTheCityTimetable = Timetable::with('timetableType')
                ->whereHas('timetableType', function ($query) {
                    $query->where('type', 'Offline Kota Bandung');
                })
                ->first();

            $outOfTownTimetable = Timetable::with('timetableType')
                ->whereHas('timetableType', function ($query) {
                    $query->where('type', 'Offline di Daerah');
                })
                ->first();

            // Load certification types with their certifications
            $certificationTypes = CertificationType::with('certifications')->get();
            
            // Get all timetable types with their associated timetables for dropdown menu
            $timetableTypes = TimetableType::with('timetables')->get();
            
            // Create a mapping of timetable types to their timetables for easy access
            $timetables = [];
            foreach ($timetableTypes as $type) {
                $timetables[$type->id] = $type->timetables->first(); // Get first timetable for each type
            }
            
            // Debug: uncomment to check data
            // \Log::info('CertificationTypes count: ' . $certificationTypes->count());

            $view->with(compact('onlineTimetable', 'inTheCityTimetable', 'outOfTownTimetable', 'certificationTypes', 'timetableTypes', 'timetables'));
        });
    }
}
