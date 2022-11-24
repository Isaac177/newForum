<?php

namespace App\Traits;

use App\Models\Reply;
use Illuminate\Database\Eloquent\Relations\MorphMany;

// HasReplies is a trait that can be used in any model that has replies

trait HasReplies
{
    public function replies() // replies() is a method that returns a MorphMany relationship
    {
        return $this->repliesRelation();
    }

    public function latestReply(int $amount = 5) // latestReply() is a method that returns the latest replies
    {
        return $this->repliesRelation()->latest()->limit($amount)->get();
    }

    public function deleteReplies() // deleteReplies() is a method that deletes all replies
    {
        foreach ($this->repliesRelation()->get() as $reply) {
            $reply->delete();
        }

        $this->unsetRelation('repliesRelation');
    }

    public function repliesRelation(): MorphMany // repliesRelation() is a method that returns a MorphMany relationship
    {
        return $this->morphMany(Reply::class, 'repliesRelation', 'replyAble_type', 'replyAble_id');
    }
}
