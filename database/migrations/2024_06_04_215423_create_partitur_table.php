<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partitur', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('pembuat_aransemen');
            $table->string('komposer');
            $table->string('genre_lagu');
            $table->string('link_youtube');
            $table->string('kebutuhan_instrumen');
            $table->string('tingkat_kesulitan');
            $table->string('kebutuhan_solo');
            $table->string('jenis_suara');
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
        Schema::dropIfExists('partitur');
    }
}
