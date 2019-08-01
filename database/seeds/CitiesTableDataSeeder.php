<?php

use App\Model\city;
use Illuminate\Database\Seeder;

class CitiesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            "Phnom Penh",
        );

        for ($i=0; $i < count($array); $i++) {
            city::create([
                'name' => $array[$i]
            ]);
        }
    }
}
