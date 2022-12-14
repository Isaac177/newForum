<?php

namespace App\Models;

use App\Traits\HasAuthor;
use App\Traits\ModelHelpers;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;

class Reply extends Model
{
    use HasFactory;
    use HasAuthor;
    use HasTimestamps;
    use ModelHelpers;

    /**
     * @var mixed
     */
    protected $table = 'replies';

    protected $primaryKey = 'replyAble_id';

    protected $fillable = [
        'body',
        'replyAble_id',
        'replyAble_type',
        'author_id',
        'thread_id',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function body(): string
    {
        return $this->body();
    }

    public function excerpt(int $limit = 250): string
    {
        return Str::limit(strip_tags($this->body()), $limit);
    }

    public function replyAble(): MorphTo
    {
        return $this->morphTo();
    }

    public function to(): MorphMany
    {
        return $this->morphMany(User::class, 'replyAble', 'replies', 'replyAble_id', 'replyAble_type');
    }

    public function thread(): MorphTo
    {
        return $this->morphTo();
    }

    public function replyAbleSubject(): string
    {
        return $this->replyAble()->subject();
    }
}


