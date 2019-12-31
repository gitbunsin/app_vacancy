<?php

use Illuminate\Database\Seeder;
use App\Model\currency;
class CurrencysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            "Dollar ($)",
            "Riel (៛)",
        );

        for ($i=0; $i < count($array); $i++) {
            currency::create([
                'name' => $array[$i],
            ]);
        }
    }
}
