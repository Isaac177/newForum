<?php

namespace App\Models;

use App\Traits\HasAuthor;
use App\Traits\ModelHelpers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use ModelHelpers;
    use HasAuthor;

    const DEFAULT = 1;
    const MODERATOR = 2;
    const ADMIN = 3;

    const TABLE = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'type',
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $appends = [
        'profile_photo_url',
    ];


    public function id(): int
    {
        return $this->id;
    }

    public function type(): int
    {
        return $this->type;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function emailAddress(): string
    {
        return $this->email;
    }

    public function bio(): string
    {
        return $this->bio;
    }

    public function isModerator(): bool
    {
        return $this->type === self::MODERATOR;
    }

    public function isAdmin(): bool
    {
        return $this->type === self::ADMIN;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(HasAuthor::class);
    }

    public function threads()
    {
        return $this->threadsRelation;
    }

    public function latestThread(int $limit = 5)
    {
        return $this->threadsRelation()->latest()->limit($limit)->get();
    }

    public function deleteThread()
    {
        foreach ($this->threads() as $thread) {
            $thread->delete();
        }
    }

    public function threadsRelation(): HasMany
    {
        return $this->hasMany(Thread::class, 'author_id');
    }

    public function countThreads(): int
    {
        return $this->threadsRelation()->count();
    }

    public function replies()
    {
        return $this->replyAble;
    }

    public function latestReplies(int $limit = 5)
    {
        return $this->replyAble()->latest()->limit($limit)->get();
    }

   /* public function deleteReplies()
    {
        foreach ($this->replies() as $reply) {
            $reply->delete();
        }
    }*/

    public function countReplies(): int
    {
        return $this->replyAble()->count();
    }

    public function replyAble(): HasMany
    {
        return $this->hasMany(Reply::class, 'author_id');
    }

}
