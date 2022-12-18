<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{

    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->integer('replyAble_id');
            $table->string('replyAble_type')->default('threads')->nullable();
            $table->bigInteger('author_id')->unsigned();
            $table->timestamps();
        });

    }



    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
