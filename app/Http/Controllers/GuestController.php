<?php

namespace App\Http\Controllers;

class GuestController extends Controller
{
    public function index()
    {
        return to_route('login');
    }
}
