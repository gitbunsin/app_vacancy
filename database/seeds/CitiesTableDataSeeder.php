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
            "Banteay Meanchey",
            "Battambang",
            "Kampong Cham",
            "Kampong Chhnang",
            "Kampong Speu",
            "Kampong Thom",
            "Kampot",
            "Kandal",
            "Koh Kong",
            "Kratie",
            "Krong Keb",
            "Krong Pailin",
            "Krong Preah Sihanouk",
            "Mondulkiri",
            "Oddar Meanchey",
            "Pursat",
            "Preah Vihear",
            "Prey Veng",
            "Rattanakiri",
            "Siem Reab",
            "Steung Treng",
            "Svay Rieng",
            "Takeo",
            "Tbong Khmom"
        );

        for ($i=0; $i < count($array); $i++) {
            city::create([
                'name' => $array[$i]
            ]);
        }
    }
}
