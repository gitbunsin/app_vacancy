<?php

use App\Model\country;
use Illuminate\Database\Seeder;

class CountriesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            "Cambodia",
            "Thailand",
            "Armenia",
        );

        for ($i=0; $i < count($array); $i++) {
            country::create([
                'name' => $array[$i]
            ]);
        }
    }
}
