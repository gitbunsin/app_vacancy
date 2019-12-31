<?php

use Illuminate\Database\Seeder;
use App\Model\nationality;
class NationalitysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            "Cambodian",
            "Japanese",
            "Vietnamese",
            "Thailand",
        );

        for ($i=0; $i < count($array); $i++) {
            nationality::create([
                'name' => $array[$i],
            ]);
        }
    }
}
