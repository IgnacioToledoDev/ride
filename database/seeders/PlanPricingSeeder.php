<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\PlanPricing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanPricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $basicPlan = Plan::where('name', 'Basic Plan')->first();
        $standardPlan = Plan::where('name', 'Standard Plan')->first();
        $premiumPlan = Plan::where('name', 'Premium Plan')->first();

        PlanPricing::create([
            'plan_id' => $basicPlan->id,
            'price' => 10.00, // Precio mensual
            'billing_cycle' => PlanPricing::MONTHLY,
        ]);

        PlanPricing::create([
            'plan_id' => $basicPlan->id,
            'price' => 100.00, // Precio anual
            'billing_cycle' => PlanPricing::YEARLY,
        ]);

        PlanPricing::create([
            'plan_id' => $standardPlan->id,
            'price' => 20.00, // Precio mensual
            'billing_cycle' => PlanPricing::MONTHLY,
        ]);

        PlanPricing::create([
            'plan_id' => $standardPlan->id,
            'price' => 200.00, // Precio anual
            'billing_cycle' => PlanPricing::YEARLY,
        ]);

        PlanPricing::create([
            'plan_id' => $premiumPlan->id,
            'price' => 50.00, // Precio mensual
            'billing_cycle' => PlanPricing::MONTHLY,
        ]);

        PlanPricing::create([
            'plan_id' => $premiumPlan->id,
            'price' => 500.00, // Precio anual
            'billing_cycle' => PlanPricing::YEARLY,
        ]);
    }
}
