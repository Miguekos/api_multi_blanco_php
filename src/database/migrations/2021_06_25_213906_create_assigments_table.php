<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssigmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('processor_id')->nullable();
            $table->unsignedBigInteger('operator_id')->nullable();
            $table->unsignedBigInteger('specialty_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string('registration_id')->nullable();
            $table->string('customer')->nullable();
            $table->string('processor')->nullable();
            $table->string('specialty')->nullable();
            $table->string('description')->nullable();
            $table->string('comment')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('policy_number')->nullable();
            $table->string('insurance_company')->nullable();
            $table->string('insurance_phone')->nullable();
            $table->datetime('date')->nullable();
            $table->datetime('start')->nullable();
            $table->datetime('end')->nullable();
            $table->timestamps();


            /*$table->foreign('customer_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('processor_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('operator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('specialty_id')
                ->references('id')
                ->on('specialties')
                ->onDelete('cascade');

            $table->foreign('status_id')
                ->references('id')
                ->on('assigment_statuses')
                ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigment');
    }
}
