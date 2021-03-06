<?php

use Illuminate\Database\Seeder;

class ClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_types')->insert(

            [
            'name' => 'Non Billable',
            'description' => NULL,
            'created_at' => date("Y-m-d H:i:s")
            
            ]
         );

         DB::table('client_types')->insert(

            [
            'name' => 'Billable',
            'description' => NULL,
            'created_at' => date("Y-m-d H:i:s")
            
            ]
         );

         DB::table('client_types')->insert(

            [
            'name' => 'Business',
            'description' => NULL,
            'created_at' => date("Y-m-d H:i:s") 
            
            ]
         );

         DB::table('client_types')->insert(

            [
            'name' => 'Personal',
            'description' => NULL,
            'created_at' => date("Y-m-d H:i:s")
            
            ]
         );

    }
}
