<?php

use App\Model\location;
use Illuminate\Database\Seeder;

class LocationsTableDataSeeder extends Seeder
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
            "Kampong Chhnang",
            "Kampong Cham",
            "Kampong Chhnang",
            "Banlung",
            "Banteay Meanchey",
            "Battambang",
            "Bavet",
            "Kampong Thom",
            "Kampot",
            "Kandal",
            "Kep",
            "Koh Kong",
            "Kratie",
            "Mondulkiri",
            "Oddor Meanchey",
            "Overseas",
            "Preah Sihanouk",
            "Preah Vihear",
            "Prey Veng",
            "Pursat",
            "Rattanakiri",
            "Siem Reap",
            "Svay Rieng",
            "Takeo",
            "Takhmao",

        );

        for ($i=0; $i < count($array); $i++) {
            location::create([
                'name' => $array[$i]
            ]);
        }
    }
}
