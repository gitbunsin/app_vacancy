<?php

use Illuminate\Database\Seeder;
use App\Model\jobTitle;
class JobTitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            "Account",
            "CEO",
            "Finance Manager",
            "HR Executive",
            "HR Manager",
            "IT Executive",
            "IT Manager",
            "Sales Executive",
            "Sales Manager"
        );

        for ($i=0; $i < count($array); $i++) {
            jobTitle::create([
                'name' => $array[$i],
                'description' => ' '
            ]);
        }
    }
}
