<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_action', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->bigInteger('role_id')->unsigned();
            $table->string('action', 100);
            

            $table->timestamps();
            $table->softDeletesTz('deleted_at');

            $table->foreign('role_id')->references('id')->on('roles')->onCascade('delete');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_action');
    }
}
