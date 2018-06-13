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
            $table->string('emp_id');
            $table->integer('department');
            $table->integer('designation');
            $table->integer('location');
            $table->integer('hiring_source');
            $table->date('hiring_date');
            $table->date('termination_date');
            $table->date('date_of_birth');
            $table->integer('reporting_to');
            $table->float('pay_rate', 8, 2);
            $table->string('pay_type');
            $table->string('type');
            $table->string('status');
                        
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
