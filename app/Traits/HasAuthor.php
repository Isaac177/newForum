<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAuthor
{
    /*public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }*//*
    {
        $this->authoredBy($author = new User());
        if (! $this->relationLoaded('authorRelation') ) {
            $this->load('authorRelation');
        }
        return $this->getRelation('authorRelation');
    }*/

    public function authoredBy(User $author)
    {
        $this->authorRelation()->associate($author);
        $this->unsetRelation('authorRelation');
    }

    public function authorRelation(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function isAuthoredBy(User $user): bool
    {
        //return $this->author()->matches($user);
        //return $this->author()->is($user);
        return $this->authorRelation()->is($user);
    }
}
