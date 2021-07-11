<?php

namespace FlorianRambur\DiscordWebhook\Content\Attributes;

use Illuminate\Contracts\Support\Arrayable;
use FlorianRambur\DiscordWebhook\Content\Attributes\Interfaces\Attribute;

class Image implements Attribute, Arrayable
{
    protected $attributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function image(string $url): Image
    {
        $this->attributes['image'] = $url;

        return $this;
    }

    public function thumbnail(string $url): Image
    {
        $this->attributes['thumbnail'] = $url;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'image' => [
                'url' => $this->attributes['image'] ?? null,
            ],
            'thumbnail' => [
                'url' => $this->attributes['thumbnail'] ?? null,
            ],
        ];
    }
}
