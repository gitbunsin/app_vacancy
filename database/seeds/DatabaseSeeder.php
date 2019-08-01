<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableDataSeeder::class);
         $this->call(AdminsTableDataSeeder::class);
         $this->call(CategoriesTableDataSeeder::class);
         $this->call(LocationsTableDataSeeder::class);
         $this->call(JobTypesTableDataSeeder::class);
         $this->call(CountriesTableDataSeeder::class);
         $this->call(CitiesTableDataSeeder::class);
         $this->call(SkillsTableDataSeeder::class);
    }
}
