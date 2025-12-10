<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certification;
use App\Models\Timetable;
use App\Models\TimetableType;

class CertificationController extends Controller
{
    public function layanan() {
        try {
            $certifications = Certification::with('certificationType')
                ->whereHas('certificationType', function ($query) {
                    $query->where('type', 'Reguler');
                })
                ->get();

            return view('layanan', [
                'certifications' => $certifications,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function layananSertifikasi() {
        try {
            //pelayanan-cert
            $certifications = Certification::with('certificationType')
                ->whereHas('certificationType', function ($query) {
                    $query->where('type', 'Sertifikasi');
                })
                ->get();

            return view('pelayanan-cert', [
                'certifications' => $certifications,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function layananNonSertifikasi() {
        try {
            //pelayanan-cert
            $certifications = Certification::with('certificationType')
                ->whereHas('certificationType', function ($query) {
                    $query->where('type', 'Non Sertifikasi');
                })
                ->get();

            return view('pelayanan-noncert', [
                'certifications' => $certifications,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function detail($id) {
        try {
            $certification = Certification::with('certificationType')->findOrFail($id);
            $certificationTypes = \App\Models\CertificationType::with('certifications')->get();
            
            // Get timetable types for dropdown
            $timetableTypes = TimetableType::all();
            
            // Get timetables grouped by type ID
            $timetables = [];
            foreach ($timetableTypes as $type) {
                $timetable = Timetable::where('timetable_type_id', $type->id)->first();
                if ($timetable) {
                    $timetables[$type->id] = $timetable;
                }
            }

            return view('certification-detail', [
                'certification' => $certification,
                'certificationTypes' => $certificationTypes,
                'timetableTypes' => $timetableTypes,
                'timetables' => $timetables,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
