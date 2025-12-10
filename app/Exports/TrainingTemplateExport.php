<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class TrainingTemplateExport implements FromArray, WithHeadings, WithStyles, WithColumnWidths
{
    public function array(): array
    {
        return [
            [
                'Sertifikasi',
                'Deskripsi pelatihan sertifikasi',
                '2026-01-06',
                '2026-01-11',
                'Bandung',
                'Ahli K3'
            ],
            [
                'Sertifikasi K3',
                'Pelatihan K3 Listrik untuk teknisi',
                '2026-01-15',
                '2026-01-20',
                'Jakarta',
                'K3 Listrik'
            ],
        ];
    }

    public function headings(): array
    {
        return [
            'judul_pelatihan',
            'deskripsi',
            'tanggal_awal',
            'tanggal_akhir',
            'kota',
            'jenis_pelatihan'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '0EA5E9']
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 40,
            'C' => 15,
            'D' => 15,
            'E' => 15,
            'F' => 25,
        ];
    }
}
