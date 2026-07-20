<?php

namespace App\Console\Commands;

use App\Models\Activity;
use App\Models\Training;
use Illuminate\Console\Command;

class SyncActivitiesFromExpiredTrainings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'activities:sync-expired-trainings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Buat Activity otomatis untuk Training yang tanggal akhirnya sudah lewat dan belum punya Activity';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $trainings = Training::whereDate('end_date', '<', now())
            ->whereDoesntHave('activity')
            ->get();

        $count = 0;

        foreach ($trainings as $training) {
            $isOnline = $training->city_id ? 0 : 1;

            $description = collect([
                $training->title,
                $training->start_date->format('d M Y') . ' - ' . $training->end_date->format('d M Y'),
                'Mekanisme: ' . ($isOnline ? 'Online' : 'Offline'),
                $training->city ? 'Kota: ' . $training->city->name : null,
            ])->filter()->implode("\n");

            Activity::create([
                'training_id' => $training->id,
                'title' => $training->title,
                'description' => $description,
                'image' => null,
                'is_online' => $isOnline,
                'city_id' => $training->city_id,
            ]);

            $count++;
        }

        $this->info("Berhasil membuat {$count} activity baru dari training yang sudah selesai.");

        return self::SUCCESS;
    }
}
