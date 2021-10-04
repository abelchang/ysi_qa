<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aoptions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->nullable()->comment('選項標題');
            $table->tinyInteger('score')->nullable()->comment('選項分數');
            $table->tinyInteger('no')->nullable()->comment('選項編號');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aoptions');
    }
}
