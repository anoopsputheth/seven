<?php

use Illuminate\Database\Seeder;

class ChargingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('charging_methods')->insert(

            [
            'name' => 'Hourly',
            'description' => NULL,
            'created_at' => date("Y-m-d H:i:s")
            
            ]
         );

         DB::table('charging_methods')->insert(

            [
            'name' => 'Yearly',
            'description' => NULL,
            'created_at' => date("Y-m-d H:i:s")
            
            ]
         );

         DB::table('charging_methods')->insert(

            [
            'name' => 'Monthly',
            'description' => NULL,
            'created_at' => date("Y-m-d H:i:s")
            
            ]
         );

    }
}
