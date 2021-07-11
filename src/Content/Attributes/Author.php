<?php

namespace FlorianRambur\DiscordWebhook\Content\Attributes;

use Illuminate\Contracts\Support\Arrayable;
use FlorianRambur\DiscordWebhook\Content\Attributes\Interfaces\Attribute;

class Author implements Attribute, Arrayable
{
    protected $attributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }
    
    public function name(string $name): Author
    {
        $this->attributes['name'] = $name;

        return $this;
    }
    
    public function url(string $url): Author
    {
        $this->attributes['url'] = $url;

        return $this;
    }
    
    public function iconUrl(string $iconUrl): Author
    {
        $this->attributes['icon_url'] = $iconUrl;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'author' => $this->attributes,
        ];
    }
}
