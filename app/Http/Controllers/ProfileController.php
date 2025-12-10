<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\CertificationType;

class ProfileController extends Controller
{
    public function index() {
        try {
            $profile = Profile::all()->first();
            $certificationTypes = CertificationType::with('certifications')->get();

            return view('profil', [
                'profile' => $profile,
                'certificationTypes' => $certificationTypes,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
