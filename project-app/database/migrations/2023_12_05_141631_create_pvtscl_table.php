<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePvtsclTable extends Migration
{
    public function up()
    {
        Schema::create('pvtscl', function (Blueprint $table) {
            $table->id();
            $table->string('sclname');
            $table->string('eligibility');
            $table->string('gender');
            $table->string('state');
            $table->string('link');
            $table->string('pname');
            $table->string('pemail');
            $table->string('sclimg')->default('https://www.ssims.edu.in/wp-content/uploads/2020/03/ssit-students-scholarship-loans.jpg');
            $table->boolean('aadhar')->default(false);
            $table->boolean('caste_certificate')->default(false);
            $table->boolean('income_certificate')->default(false);
            $table->boolean('domicile_certificate')->default(false);
            $table->boolean('mark_sheets')->default(false);
            $table->boolean('fee_receipt')->default(false);
            $table->boolean('passport_photo')->default(false);
            $table->string('token')->default('');
            $table->timestamps();
            $table->json('applications')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pvtscl');
    }
}
