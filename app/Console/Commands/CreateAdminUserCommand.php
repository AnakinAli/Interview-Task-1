<?php

namespace App\Console\Commands;

use App\Services\UserService;
use Illuminate\Console\Command;

class CreateAdminUserCommand extends Command
{
    protected $signature = 'admin:create {--name=admin} {--email=admin@admin.com} {--password=secret}';

    protected $description = 'This command will create an admin user';

    public function handle(): void
    {
        $name     = $this->option('name');
        $email    = $this->option('email');
        $password = $this->option('password');

        app(UserService::class)->generateAdmin($name, $email, $password);

        $this->table(['Name', 'Email', 'Password'], [[$name, $email, $password]]);
    }
}
