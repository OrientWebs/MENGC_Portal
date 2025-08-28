<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // For Admin Role
        $allPermissions = Permission::where('guard_name', 'web')->get();


        $admin_role = Role::where('name', 'admin')->where('guard_name', 'web')->first();
        $admin_role?->givePermissionTo($allPermissions);


        // For Super Admin Role
        $super_admin_permissions = Permission::where('guard_name', 'web')
            ->whereIn('name', [
                'dashboard-access',
                'dashboard-login',
                'dashboard-settings',
                'user-access',
                'user-edit',
                'role-access',
                'role-create',
                'role-edit',
                'role-show',
                'user-create',
                'user-show',
                'setup-access',
            ])->get();

        $super_admin_role = Role::where('name', 'Super Admin')->where('guard_name', 'web')->first();
        $super_admin_role?->givePermissionTo($super_admin_permissions);


        // For User Role
        $user_permissions = Permission::where('guard_name', 'web')
            ->whereIn('name', [
                'dashboard-access',
                'user-access',
                'user-show'
            ])->get();

        $user_role = Role::where('name', 'user')->where('guard_name', 'web')->first();
        $user_role?->givePermissionTo($user_permissions);
    }
}
