<?php

namespace App\Models;

use App\Traits\HasAuthor;
use App\Traits\ModelHelpers;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;

class Reply extends Model
{
    use HasFactory; // This trait is used to create a factory for this model
    use HasAuthor; // This trait is used to add the author relation to the model
    use HasTimestamps; // This trait is used to add the timestamps to the model
    use ModelHelpers; // This trait is used to add some helper methods to the model

    protected $table = 'replies'; // This is the table name for this model

    protected $fillable = [ // These are the fillable fields for this model
        'body',
        'author_id',
        'thread_id',
    ];

    public function id(): int // This is the id of the model
    {
        return $this->id;
    }

    public function body(): string // This is the body of the reply
    {
        return $this->body;
    }

    public function excerpt(int $limit = 250): string // This is the excerpt of the reply
    {
        return Str::limit(strip_tags($this->body()), $limit);
    }

    public function to(ReplyAble $replyAble) // This method is used to set the replyAble relation
    {
        return $this->replyAbleRelation()->associate($replyAble);
    }

    public function replyAble(): ReplyAble // This method is used to get the replyAble relation
    {
        return $this->replyAbleRelation;
    }

    public function replyAbleRelation(): MorphTo // This is the replyAble relation
    {
        return $this->morphTo('replyAbleRelation', 'replyAble_type', 'replyAble_id');
    }
}
