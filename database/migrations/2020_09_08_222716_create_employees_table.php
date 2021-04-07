<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('gender')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('status')->default('active');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
