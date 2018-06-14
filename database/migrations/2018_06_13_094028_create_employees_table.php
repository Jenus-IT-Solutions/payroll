<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->integer('user_id');
            $table->string('emp_id')->nullable();
            $table->integer('department')->nullable();
            $table->integer('designation')->nullable();
            $table->integer('location')->nullable();
            $table->integer('hiring_source')->nullable();
            $table->date('hiring_date');
            $table->date('termination_date');
            $table->date('date_of_birth');
            $table->integer('reporting_to')->nullable();
            $table->float('pay_rate', 8, 2)->nullable();
            $table->string('pay_type')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
                        
            $table->timestamps();
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
