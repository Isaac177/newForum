<?php

namespace App\Models;

use App\Traits\HasAuthor;
use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use PhpParser\Builder;


class Thread extends Model
{
    use HasFactory;
    use HasTags;
    use HasAuthor;

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'author_id',
    ];

    protected $with = [
        'authorRelation',
        'category',
        'tagsRelation',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function excerpt(int $limit = 250): string
    {
        return Str::limit(strip_tags($this->body()), $limit);
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

    /*public function scopeForTag(Builder $query, string $tag): Builder
    {
        return $query->whereHas('tagsRelation', function (Builder $query) use ($tag) {
            $query->where('tags.slug', $tag);
        });
    }*/
}

