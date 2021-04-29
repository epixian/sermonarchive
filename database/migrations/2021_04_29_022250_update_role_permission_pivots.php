<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UpdateRolePermissionPivots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ( DB::table('model_has_roles')->get() as $pivot ) {
            $role = Role::find($pivot->role_id);
            $user = User::find($pivot->model_id);

            $user->assignRole($role->name);
        }

        foreach ( DB::table('model_has_permissions')->get() as $pivot ) {
            $permission = Permission::find($pivot->permission_id);
            $user = User::find($pivot->model_id);

            $user->givePermissionTo($permission->name);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
