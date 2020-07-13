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
            
            ],

            [
                'name' => 'Billable',
                'description' => NULL,
                'created_at' => date("Y-m-d H:i:s")
                
            ],

            [
                'name' => 'Business',
                'description' => NULL,
                'created_at' => date("Y-m-d H:i:s")
                
            ],

            [
                'name' => 'Personal',
                'description' => NULL,
                'created_at' => date("Y-m-d H:i:s")
                
            ]
    );
    }
}
