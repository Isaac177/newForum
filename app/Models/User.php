<?php

namespace App\Models;

use App\Traits\HasAuthor;
use App\Traits\ModelHelpers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements MustVerifyEmail
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


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $appends = [
        'profile_photo_url',
    ];

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
}
