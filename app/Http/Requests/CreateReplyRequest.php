<?php

namespace App\Http\Requests;

use App\Models\ReplyAble;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateReplyRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules() : array
    {
        return [
            'body' => ['required'],
            'replyAble_id' => ['required'],
            'replyAble_type' => ['required', 'in' . Thread::TABLE],
        ];
    }

    public function replyAble() : ReplyAble
    {
        return $this->findReplyAble($this->get('replyAble_id'), $this->get('replyAble_type'));
    }

    private function findReplyAble(int $id, string $type) : ReplyAble
    {
        if ($type === Thread::TABLE) {
            return Thread::find($id);
        }

        abort(404);
    }

    public function author() : User
    {
        return $this->user();
    }

    public function body() : string
    {
        return $this->get('body');
    }
}
