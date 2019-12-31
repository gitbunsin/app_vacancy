<?php

use Illuminate\Database\Seeder;
use App\Model\payPeriod;
class PayPeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            "Bi Weekly",
            "Hourly",
            "Monthly",
            "Monthly on first pay of month.",
            "Semi Monthly",
            "Weekly"
        );

        for ($i=0; $i < count($array); $i++) {
            payPeriod::create([
                'name' => $array[$i],
            ]);
        }
    }
}
