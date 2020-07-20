<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('roles')->insert(

            [
            'name' => 'superadmin',
            'description' => 'Super Admin Role',
            'created_at' => date("Y-m-d H:i:s")
            
            ]
         );

         DB::table('roles')->insert(

            [
            'name' => 'admin',
            'description' => 'Admin Role',
            'created_at' => date("Y-m-d H:i:s")
            
            ]
         );

         DB::table('roles')->insert(

            [
            'name' => 'privileged',
            'description' => 'Privileged Role',
            'created_at' => date("Y-m-d H:i:s")
            
            ]
         );

         DB::table('roles')->insert(

            [
            'name' => 'user',
            'description' => 'User Role',
            'created_at' => date("Y-m-d H:i:s")
            
            ]
         );

    }
}
