<?php

namespace App\Providers;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use App\Policies\ReplyPolicy;
use App\Policies\ThreadPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
        Thread::class => ThreadPolicy::class,
        Reply::class => ReplyPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
