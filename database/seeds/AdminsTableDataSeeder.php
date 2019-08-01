<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminsTableDataSeeder extends Seeder
{
        //
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
    {
        for ($i=0; $i < 1; $i++) {
           Admin::create([
                'name' => "admin",
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$dBqiHWa/4fw12M/iseqtKOV1hJakRuOVEadCp0SlxeDoQ9d65.hli'
            ]);
        }
    }

}
