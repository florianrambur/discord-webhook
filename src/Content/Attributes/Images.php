<?php

namespace FlorianRambur\DiscordWebhook\Content\Attributes;

use Illuminate\Contracts\Support\Arrayable;
use FlorianRambur\DiscordWebhook\Content\Attributes\Interfaces\Attribute;

class Images implements Attribute, Arrayable
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function toArray(): array
    {
        $images = $this->attributes['images'];
        $thumbnail = $this->attributes['thumbnail'] ?? null;

        return [
            'image' => [
                'url' => $images[0],
            ],
            'thumbnail' => [
                'url' => $thumbnail,
            ],
        ];
    }
}
