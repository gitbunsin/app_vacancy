<?php

use Illuminate\Database\Seeder;
use App\Model\EmploymentStatus;
class EmployeeStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            "Freelance",
            "Full-Time Contract",
            "Full-Time Permanent",
            "Full-Time Probation",
            "Part-Time Contract",
            "Part-Time Internship"
        );

        for ($i=0; $i < count($array); $i++) {
            EmploymentStatus::create([
                'name' => $array[$i],
            ]);
        }
    }
}
