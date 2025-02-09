<?php

namespace Database\Seeders;

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
        // Define roles
        $roles = ['Admin', 'Teacher', 'Student'];

        // Define permissions
        $permissions = [
            'view students', 'manage students',
            'view teachers', 'manage teachers',
            'view courses', 'manage courses',
            'create_post', 'edit_post', 'delete_post', 'view_post'
        ];

        // Create roles if they do not exist
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Create permissions if they do not exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        Role::findByName('Admin')->givePermissionTo(Permission::all());
        Role::findByName('Teacher')->givePermissionTo(['view students', 'manage students']);
        Role::findByName('Student')->givePermissionTo(['view courses']);
    }
}
