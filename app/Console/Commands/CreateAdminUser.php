<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create';

    protected $description = 'Create the first NESOSTAR administrator account';

    public function handle(): int
    {
        $this->info('NESOSTAR - Create Administrator Account');
        $this->newLine();

        $name = trim((string) $this->ask('Administrator name'));

        if ($name === '') {
            $this->error('Name is required.');
            return self::FAILURE;
        }

        $email = strtolower(trim((string) $this->ask('Administrator email')));

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Please provide a valid email address.');
            return self::FAILURE;
        }

        if (User::where('email', $email)->exists()) {
            $this->error('This email already belongs to an existing user.');
            $this->line('No account was changed. Use a different email address.');
            return self::FAILURE;
        }

        $password = $this->secret('Password (minimum 12 characters)');

        if (! is_string($password) || strlen($password) < 12) {
            $this->error('Password must contain at least 12 characters.');
            return self::FAILURE;
        }

        $confirmation = $this->secret('Confirm password');

        if (! is_string($confirmation) || ! hash_equals($password, $confirmation)) {
            $this->error('The passwords do not match.');
            return self::FAILURE;
        }

        $admin = new User();
        $admin->name = $name;
        $admin->email = $email;
        $admin->password = $password;
        $admin->is_admin = true;
        $admin->save();

        $this->newLine();
        $this->info('Administrator account created successfully.');
        $this->line('Name: '.$admin->name);
        $this->line('Email: '.$admin->email);
        $this->line('Administrator access: Enabled');

        return self::SUCCESS;
    }
}
