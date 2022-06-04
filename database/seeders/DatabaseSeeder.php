<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumaat',
            'Sabtu',
            'Minggu'
        ];

        foreach($days as $day){
            \App\Models\WorksHourSalon::create([
                'day' => $day,
                'hour' => "10:00 - 20:00",
                'id_salon' => 1
            ]);
        }
    }
}
