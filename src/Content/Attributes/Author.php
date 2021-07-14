<?php

namespace FlorianRambur\DiscordWebhook\Content\Attributes;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Arrayable;
use FlorianRambur\DiscordWebhook\Content\Rules\AuthorRules;
use FlorianRambur\DiscordWebhook\Content\Attributes\Interfaces\Attribute;

class Author implements Attribute, Arrayable
{
    protected $attributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes = new Collection($attributes);
    }
    
    public function name(string $name): Author
    {
        $this->attributes->put('name', $name);

        return $this;
    }
    
    public function url(string $url): Author
    {
        $this->attributes->put('url', $url);

        return $this;
    }
    
    public function iconUrl(string $iconUrl): Author
    {
        $this->attributes->put('icon_url', $iconUrl);

        return $this;
    }

    public function toArray(): array
    {
        (new AuthorRules($this->attributes))->validate();

        return [
            'author' => $this->attributes->toArray(),
        ];
    }
}
