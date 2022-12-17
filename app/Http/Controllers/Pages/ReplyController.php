<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\CreateReplyRequest;
use App\Jobs\CreateReply;
use App\Models\Reply;
use App\Models\Thread;
use App\Policies\ReplyPolicy;
use App\Traits\HasReplies;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class  ReplyController extends Controller
{

    public function __construct()
    {
        $this->middleware([Authenticate::class, EnsureEmailIsVerified::class]);
    }

    /**
     * @throws AuthorizationException
     * @throws ValidationException
     */

    public function store(Thread $thread, CreateReplyRequest $request)
    {
        $this->authorize(ReplyPolicy::CREATE, Reply::class);

        $this->dispatchSync(CreateReply::fromRequest($request));

        return redirect()->back()->with('success', 'Reply created successfully');
    }

   public function show(Thread $thread, Reply $reply)
    {
        return view('pages.threads.show', [
            'thread' => $thread,
            'reply' => $reply,
        ]);
    }

    public function redirect($id, $type)
    {
        $reply = Reply::where('replyAble_id', $id)->where('replyAble_type', $type)->firstOrFail();

        return redirect()->route('threads.show', [$reply->replyAble()->category->slug, $reply->replyAble()->slug]);

    }
}
