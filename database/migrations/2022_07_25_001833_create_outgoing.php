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
        Schema::create('outgoing', function (Blueprint $table) {
            $table->bigIncrements("ctrli");
            $table->string("date");
            $table->string("time");
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string("typeofservice");
            $table->string("officeconcerned");
            $table->string("subject");
            $table->string("name"); 
            $table->string("agency");
            $table->string('progresschek');
            $table->string("timereceived");
            $table->string("files");
            $table->string("remarks_type")->nullable();
            $table->string("remarks")->nullable();
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
        Schema::dropIfExists('outgoing');
    }
};
