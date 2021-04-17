<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Role::Create([
            'name'=>'Super Admin',
            'slug'=>'super-admin'
            ]);

        Role::Create([
            'name'=>'Admin',
            'slug'=>'admin'
            ]);
            
        Role::Create([
            'name'=>'user',
            'slug'=>'user'
            ]);

    }
}
