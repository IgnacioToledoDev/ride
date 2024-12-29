<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PlanController extends Controller
{
    public function index(): Response
    {
        $plans = Plan::with('features')
            ->with('plan_pricing')
            ->where(['isPublic' => true])
            ->get();

        return Inertia::render('Plans/PricingPlans', ['plans' => $plans]);
    }
}
