<?php

namespace App\Jobs;

use App\Http\Requests\CreateReplyRequest;
use App\Models\Reply;
use App\Models\ReplyAble;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;


class  CreateReply
{
    private $author;
    private $replyAble;
    private $body;

    public function __construct(User $author, ReplyAble $replyAble, string $body)
    {
        $this->author = $author;
        $this->replyAble = $replyAble;
        $this->body = $body;
    }

    public static function fromRequest(CreateReplyRequest $request): self
    {
        $user = User::find(Auth::id());
        return new static(
            $user,
            $request->replyAble(),
            $request->body()
        );
    }


    public function handle(): Reply
    {
        $reply = new Reply(['body' => Purifier::clean($this->body)]);

        $reply->isAuthoredBy($this->author);

        $reply->to($this->replyAble);
        $reply->save();

        return $reply;
    }
}
