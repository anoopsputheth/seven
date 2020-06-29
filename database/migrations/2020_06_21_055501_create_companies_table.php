<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('name', 100)->unique();
            $table->string('contact_person', 100);
            $table->string('address', 200)->nullable();
            $table->string('phone', 100);
            $table->string('fax', 100)->nullable();
            $table->string('email', 100);
            $table->string('zip', 50)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
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
        Schema::dropIfExists('companies');
    }
}
