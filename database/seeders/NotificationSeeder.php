<?php

namespace Database\Seeders;

use App\Models\Reply;
use App\Notifications\NewReplyNotification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run()
    {
        /*Reply::all()->each(function ($reply) {
            $author = $reply->replyAble()->author();
            $subscription = $author->subscriptions()->where('author_id', $reply->replyAble_id)->first();
            $author->notify(new NewReplyNotification($reply, $subscription));
        });*/

        $replies = Reply::all();

        foreach ($replies as $reply) {
            $subscription = $reply->replyAble->subscription;
            $author = $reply->author;

            if ($author && $subscription) {
                $author->notify(new NewReplyNotification($reply, $subscription));
            }
        }
    }
}


