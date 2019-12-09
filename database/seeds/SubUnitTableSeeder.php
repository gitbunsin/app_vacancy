<?php

use Illuminate\Database\Seeder;
use App\Model\SubUnit;
class SubUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SubUits  = [
            [
                'name' => 'Books',
                    'children' => [
                        [    
                            'name' => 'Comic Book',
                            'children' => [
                                    ['name' => 'Marvel Comic Book'],
                                    ['name' => 'DC Comic Book'],
                                    ['name' => 'Action comics'],
                            ],
                        ],
                        [    
                            'name' => 'Textbooks',
                                'children' => [
                                    ['name' => 'Business'],
                                    ['name' => 'Finance'],
                                    ['name' => 'Computer Science'],
                            ],
                        ],
                    ],
                ],
                [
                    'name' => 'Electronics',
                        'children' => [
                        [
                            'name' => 'TV',
                            'children' => [
                                ['name' => 'LED'],
                                ['name' => 'Blu-ray'],
                            ],
                        ],
                        [
                            'name' => 'Mobile',
                            'children' => [
                                ['name' => 'Samsung'],
                                ['name' => 'iPhone'],
                                ['name' => 'Xiomi'],
                            ],
                        ],
                    ],
                ],
        ];
        foreach($SubUits as $SubUit)
        {
            SubUnit::create($SubUit);
        }
    }
}
