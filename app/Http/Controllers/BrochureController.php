<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Brochure;

class BrochureController extends Controller
{    
    public function index() {
        try {
            // Filter brochures: hanya yang aktif dan belum melewati end_date atau tidak memiliki tanggal
            $today = now()->format('Y-m-d');
            
            // Get all active brochures (not paginated) to get all cities
            $allBrochures = Brochure::where('is_active', true)
                ->where(function ($query) use ($today) {
                    $query->whereNull('end_date')  // Tidak ada tanggal akhir
                        ->orWhere('end_date', '>=', $today);  // Atau tanggal akhir belum lewat
                })->get();

            // Get paginated brochures for display
            $brochures = Brochure::where('is_active', true)
                ->where(function ($query) use ($today) {
                    $query->whereNull('end_date')
                        ->orWhere('end_date', '>=', $today);
                })->paginate(6);

            // Get only cities that are assigned to active brochures (offline only, and non-null)
            $cities = $allBrochures
                ->where('is_online', false) // Only offline brochures have cities
                ->whereNotNull('city_id') // Only brochures with assigned cities
                ->pluck('city')
                ->unique('id')
                ->values();

            return view('brosur', [
                'cities' => $cities,
                'brochures' => $brochures,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
