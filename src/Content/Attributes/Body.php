<?php

namespace FlorianRambur\DiscordWebhook\Content\Attributes;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Arrayable;
use FlorianRambur\DiscordWebhook\Content\Rules\BodyRules;
use FlorianRambur\DiscordWebhook\Content\Attributes\Interfaces\Attribute;

class Body implements Attribute, Arrayable
{
    protected $attributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes = new Collection($attributes);
    }

    public function title(string $title): Body
    {
        $this->attributes->put('title', $title);

        return $this;
    }

    public function description(string $description): Body
    {
        $this->attributes->put('description', $description);

        return $this;
    }

    public function url(string $url): Body
    {
        $this->attributes->put('url', $url);

        return $this;
    }

    public function color(string $color): Body
    {
        $this->attributes->put('color', $color);

        return $this;
    }

    public function toArray(): array
    {
        (new BodyRules($this->attributes))->validate();

        return [
            'title' => $this->attributes->get('title'),
            'description' => $this->attributes->get('description'),
            'url' => $this->attributes->get('url'),
            'color' => $this->attributes->get('color'),
        ];
    }
}
