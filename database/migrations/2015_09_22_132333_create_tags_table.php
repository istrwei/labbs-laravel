<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->default('');
            $table->timestamps();
        });

        Schema::create('topic_tags', function ($table) {
            $table->integer('topic_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('topic_id')->references('id')->on('topics');
            $table->foreign('tag_id')->references('id')->on('tags');

            $table->primary(['topic_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tags');
        Schema::drop('topic_tags');
    }
}
