<?php

namespace App\Imports;

use App\Models\TrainingType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class TrainingTypeImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $typeName = trim($row['jenis_pelatihan'] ?? $row['type'] ?? '');

        if (empty($typeName)) {
            return null;
        }

        // Check if the training type already exists case-insensitively
        $existing = TrainingType::whereRaw('LOWER(type) = ?', [strtolower($typeName)])->first();
        if ($existing) {
            return null; // Skip duplicate
        }

        return new TrainingType([
            'type' => $typeName,
        ]);
    }

    public function rules(): array
    {
        return [
            '*.jenis_pelatihan' => 'nullable|string|max:255',
            '*.type' => 'nullable|string|max:255',
        ];
    }
}
