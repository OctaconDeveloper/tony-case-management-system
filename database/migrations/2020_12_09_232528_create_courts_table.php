<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('judge_id');
            $table->unsignedBigInteger('registrar_id');
            $table->enum('type',[
                'supreme-court-of-nigeria',
                'court-of-appeal',
                'federal-high-court',
                'state-high-court',
                'national-industrial-court',
                'sharia-court-of-appeal',
                'customary-court-of-appeal',
                'magistrate-court',
                ]);
            $table->string('address');
            $table->string('town');
            $table->string('state');
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
        Schema::dropIfExists('courts');
    }
}
