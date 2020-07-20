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

        $this->call([

            ClientTypeSeeder::class,
            ChargingMethodSeeder::class,
            BusinessCategorySeeder::class,
            RoleSeeder::class
            
        ]);
        
    }
}
