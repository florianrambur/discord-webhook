<?php

namespace FlorianRambur\DiscordWebhook\Content\Rules;

use Illuminate\Support\Collection;
use FlorianRambur\DiscordWebhook\Exceptions\InvalidAttributeException;

class AuthorRules
{
    protected $attributes;

    public function __construct(Collection $attributes)
    {
        $this->attributes = $attributes;
    }

    public function validate(): bool
    {
        $this->hasUrlWithoutName();
        $this->hasInvalidUrl();

        return true;
    }

    protected function hasUrlWithoutName()
    {
        $hasOptionalFields = $this->attributes->get('url') || $this->attributes->get('icon_url');

        if (! $this->attributes->get('name') && $hasOptionalFields) {
            throw new InvalidAttributeException('You cannot set url or icon_url fields without a name');
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
