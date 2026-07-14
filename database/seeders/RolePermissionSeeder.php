<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [

            'dashboard.view',

            'clients.view',
            'clients.create',
            'clients.edit',
            'clients.delete',

            'surveys.view',
            'surveys.create',
            'surveys.edit',
            'surveys.delete',

            'responses.view',
            'responses.delete',

            'reports.view',
            'reports.show',

            'users.view',
            'users.create',
            'users.edit',
            'users.delete',

            'roles.view',
            'roles.create',
            'roles.edit',
            'roles.delete',

            'settings.view',
            'settings.edit',

        ];

        foreach ($permissions as $permission) {

            Permission::firstOrCreate([
                'name' => $permission
            ]);

        }

        $superAdmin = Role::firstOrCreate([
            'name' => 'Super Admin'
        ]);

        $admin = Role::firstOrCreate([
            'name' => 'Admin'
        ]);

        $staff = Role::firstOrCreate([
            'name' => 'Staff'
        ]);

        $superAdmin->givePermissionTo(Permission::all());

        $admin->syncPermissions([

            'dashboard.view',

            'clients.view',
            'clients.create',
            'clients.edit',
            'clients.delete',

            'surveys.view',
            'surveys.create',
            'surveys.edit',
            'surveys.delete',

            'responses.view',
            'responses.delete',

            'reports.view',
            'reports.show',

            'users.view',

            'roles.view',

            'settings.view',
            'settings.edit',

        ]);

        $staff->syncPermissions([

            'dashboard.view',

            'clients.view',

            'surveys.view',

            'responses.view',

            'reports.view',
            'reports.show',

        ]);

        $user = User::find(1);

        if ($user && !$user->hasRole('Super Admin')) {

            $user->assignRole($superAdmin);

        }
    }

    
}
