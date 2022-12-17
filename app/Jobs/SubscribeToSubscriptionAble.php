<?php

namespace App\Jobs;



use App\Models\Subscription;
use App\Models\SubscriptionAble;
use App\Models\User;

class SubscribeToSubscriptionAble
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
        $subscription = new Subscription();
        $subscription->userRelation()->associate($this->user);
        $this->subscriptionAble->subscriptionsRelation()->save($subscription);
    }
}
