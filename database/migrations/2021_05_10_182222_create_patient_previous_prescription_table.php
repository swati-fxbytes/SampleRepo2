<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientPreviousPrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_previous_prescription', function (Blueprint $table) {
            $table->increments('pre_prescription_id')->comment('Doctor Media Primary ID');
            $table->smallInteger('user_id')->unsigned()->comment('Foreign Key From users table');
            $table->integer('user_type')->nullable()->default(2)->comment('User Types : 2 for doctors, 3 for patients'); 
            $table->string('doc_media_file', 50)->comment('Media file name');
            $table->string('doctor_name', 159)->comment('Media file name');
            $table->string('prescription_date', 50)->comment('Media file name');
            $table->smallInteger('doc_media_status')->unsigned()->default(1)->comment('Current Status of row - 1 For active  , 2 for deleted');
            $table->tinyInteger('is_deleted')->default(2)->comment('1 for deleted yes and 2 for deleted no');
            $table->string('ip_address')->comment('User last login ip');
            $table->tinyInteger('resource_type')->unsigned()->default(1)->comment('Resource type - 1 For Web  , 2 for Android and 3 for IOS');
            $table->integer('created_by')->unsigned()->nullable()->default(0)->comment('0 for self/by system');
            $table->integer('updated_by')->unsigned()->nullable()->default(0)->comment('0 for self/by system');
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
        Schema::dropIfExists('patient_previous_prescription');
    }
}
