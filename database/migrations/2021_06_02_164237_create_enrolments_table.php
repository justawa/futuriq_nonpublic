<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolments', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('certification_class')->nullable();
            $table->string('user_type')->nullable();
            $table->string('validity')->nullable();
            $table->string('nationality')->nullable();
            $table->string('ekyc_type')->nullable();
            $table->string('pan');
            $table->string('adhaar_no')->nullable();
            $table->string('name');
            $table->string('mobile');
            $table->date('birthday');
            $table->string('gender');
            $table->string('pincode');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('remark')->nullable();
            $table->string('ekyc_pin');
            $table->string('photo_file');
            $table->string('pan_file');
            $table->string('address_file');
            $table->string('video_file')->nullable();
            $table->string('ekyc_token')->nullable();
            $table->string('dsc_token')->nullable();
            $table->string('application_id');
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolments');
    }
}
