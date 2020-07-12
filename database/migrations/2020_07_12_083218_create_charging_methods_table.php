<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargingMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charging_methods', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            
            $table->string('name', 100)->unique();
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
        Schema::dropIfExists('charging_methods');
    }
}
