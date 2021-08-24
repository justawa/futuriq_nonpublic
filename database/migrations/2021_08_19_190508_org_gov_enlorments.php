<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrgGovEnlorments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OrgGovEnlorments', function (Blueprint $table) {
            $table->id();
            $table->string('certification_type')->nullable();
            $table->string('validity')->nullable();
            $table->string('orgtype')->nullable();
            $table->string('gstno')->nullable();
            $table->string('govorgno')->nullable();
           $table->string('departmentname')->nullable();
            $table->string('orgpan')->nullable();
            $table->string('orgaddress')->nullable();
            $table->string('orgdocument')->nullable();
            $table->string('kycid')->nullable();
            $table->string('kycpin')->nullable();
            $table->string('ekycid')->nullable();
            $table->string('ekycpin')->nullable();
            $table->string('pan');
            $table->string('orgname')->nullable();
            $table->string('mobile');
            $table->string('email');
            $table->date('birthday');
            $table->string('gender');
            $table->string('userkycpin');
            $table->string('userkycpinconfirm');
            $table->string('photo_file');
            $table->string('pan_file');
            $table->string('orgid_file');
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
        //
    }
}
