<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = [
            'name' => env('SUPERADMIN_NAME', 'Turi Malik'),
            'email' => env('SUPERADMIN_EMAIL', 'turimalik24000@gmaill.com'),
            'password' => env('SUPERADMIN_PASSWORD', 'taskmanagement123'),
        ];

        $role = Role::create(['name' => 'superadmin', 'guard_name' => 'web']);
        $user = \App\Models\User::factory()->create([
            'name' => $superadmin['name'],
            'email' => $superadmin['email'],
            'password' => Hash::make($superadmin['password']),
        ]);
        $user->assignRole([$role['id']]);

    }
}
