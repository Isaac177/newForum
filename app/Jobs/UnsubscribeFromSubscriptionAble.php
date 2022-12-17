<?php

namespace App\Jobs;



use App\Models\SubscriptionAble;
use App\Models\User;

class UnsubscribeFromSubscriptionAble
{
    private $user;
    private $subscriptionAble;

    public function __construct(User $user, SubscriptionAble $subscriptionAble)
    {
        $this->user = $user;
        $this->subscriptionAble = $subscriptionAble;
    }


    public function handle()
    {
        $this->subscriptionAble->subscriptionsRelation()->where('user_id', $this->user->id)->delete();
    }
}
