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
            
            // Filter brochures: hanya yang aktif dan belum melewati end_date atau tidak memiliki tanggal
            $today = now()->format('Y-m-d');
            $brochures = Brochure::where('is_active', true)
                ->where(function ($query) use ($today) {
                    $query->whereNull('end_date')  // Tidak ada tanggal akhir
                        ->orWhere('end_date', '>=', $today);  // Atau tanggal akhir belum lewat
                })->paginate(6);

            return view('brosur', [
                'cities' => $cities,
                'brochures' => $brochures,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
