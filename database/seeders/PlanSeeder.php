<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'name' => 'Basic Plan',
            'storage_limit' => 50, // por ejemplo, en GB
            'bandwidth_limit' => 100, // en GB
            'ram_limit' => 2, // en GB
            'description' => 'Un plan básico para usuarios con necesidades limitadas.',
            'is_public' => true,
            'is_popular' => false,
        ]);

        Plan::create([
            'name' => 'Standard Plan',
            'storage_limit' => 200, // en GB
            'bandwidth_limit' => 500, // en GB
            'ram_limit' => 4, // en GB
            'description' => 'Plan estándar con más recursos para usuarios intermedios.',
            'is_public' => true,
            'is_popular' => true,
        ]);

        Plan::create([
            'name' => 'Premium Plan',
            'storage_limit' => 1000, // en GB
            'bandwidth_limit' => 2000, // en GB
            'ram_limit' => 16, // en GB
            'description' => 'Plan premium para empresas o usuarios con necesidades avanzadas.',
            'is_public' => true,
            'is_popular' => false,
        ]);
    }
}
