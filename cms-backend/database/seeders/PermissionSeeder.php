<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::Create([
            'name'=>'Add Employee',
            'slug'=>'add-employee'
            ]);

        Permission::Create([
            'name'=>'Edit Employee',
            'slug'=>'edit-employee'
            ]);

        Permission::Create([
            'name'=>'Delete Employee',
            'slug'=>'delete-employee'
            ]);

        Permission::Create([
            'name'=>'Add Roles',
            'slug'=>'add-roles'
            ]);

        Permission::Create([
            'name'=>'Edit Roles',
            'slug'=>'edit-roles'
            ]);

        Permission::Create([
            'name'=>'Delete Roles',
            'slug'=>'delete-roles'
            ]);

        Permission::Create([
            'name'=>'Add Permission',
            'slug'=>'add-permission'
            ]);

        Permission::Create([
            'name'=>'Edit Permission',
            'slug'=>'edit-permission'
            ]);

        Permission::Create([
            'name'=>'Delete Permission',
            'slug'=>'delete-permission'
            ]);
    }
}
