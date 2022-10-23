<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\HasTimestamp;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Testing\Fluent\Concerns\Has;

class Category extends Model
{
    use HasFactory;
    use HasTimestamps;

    protected $fillable = ['name', 'slug', 'image'];

    public function createdAt(): string
    {
        return $this->created_at->format('d-m-Y');
    }

    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function slug(): string
    {
        return $this->slug;
    }
}
