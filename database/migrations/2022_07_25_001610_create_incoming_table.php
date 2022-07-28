<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming', function (Blueprint $table) {
            $table->bigIncrements("ctrli");
            $table->string("ctrle");
            $table->string("date");
            $table->string("time");
            $table->string("reciever");
            $table->string("typeofservice");
            $table->string("subject");
            $table->string("officeconcerned");
            $table->string("endorsedto");
            $table->string("files");
            $table->string("remarks");
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
        Schema::dropIfExists('incoming');
    }
};
