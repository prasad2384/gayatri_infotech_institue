<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('studentdatas', function (Blueprint $table) {
            $table->id();
            $table->string('std_name');
            $table->string('std_email');
            $table->string('std_password');
            $table->string('std_phoneno');
            $table->string('std_dob');
            $table->string('std_gender');
            $table->string('std_course');
            $table->string('std_profile');
            $table->string('std_clgname');
            $table->string('std_degree');
            $table->string('std_clgtimefrom');
            $table->string('std_clgtimeto');
            $table->string('std_passoutyear');
            $table->string('std_grade');
            $table->string('std_university');
            $table->string('std_parentsname');
            $table->string('std_parentsno');
            $table->string('std_parentsoccupation');
            $table->string('std_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentdatas');
    }
};
