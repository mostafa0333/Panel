<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPluginTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('plugins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('egg_id')->unsigned()->nullable();
            $table->foreign('egg_id')->references('id')->on('eggs')->onDelete('set null');
            $table->string('name', 255);
            $table->string('desc', 255)->nullable();
            $table->boolean('has_config')->default(0);
            $table->string('files', 255);
            $table->timestamps();
        });
		
        Schema::create('plugin_dependencies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plugin_id')->unsigned();
            $table->foreign('plugin_id')->references('id')->on('plugins')->onDelete('cascade');
            $table->integer('dependency_id')->unsigned();
            $table->foreign('dependency_id')->references('id')->on('plugins')->onDelete('cascade');
            $table->timestamps();
        });
		
        Schema::create('server_plugins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('server_id')->unsigned();
            $table->foreign('server_id')->references('id')->on('servers')->onDelete('cascade');
            $table->integer('plugin_id')->unsigned();
            $table->foreign('plugin_id')->references('id')->on('plugins')->onDelete('cascade');
            $table->boolean('is_enabled')->default(1);
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('server_plugins');
        Schema::dropIfExists('plugin_dependencies');
        Schema::dropIfExists('plugins');
    }
}
