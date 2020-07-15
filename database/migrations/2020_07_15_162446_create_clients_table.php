<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
           
            $table->bigIncrements('id');

            $table->string('lastname', 100)->nullable();
            $table->string('firstname', 100)->nullable();
            $table->string('businessname', 200)->nullable();
            $table->bigInteger('client_type_id');
            $table->bigInteger('company_id');
            $table->string('address', 200)->nullable();
            $table->string('zip', 50)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('contact_person_1', 100)->nullable();
            $table->string('contact_person_2', 100)->nullable();
            $table->string('contact_person_3', 100)->nullable();
            $table->string('contact_person_1_role', 100)->nullable();
            $table->string('contact_person_2_role', 100)->nullable();
            $table->string('contact_person_3_role', 100)->nullable();
            $table->string('phone_1', 100)->nullable();
            $table->string('phone_2', 100)->nullable();
            $table->string('cell_no', 100)->nullable();
            $table->string('fax', 100)->nullable();
            $table->string('email_1', 100);
            $table->string('email_2', 100)->nullable();
            $table->string('email_3', 100)->nullable();
            $table->string('email_3', 100)->nullable();
 


           
            
            
            
            $table->string('description')->nullable();

            $table->timestamps();
            $table->softDeletesTz('deleted_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
