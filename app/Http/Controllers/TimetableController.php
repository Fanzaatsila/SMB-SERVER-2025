<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;

class TimetableController extends Controller
{
    public function openPdf() {
        try {
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
            
            return view('partials.header', [
                'onlineTimetable' => $onlineTimetable,
                'inTheCityTimetable' => $inTheCityTimetable,
                'outOfTownTimetable' => $outOfTownTimetable,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
