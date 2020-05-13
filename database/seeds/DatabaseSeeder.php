<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        // Reset cached roles/permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'edit_users']);
        Permission::create(['name' => 'edit_services']);
        Permission::create(['name' => 'edit_sermons']);
        Permission::create(['name' => 'participate']);

        $role = Role::create(['name' => 'regular_user'])
            ->givePermissionTo(['participate']);
        $role = Role::create(['name' => 'stream_technician'])
            ->givePermissionTo(['edit_sermons', 'participate']);
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());
        $role = Role::create(['name' => 'owner'])
            ->givePermissionTo(Permission::all());
    }
}
