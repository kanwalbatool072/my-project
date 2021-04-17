<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccountCategory;
class AccountCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [            
            [
                'account_name' => 'CLIC',
                'account_id' => '10000',
                'description' => 'CLIC',
                'bussiness_use' => ''
            ],
            [
                'account_name' => 'DEAD',
                'account_id' => '20000',
                'description' => 'DEAD',
                'bussiness_use' => ''
            ],
            [
                'account_name' => 'Laibilities',
                'account_id' => '10001',
                'description' => 'CLIC',
                'bussiness_use' => ''
            ],
            [
                'account_name' => 'Income',
                'account_id' => '10002',
                'description' => 'CLIC',
                'bussiness_use' => ''
            ],
            [
                'account_name' => 'Capital',
                'account_id' => '10003',
                'description' => 'CLIC',
                'bussiness_use' => ''
            ],
            [
                'account_name' => 'Expenses',
                'account_id' => '20001',
                'description' => 'DEAD',
                'bussiness_use' => ''
            ],
            [
                'account_name' => 'Assets',
                'account_id' => '20002',
                'description' => 'DEAD',
                'bussiness_use' => ''
            ],
            [
                'account_name' => 'Drawings',
                'account_id' => '20003',
                'description' => 'DEAD',
                'bussiness_use' => ''
            ]
        ];

        foreach ($items as $item) {
            AccountCategory::create($item);
        }
    }
}
