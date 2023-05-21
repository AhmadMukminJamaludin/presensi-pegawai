<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $user = Role::create(['name' => 'user', 'guard_name' => 'web']);

        // $permissions = [
        //     ['id' => 1, 'name' => 'edit-profile',],
        // ];

        // foreach ($permissions as $item) {
        //     Permission::create($item);
        // }

        // $user_permissions = [1, 2, 3, 4, 6, 7, 8, 9, 11];

        // $user->syncPermissions($user_permissions);
        // $admin->syncPermissions(Permission::all());
    }
}
