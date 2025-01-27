<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function generateAdmin(string $name, string $email, string $password): void
    {
        User::truncate();
        User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => Hash::make($password),
        ]);
    }
}
