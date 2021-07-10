<?php

namespace FlorianRambur\DiscordWebhook\Content\Attributes;

use Illuminate\Contracts\Support\Arrayable;
use FlorianRambur\DiscordWebhook\Content\Attributes\Interfaces\Attribute;

class Footer implements Attribute, Arrayable
{   
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function toArray(): array
    {
        return [
            'footer' => [
                'text' => $this->attributes['text'] ?? null,
                'icon_url' => $this->attributes['icon_url'] ?? null,
            ],
            'timestamp' => $this->attributes['timestamp'] ?? null,
        ];
    }
}
