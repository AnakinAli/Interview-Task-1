<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function generateAdmin(string $name, string $email, string $password)
    {
        User::truncate();
        User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => Hash::make($password),
        ]);
    }
}
