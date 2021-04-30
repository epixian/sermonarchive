<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles/permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'participate']);
        Permission::create(['name' => 'record_attendance']);
        Permission::create(['name' => 'edit_sermons']);
        Permission::create(['name' => 'edit_services']);
        Permission::create(['name' => 'edit_users']);

        Role::create(['name' => 'regular_user'])->givePermissionTo(['participate']);
        Role::create(['name' => 'stream_technician'])->givePermissionTo(['edit_sermons', 'participate']);
        Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
        Role::create(['name' => 'owner'])->givePermissionTo(Permission::all());
    }
}
