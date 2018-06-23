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
         $this->call(UsersTableSeeder::class);
         $this->call(ClinicTypesSeeder::class);
         $this->call(ReportTypesSeeder::class);
         $this->call(RolesTableSeeder::class);
    }
}
