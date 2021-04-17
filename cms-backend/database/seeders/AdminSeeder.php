<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = new User();
		$admin->name = 'Super Admin';
		$admin->user_name = 'super-admin';
		$admin->email = 'admin@gmail.com';
		$admin->is_verify = 1;
		$admin->password = bcrypt('admin123$');
        $admin->save();
		$admin_permission = Permission::all();
        $admin_role = Role::where('slug','super-admin')->first();
        $admin->roles()->attach($admin_role);
		$admin_role->permissions()->attach($admin_permission);

    }
}
