<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posting', function (Blueprint $table) {
            $table->increments('id');
            $table->char('user_id', 15);
            $table->foreign('user_id')
                ->references('nim')->on('users')
                ->onDelete('cascade');
            $table->string('judulposting');
            $table->date('tanggal');
            $table->string('foto');
            $table->tinyInteger('jenisposting');
            $table->text('deskripsi');
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
        Schema::dropIfExists('posting');
    }
}
