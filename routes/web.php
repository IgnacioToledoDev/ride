<?php

use App\Http\Controllers\ProfileController;
use App\Models\Plan;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'plans' => Plan::with(['features', 'planPricings'])
            ->where('is_public', true)
            ->get()
            ->flatMap(function ($plan) {
                return $plan->planPricings->map(function ($pricing) use ($plan) {
                    return [
                        'id' => $plan->id,
                        'plan_name' => $plan->name,
                        'price' => $pricing->price,
                        'billing_cycle' => $pricing->billing_cycle,
                        'features' => $plan->features->pluck('feature')->join(', '),
                        'is_popular' => (bool) $plan->is_popular,
                        'storage_limit' => $plan->storage_limit,
                        'bandwidth_limit' => $plan->bandwidth_limit,
                        'ram_limit' => $plan->ram_limit,
                    ];
                });
            })
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/Controller/PlanRoute.php';
