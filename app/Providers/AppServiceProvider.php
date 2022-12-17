<?php

namespace App\Providers;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
//
    }

    public function boot()
    {
        $this->bootEloquentMorphsRelations();
    }

    public function bootEloquentMorphsRelations()
    {
        Relation::morphMap([
            Thread::TABLE => Thread::class,
            Reply::TABLE => Reply::class,
            User::TABLE => User::class,
        ]);
    }
}
