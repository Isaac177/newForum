<?php

namespace App\Jobs;

use App\Http\Requests\CreateReplyRequest;
use App\Models\Reply;
use App\Models\ReplyAble;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;
use App\Events\ReplyWasCreated;


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
        if (!$this->author || !$this->author instanceof User) {
            abort(404);
        }

        //$reply = new Reply(['body' => Purifier::clean($this->body)]);
        $reply = new Reply(['body' => $this->body]);
        //$reply->author()->associate($this->author);

        $reply->author_id = $this->author->id;

        $reply->isAuthoredBy($this->author);

        $reply->to($this->replyAble);
        $reply->save();

        event(new ReplyWasCreated($reply));

        return $reply;
    }
}
