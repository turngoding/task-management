<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class PermissionAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create([
            'name' => 'create users',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'update users',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'activate users',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'disable users',
            'guard_name' => 'web'
        ]);

        $role = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $role->givePermissionTo('create users');
        $role->givePermissionTo('update users');
    }
}
