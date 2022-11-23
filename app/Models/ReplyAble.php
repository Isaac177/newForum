<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;


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
