<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
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

      // create permissions

      $permissions = [
         'role-list',
         'role-create',
         'role-edit',
         'role-delete',
      ];

      foreach ($permissions as $permission) {
           Permission::create(['name' => $permission]);
      }

      // create roles and assign created permissions

      // this can be done as separate statements
      $role = \Cobierto\Acl\Models\Role::create(['name' => 'admin','guard_name' => 'web']);
      $role->givePermissionTo(Permission::all());
    }
}
