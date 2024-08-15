<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $staffRole = Role::create(['name' => 'staff']);
        $customerRole = Role::create(['name' => 'customer']);

        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage reservations']);
        Permission::create(['name' => 'manage payments']);
        Permission::create(['name' => 'submit queries']);

        $adminRole->givePermissionTo('manage users', 'manage reservations', 'manage payments');
        $staffRole->givePermissionTo('manage reservations', 'manage payments');
        $customerRole->givePermissionTo('submit queries');
    }
}
