<?php

namespace App\Traits;

trait HasTimestamp
{
    public function createdAt(): string
    {
        return $this->created_at->format('d-m-Y');
    }

    public function updatedAt(): string
    {
        return $this->updated_at->format('d-m-Y');
    }
}
