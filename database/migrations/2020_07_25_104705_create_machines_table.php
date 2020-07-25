<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
           
            $table->bigIncrements('id');

            $table->string('name', 100);

            $table->bigInteger('client_id')->unsigned();

            $table->enum('type', ['client', 'server']);

            $table->bigInteger('operating_system_id')->unsigned();

            $table->enum('ip_address_type', ['static', 'dynamic']);

            $table->string('ip_address', 100)->nullable();

            $table->string('subnet_mask', 100)->nullable();

            $table->string('default_gateway', 100)->nullable();

            $table->string('preferred_dns_server', 100)->nullable();

            $table->string('alternate_dns_server', 100)->nullable();

            $table->string('machine_ram', 20)->nullable();

            $table->string('server_tag_no', 50)->nullable();

            $table->enum('daily_backup', ['no', 'yes']);

            $table->enum('weekly_backup', ['no', 'yes']);

            $table->string('description')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
