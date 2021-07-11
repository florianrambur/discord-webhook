<?php

namespace FlorianRambur\DiscordWebhook\Content\Attributes;

use Illuminate\Contracts\Support\Arrayable;
use FlorianRambur\DiscordWebhook\Content\Attributes\Interfaces\Attribute;

class Body implements Attribute, Arrayable
{
    protected $attributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function title(string $title): Body
    {
        $this->attributes['title'] = $title;

        return $this;
    }

    public function description(string $description): Body
    {
        $this->attributes['description'] = $description;

        return $this;
    }

    public function url(string $url): Body
    {
        $this->attributes['url'] = $url;

        return $this;
    }

    public function color(int $color): Body
    {
        $this->attributes['color'] = $color;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->attributes['title'] ?? null,
            'description' => $this->attributes['description'] ?? null,
            'url' => $this->attributes['url'] ?? null,
            'color' => $this->attributes['color'] ?? null,
        ];
    } 
}
