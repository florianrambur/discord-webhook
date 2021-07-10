<?php

namespace FlorianRambur\DiscordWebhook\Content\Attributes;

use Illuminate\Contracts\Support\Arrayable;
use FlorianRambur\DiscordWebhook\Exceptions\InvalidAttributeException;
use FlorianRambur\DiscordWebhook\Content\Attributes\Interfaces\Attribute;

class Body implements Attribute, Arrayable
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function toArray(): array
    {
        if (! isset($this->attributes['title'])) {
            throw new InvalidAttributeException("Title is missing");
        }

        return [
            'title' => $this->attributes['title'] ?? null,
            'description' => $this->attributes['description'] ?? null,
            'url' => $this->attributes['url'] ?? null,
            'color' => $this->attributes['color'] ?? null,
        ];
    } 
}
