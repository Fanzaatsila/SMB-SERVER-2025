<?php

namespace App\Imports;

use App\Models\Training;
use App\Models\City;
use App\Models\TrainingType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Carbon\Carbon;

/**
 * Training Import Class
 * 
 * Supported file types: .xlsx, .xls
 * 
 * Excel columns (header row required):
 * - judul_pelatihan / title: Training title (required)
 * - deskripsi / description: Training description
 * - tanggal_awal / start_date: Start date (required)
 * - tanggal_akhir / end_date: End date (required)
 * - kota / city: City name (must exist in database)
 * - jenis_pelatihan / training_type: Training type name (must exist in database)
 * 
 * Date formats supported:
 * - YYYY-MM-DD (2026-01-06) - RECOMMENDED
 * - DD/MM/YYYY (06/01/2026)
 * - DD-MM-YYYY (06-01-2026)
 * - Excel serial date number
 */
class TrainingImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    /**
     * Parse flexible date formats
     */
    private function parseDate($value)
    {
        if (empty($value)) {
            return null;
        }

        // If it's already a Carbon instance
        if ($value instanceof \Carbon\Carbon) {
            return $value->format('Y-m-d');
        }

        // If it's already in Y-m-d format
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
            return $value;
        }

        // Try to parse Excel serial date (numeric)
        if (is_numeric($value)) {
            try {
                return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)->format('Y-m-d');
            } catch (\Exception $e) {
                // Fall through to other parsing methods
            }
        }

        // Try various date formats
        $formats = [
            'Y-m-d',      // 2026-01-06
            'd/m/Y',      // 06/01/2026
            'm/d/Y',      // 01/06/2026
            'd-m-Y',      // 06-01-2026
            'Y/m/d',      // 2026/01/06
            'd M Y',      // 6 Jan 2026
            'd F Y',      // 6 January 2026
        ];

        foreach ($formats as $format) {
            try {
                $date = Carbon::createFromFormat($format, $value);
                if ($date) {
                    return $date->format('Y-m-d');
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        // Last resort: try Carbon parse
        try {
            return Carbon::parse($value)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Find city by name (case-insensitive)
     */
    private function findCity($cityName)
    {
        if (empty($cityName)) {
            return null;
        }

        return City::whereRaw('LOWER(name) = ?', [strtolower(trim($cityName))])->first();
    }

    /**
     * Find training type by name (case-insensitive)
     */
    private function findTrainingType($typeName)
    {
        if (empty($typeName)) {
            return null;
        }

        return TrainingType::whereRaw('LOWER(type) = ?', [strtolower(trim($typeName))])->first();
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Find related models
        $city = $this->findCity($row['kota'] ?? $row['city'] ?? null);
        $trainingType = $this->findTrainingType($row['jenis_pelatihan'] ?? $row['training_type'] ?? null);

        // Parse dates
        $startDate = $this->parseDate($row['tanggal_awal'] ?? $row['start_date'] ?? null);
        $endDate = $this->parseDate($row['tanggal_akhir'] ?? $row['end_date'] ?? null);

        return new Training([
            'title'            => $row['judul_pelatihan'] ?? $row['title'] ?? '',
            'description'      => $row['deskripsi'] ?? $row['description'] ?? '',
            'start_date'       => $startDate,
            'end_date'         => $endDate,
            'city_id'          => $city?->id,
            'training_type_id' => $trainingType?->id,
        ]);
    }

    public function rules(): array
    {
        return [
            '*.judul_pelatihan' => 'nullable|string|max:255',
            '*.title' => 'nullable|string|max:255',
            '*.tanggal_awal' => 'nullable',
            '*.start_date' => 'nullable',
            '*.tanggal_akhir' => 'nullable',
            '*.end_date' => 'nullable',
        ];
    }
}
