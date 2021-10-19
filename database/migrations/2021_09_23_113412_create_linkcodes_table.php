<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linkcodes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code')->nullable()->comment('連結碼');
            $table->string('url')->nullable()->comment('連結');
            $table->string('name')->nullable()->comment('問卷類型');
            $table->integer('count')->default(1)->comment('問卷份數');
            $table->unsignedBigInteger('project_id')->comment('專案');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
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
        Schema::dropIfExists('linkcodes');
    }
}
