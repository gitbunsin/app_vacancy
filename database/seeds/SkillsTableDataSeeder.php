<?php

use App\Model\skill;
use Illuminate\Database\Seeder;

class SkillsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            "HTML5 & CSS",
            "PHP FrameWork",
            "ASP.NET MVC5",
            "PhotoShop & Design",
            "SQL & MYSQL"
        );

        for ($i=0; $i < count($array); $i++) {
            skill::create([
                'name' => $array[$i] ,
                'description' => ''
            ]);
        }
    }
}
