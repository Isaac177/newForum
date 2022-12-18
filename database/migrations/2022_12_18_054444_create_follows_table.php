<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowsTable extends Migration
{

    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->primary(['user_id', 'following_user_id']);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('following_user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
