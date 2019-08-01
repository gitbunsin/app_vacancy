<?php

use App\Model\JobType;
use App\Model\location;
use Illuminate\Database\Seeder;

class JobTypesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            "Full Time",
            "Part Time",
            "InternShip",
        );

        for ($i=0; $i < count($array); $i++) {
            JobType::create([
                'name' => $array[$i]
            ]);
        }
    }
}
