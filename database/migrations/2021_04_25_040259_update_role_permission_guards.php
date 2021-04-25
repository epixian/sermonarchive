<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UpdateRolePermissionGuards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Role::all()
            ->each(function ($role) {
                $role->update(['guard_name' => 'sanctum']);
            });

        Permission::all()
            ->each(function ($permission) {
                $permission->update(['guard_name' => 'sanctum']);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Role::all()
            ->each(function ($role) {
                $role->update(['guard_name' => 'web']);
            });

        Permission::all()
            ->each(function ($permission) {
                $permission->update(['guard_name' => 'web']);
            });
    }
}
