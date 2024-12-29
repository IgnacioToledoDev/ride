<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Feature::create(['feature' => 'SSL Gratis']);
        Feature::create(['feature' => 'Soporte 24/7']);
        Feature::create(['feature' => 'Backup Diario']);
        Feature::create(['feature' => 'Análisis de rendimiento']);
        Feature::create(['feature' => 'Migración gratuita']);
    }
}
