<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Plan;
use App\Models\PlanFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Get the plans
        $basicPlan = Plan::where('name', 'Basic Plan')->first();
        $standardPlan = Plan::where('name', 'Standard Plan')->first();
        $premiumPlan = Plan::where('name', 'Premium Plan')->first();

        // Get features
        $sslFree = Feature::where('feature', 'SSL Gratis')->first();
        $support24 = Feature::where('feature', 'Soporte 24/7')->first();
        $dailyBackup = Feature::where('feature', 'Backup Diario')->first();
        $performanceAnalysis = Feature::where('feature', 'Análisis de rendimiento')->first();
        $freeMigration = Feature::where('feature', 'Migración gratuita')->first();

        // Check if the features exist
        if (!$sslFree) {
            $sslFree = Feature::create(['feature' => 'SSL Gratis']);
        }
        if (!$support24) {
            $support24 = Feature::create(['feature' => 'Soporte 24/7']);
        }
        if (!$dailyBackup) {
            $dailyBackup = Feature::create(['feature' => 'Backup Diario']);
        }
        if (!$performanceAnalysis) {
            $performanceAnalysis = Feature::create(['feature' => 'Análisis de rendimiento']);
        }
        if (!$freeMigration) {
            $freeMigration = Feature::create(['feature' => 'Migración gratuita']);
        }

        // Associate features with plans
        PlanFeature::create([
            'plan_id' => $basicPlan->id,
            'feature_id' => $sslFree->id,
        ]);
        PlanFeature::create([
            'plan_id' => $basicPlan->id,
            'feature_id' => $dailyBackup->id,
        ]);

        PlanFeature::create([
            'plan_id' => $standardPlan->id,
            'feature_id' => $sslFree->id,
        ]);
        PlanFeature::create([
            'plan_id' => $standardPlan->id,
            'feature_id' => $support24->id,
        ]);
        PlanFeature::create([
            'plan_id' => $standardPlan->id,
            'feature_id' => $performanceAnalysis->id,
        ]);

        PlanFeature::create([
            'plan_id' => $premiumPlan->id,
            'feature_id' => $sslFree->id,
        ]);
        PlanFeature::create([
            'plan_id' => $premiumPlan->id,
            'feature_id' => $support24->id,
        ]);
        PlanFeature::create([
            'plan_id' => $premiumPlan->id,
            'feature_id' => $dailyBackup->id,
        ]);
        PlanFeature::create([
            'plan_id' => $premiumPlan->id,
            'feature_id' => $performanceAnalysis->id,
        ]);
        PlanFeature::create([
            'plan_id' => $premiumPlan->id,
            'feature_id' => $freeMigration->id,
        ]);
    }
}
