<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

// We use an interface to make sure that the model has the required methods

interface ReplyAble
{
    public function subject(): string;

    /**
     * @return \App\Models\Reply[]
     */
    public function replies();

    public function latestReply(int $limit = 5);

    public function deleteReplies();

    public function repliesRelation(): MorphToMany;

    public function replyAbleSubject(): string;
}