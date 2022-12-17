<?php

namespace App\Listeners;

use App\Events\ReplyWasCreated;
use App\Models\Subscription;
use App\Models\User;
use App\Notifications\NewReplyNotification;


class sendNewReplyNotification
{

    public function handle(ReplyWasCreated $event)
    {
        $thread = $event->reply->replyAble();

        foreach($thread->subscriptions() as $subscription) {
            if ($this->replyAuthorDoesNotMatchSubscriber($event->reply->author(), $subscription)){
                $subscription->user()->notify(new NewReplyNotification($event->reply, $subscription));
            }
        }

        $thread->author()->notify(new NewReplyNotification($event->reply));
    }

    private function replyAuthorDoesNotMatchSubscriber(User $author, Subscription $subscription): bool
    {
        return ! $author->matches($subscription->user());
    }
}
