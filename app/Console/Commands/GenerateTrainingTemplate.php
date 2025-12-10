<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TrainingTemplateExport;

class GenerateTrainingTemplate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'training:generate-template';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Excel template for training import';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = public_path('templates/template_pelatihan.xlsx');
        
        Excel::store(new TrainingTemplateExport(), 'templates/template_pelatihan.xlsx', 'public');
        
        $this->info('Template berhasil dibuat di: ' . $path);
        $this->info('Kolom yang tersedia:');
        $this->info('  - judul_pelatihan: Judul pelatihan (wajib)');
        $this->info('  - deskripsi: Deskripsi pelatihan');
        $this->info('  - tanggal_awal: Format YYYY-MM-DD (contoh: 2026-01-06)');
        $this->info('  - tanggal_akhir: Format YYYY-MM-DD (contoh: 2026-01-11)');
        $this->info('  - kota: Nama kota (harus sudah ada di database)');
        $this->info('  - jenis_pelatihan: Nama jenis pelatihan (harus sudah ada di database)');
        $this->newLine();
        $this->info('Format tanggal yang didukung:');
        $this->info('  - YYYY-MM-DD (2026-01-06) - RECOMMENDED');
        $this->info('  - DD/MM/YYYY (06/01/2026)');
        $this->info('  - DD-MM-YYYY (06-01-2026)');
        $this->info('  - Excel date serial number');
        
        return Command::SUCCESS;
    }
}

