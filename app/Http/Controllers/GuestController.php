<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class GuestController extends Controller
{
    public function index()
    {
        return to_route('login');
    }
}
