<?php

use Illuminate\Database\Seeder;
use App\Model\ReportingMethod;
class ReportingMethodTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            "Direct",
            "Indirect",
        );
        for ($i=0; $i < count($array); $i++) {
            ReportingMethod::create([
                'name' => $array[$i],
                'admin_id' => 1
            ]);
        }
    }
}
