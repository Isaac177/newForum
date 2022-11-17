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
            $table->string('replyAble_type')->default('threads');
            $table->foreignId('author_id')->constrained('users'); // This is the author of the reply
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
