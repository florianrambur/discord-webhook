<?php

namespace FlorianRambur\DiscordWebhook\Content\Attributes;

use Illuminate\Contracts\Support\Arrayable;
use FlorianRambur\DiscordWebhook\Content\Attributes\Interfaces\Attribute;

class Author implements Attribute, Arrayable
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function toArray(): array
    {
        return [
            'author' => $this->attributes,
        ];
    }
}
