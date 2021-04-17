<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccountParentChildAssociation;

class AccountParentChildSeeder extends Seeder
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
                'parent_id' => '1',
                'child_id' => '3',
            ],
            [
                'parent_id' => '1',
                'child_id' => '4',
            ],
            [
                'parent_id' => '1',
                'child_id' => '5',
            ],
            [
                'parent_id' => '2',
                'child_id' => '6',
            ],
            [
                'parent_id' => '2',
                'child_id' => '7',
            ],
            [
                'parent_id' => '2',
                'child_id' => '8',
            ]
        ];

        foreach ($items as $item) {
            AccountParentChildAssociation::create($item);
        }
    }
}
