<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('score')->comment('選中的選項分數');
            $table->tinyInteger('qnumber')->comment('回答的題號');
            $table->unsignedBigInteger('project_id')->comment('專案');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');

            $table->unsignedBigInteger('linkcode_id')->comment('問卷類');
            $table->foreign('linkcode_id')
                ->references('id')
                ->on('linkcodes')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
