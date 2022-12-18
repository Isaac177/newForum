<?php

namespace App\Models;

use App\Traits\HasAuthor;
use App\Traits\HasLikes;
use App\Traits\HasReplies;
use App\Traits\HasSubscriptions;
use App\Traits\HasTags;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;



class Thread extends Model implements ReplyAble, SubscriptionAble, Viewable
{
    use HasFactory;
    use HasTags;
    use HasLikes;
    use HasAuthor;
    use HasReplies;
    use HasSubscriptions;
    use InteractsWithViews;

    const TABLE = 'threads';

    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'author_id',
    ];

    protected $with = [
        'category',
        'likesRelation',
        'authorRelation',
        'tagsRelation',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function excerpt(int $limit = 250): string
    {
        return Str::limit(strip_tags($this->body()), $limit);
    }

    public function replyAbleSubject(): string
    {
        return $this->title();
    }

    public function title(): string
    {
        return $this->title;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function slug(): string
    {
        return Str::slug($this->title());
    }

    public function delete()
    {
        $this->removeTags();
        parent::delete();
    }

    public function scopeForTag($query, $tag)
    {
        return $query->whereHas('tagsRelation', function ($query) use ($tag) {
            $query->where('name', $tag);
        });
    }

    public function subject(): string
    {
        return $this->title();
    }

    public function isConversationOld(): bool
    {
        return $this->created_at->diffInDays(now()) > 30;
    }

    public function author(): User
    {
        return $this->authorRelation;
    }

    public function thread(): Thread
    {
        return $this;
    }
}

