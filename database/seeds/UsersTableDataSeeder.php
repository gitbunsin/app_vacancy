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
                'password' => Hash::make("123456"),
                'verified' => 1,
            ]);
        }
    }

}
