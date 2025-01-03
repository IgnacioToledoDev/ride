<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class PayPalController extends Controller
{
    public function subscription(): Response
    {
        return Inertia::render('Checkout', []);
    }
}
