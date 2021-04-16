<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // intermediate table between student and internship (Many to Many Relationship)
        Schema::create('applications', function (Blueprint $table) {
            $table->foreignId('student_id')->constrained();
            $table->foreignId('internship_id')->constrained();
            $table->id();
            $table->text('content');
            $table->string('resume');
            $table->string('cover_letter');
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
        Schema::dropIfExists('applications');
    }
}
