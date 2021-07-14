<?php

namespace FlorianRambur\DiscordWebhook\Content\Rules;

use Illuminate\Support\Collection;
use FlorianRambur\DiscordWebhook\Exceptions\InvalidAttributeException;

class FooterRules
{
    protected $attributes;

    public function __construct(Collection $attributes)
    {
        $this->attributes = $attributes;
    }

    public function validate(): bool
    {
        $this->hasIconWithoutText();

        return true;
    }

    protected function hasIconWithoutText()
    {
        if (! $this->attributes->get('text') && $this->attributes->get('icon_url')) {
            throw new InvalidAttributeException('You cannot set an icon_url without a text');
        }
    }
}
