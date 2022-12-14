<?php

namespace Database\Seeders;

use App\Models\Reply;
use App\Notifications\NewReplyNotification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{

    public function run()
    {
        Reply::all()->each(function ($reply) {
            $author = $reply->replyAble()->author();
            $author->notify(new NewReplyNotification($reply));
        });
    }
}


