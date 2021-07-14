<?php

namespace FlorianRambur\DiscordWebhook\Content\Rules;

use Illuminate\Support\Collection;
use FlorianRambur\DiscordWebhook\Exceptions\InvalidAttributeException;

class BodyRules
{
    protected $attributes;

    public function __construct(Collection $attributes)
    {
        $this->attributes = $attributes;
    }

    public function validate(): bool
    {
        $this->hasUrlWithoutTitle();
        $this->hasInvalidUrl();

        return true;
    }

    protected function hasUrlWithoutTitle()
    {
        if (! $this->attributes->get('title') && $this->attributes->get('url')) {
            throw new InvalidAttributeException('You cannot set an url without a title');
        }
    }

    protected function hasInvalidUrl()
    {
        if (! $this->attributes->get('url')) {
            return;
        }

        $regexUrl = '/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/';

        if (! preg_match($regexUrl, $this->attributes->get('url'))) {
            throw new InvalidAttributeException('The url field is not valid');
        }
    }
}
