<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHttpQueryLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('http_query_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('method');
            $table->string('url');
            $table->longText('payload');
            $table->longText('response');
            $table->string('duration');
            $table->string('controller');
            $table->string('action');
            $table->string('models');
            $table->string('ip');
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
        Schema::dropIfExists('http_query_logs');
    }
}
