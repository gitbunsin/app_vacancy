<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 1; $i++) {
            User::create([
                'name' => "user",
                'email' => 'bunsin.toeng@gmail.com',
                'password' => '$2y$10$dBqiHWa/4fw12M/iseqtKOV1hJakRuOVEadCp0SlxeDoQ9d65.hli'
            ]);
        }
    }

}
