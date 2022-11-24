<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;

// ReplyAble is an interface that can be used in any model that has replies

interface ReplyAble
{
    public function subject(): string;

    /**
     * @return \App\Models\Reply[]
     */
    public function replies();

    public function latestReply(int $limit = 5);

    public function deleteReplies();

    public function repliesRelation(): MorphMany;

    public function replyAbleSubject(): string;
}
