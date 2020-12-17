<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("court");
            $table->unsignedBigInteger("judge_id")->nullable();
            $table->unsignedBigInteger("registrar_id");
            $table->string("case_file_no");
            $table->string("date_of_appearance");
            $table->text("plaintiffs");
            $table->text("plaintiffs_counsel");
            $table->text("plaintiffs_counsel_chanber");
            $table->text("defendants");
            $table->string("title_of_notice");
            $table->text("description");
            $table->unsignedBigInteger("case_type");
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
        Schema::dropIfExists('notices');
    }
}
