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
                'name' => 'Phnom Penh Security',  
                ],
        ];
        foreach($SubUits as $SubUit)
        {
            SubUnit::create($SubUit);
        }
    }
}
