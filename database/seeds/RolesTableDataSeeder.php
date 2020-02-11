<?php

use Illuminate\Database\Seeder;
use App\Model\Role;
class RolesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            "Admin",
            "Employee",
            "User"
        );

        for ($i=0; $i < count($array); $i++) {
            Role::create([
                'name' => $array[$i],
            ]);
        }
    }
}
