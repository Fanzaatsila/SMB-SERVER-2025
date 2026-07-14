<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TrainingTypeTemplateExport;

class GenerateTrainingTypeTemplate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'training:generate-type-template';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Excel template for training type import';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = public_path('templates/template_jenis_pelatihan.xlsx');
        
        Excel::store(new TrainingTypeTemplateExport(), 'templates/template_jenis_pelatihan.xlsx', 'public');
        
        if (!file_exists(public_path('templates'))) {
            mkdir(public_path('templates'), 0755, true);
        }
        copy(storage_path('app/public/templates/template_jenis_pelatihan.xlsx'), $path);
        
        $this->info('Template berhasil dibuat di: ' . $path);
        $this->info('Kolom yang tersedia:');
        $this->info('  - jenis_pelatihan: Nama Jenis Pelatihan (wajib)');
        
        return Command::SUCCESS;
    }
}
