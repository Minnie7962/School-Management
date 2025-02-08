<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create roles
        $roles = ['Admin', 'Teacher', 'Student'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Optional: Define permissions and assign them
        $permissions = [
            'view students', 'manage students',
            'view teachers', 'manage teachers',
            'view courses', 'manage courses'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        Role::findByName('Admin')->givePermissionTo(Permission::all());
        Role::findByName('Teacher')->givePermissionTo(['view students', 'manage students']);
        Role::findByName('Student')->givePermissionTo(['view courses']);
    }
}
