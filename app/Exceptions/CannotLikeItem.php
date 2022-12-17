<?php

namespace App\Exceptions;



use Exception;


class CannotLikeItem extends Exception
{
    public static function alreadyLiked(string $item): self
    {
        return new self("You have already liked this {$item}");
    }
}
