<?php

namespace App\Providers;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use App\Policies\NotificationPolicy;
use App\Policies\ReplyPolicy;
use App\Policies\ThreadPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
        Thread::class => ThreadPolicy::class,
        Reply::class => ReplyPolicy::class,
        DatabaseNotification::class => NotificationPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
    }
}
