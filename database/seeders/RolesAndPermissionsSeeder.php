<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Permissions
        $permissions = ['create_post', 'edit_post', 'delete_post', 'view_post'];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create Roles
        $roles = ['admin', 'editor', 'viewer'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
