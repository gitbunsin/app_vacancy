<?php

use Illuminate\Database\Seeder;
use App\Model\terminationResons;
class terminateReasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            "Contract Not Renewed",
            "Deceased",
            "Dismissed",
            "Laid-off",
            "Other",
            "Physically Disabled/Compensated",
            "Resigned",
            "Resigned - Company Requested",
            "Resigned - Self Proposed",
            "Retired"
        );

        for ($i=0; $i < count($array); $i++) {
            terminationResons::create([
                'name' => $array[$i] ,
            ]);
        }
    }
}
