<?php

namespace FlorianRambur\DiscordWebhook\Content;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Arrayable;
use FlorianRambur\DiscordWebhook\Content\Attributes\Interfaces\Attribute;

class Embed implements Arrayable
{
    protected $attributes;

    public function __construct()
    {
        $this->attributes = new Collection();
    }

    public function add(Attribute $attribute): Embed
    {
        $this->attributes->add($attribute);

        return $this;
    }

    public function toArray(): array
    {
        $attributes = $this->attributes->toArray();

        return array_merge(...$attributes);
    }
}
