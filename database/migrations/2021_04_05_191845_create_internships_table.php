<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->boolean('remote')->default(false);
            $table->string('attachments')->nullable();
            $table->date('closing_at');
            $table->foreignId('field_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained();
            $table->foreignId('company_supervisor_id')->nullable()->constrained('company_supervisors');
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
        Schema::dropIfExists('internships');
    }
}
