<?php

namespace FlorianRambur\DiscordWebhook\Content\Attributes;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Arrayable;
use FlorianRambur\DiscordWebhook\Content\Rules\FooterRules;
use FlorianRambur\DiscordWebhook\Content\Attributes\Interfaces\Attribute;

class Footer implements Attribute, Arrayable
{   
    protected $attributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes = new Collection($attributes);
    }

    public function text(string $text): Footer
    {
        $this->attributes->put('text', $text);

        return $this;
    }
    
    public function iconUrl(string $iconUrl): Footer
    {
        $this->attributes->put('icon_url', $iconUrl);

        return $this;
    }
    
    public function timestamp(string $timestamp): Footer
    {
        $this->attributes->put('timestamp', $timestamp);

        return $this;
    }

    public function toArray(): array
    {
        (new FooterRules($this->attributes))->validate();

        return [
            'footer' => [
                'text' => $this->attributes->get('text'),
                'icon_url' => $this->attributes->get('icon_url'),
            ],
            'timestamp' => $this->attributes->get('timestamp'),
        ];
    }
}
