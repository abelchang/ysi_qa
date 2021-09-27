<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->comment('專案名稱');
            $table->dateTime('start', 0)->nullable()->comment('問卷開始時間');
            $table->dateTime('end', 0)->nullable()->comment('問卷結束時間');
            $table->unsignedBigInteger('company_id')->comment('輔導公司');
            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
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

        Schema::dropIfExists('projects');
    }
}
