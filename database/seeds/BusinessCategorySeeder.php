<?php

use Illuminate\Database\Seeder;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('business_categories')->insert(

            [
            'name' => 'Home Health Care',
            'description' => NULL,
            'created_at' => date("Y-m-d H:i:s")
            
            ]
         );

         DB::table('business_categories')->insert(

            [
            'name' => 'Hospice',
            'description' => NULL,
            'created_at' => date("Y-m-d H:i:s")
            
            ]
         );

    }
}
