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
         $this->call(RolesTableDataSeeder::class);
         $this->call(UsersTableDataSeeder::class);
         $this->call(AdminsTableDataSeeder::class);
         $this->call(CategoriesTableDataSeeder::class);
         $this->call(ProvincesTableSeeder::class);
         $this->call(EmployeeStatusTableSeeder::class);
         $this->call(JobTitlesTableSeeder::class);
         $this->call(NationalitysTableSeeder::class);
         $this->call(CurrencysTableSeeder::class);
         $this->call(terminateReasonsTableSeeder::class);
         $this->call(PayPeriodsTableSeeder::class);
        $this->call(JobTypesTableDataSeeder::class);
         $this->call(CountriesTableDataSeeder::class);
        $this->call(CitiesTableDataSeeder::class);
         $this->call(SkillsTableDataSeeder::class);
         $this->call(ReportingMethodTableDataSeeder::class);
         
    }
}
