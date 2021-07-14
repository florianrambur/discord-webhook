<?php

namespace FlorianRambur\DiscordWebhook\Tests;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Collection;
use FlorianRambur\DiscordWebhook\Content\Rules\AuthorRules;
use FlorianRambur\DiscordWebhook\Exceptions\InvalidAttributeException;

class AuthorRulesTest extends TestCase
{
    /**
     * @test
     */
    public function is_valid()
    {
        $attributes = new Collection([
            'name' => 'This is the author',
            'url' => 'https://github.com/florianrambur/discord-webhook',
            'icon_url' => 'https://github.com/florianrambur/discord-webhook/icon.jpg',
        ]);

        $validate = (new AuthorRules($attributes))->validate();

        $this->assertTrue($validate);
    }

    /**
     * @test
     */
    public function has_url_without_name()
    {
        $attributes = new Collection([
            'url' => 'https://github.com/florianrambur/discord-webhook',
            'icon_url' => 'https://github.com/florianrambur/discord-webhook/icon.jpg',
        ]);

        $this->expectException(InvalidAttributeException::class);
        $this->expectExceptionMessage('You cannot set url or icon_url fields without a name');

        (new AuthorRules($attributes))->validate();
    }

    /**
     * @test
     */
    public function has_invalid_url()
    {
        $attributes = new Collection([
            'name' => 'This is the author',
            'url' => 'Wrong Url',
            'icon_url' => 'https://github.com/florianrambur/discord-webhook/icon.jpg',
        ]);

        $this->expectException(InvalidAttributeException::class);
        $this->expectExceptionMessage('The url field is not valid');

        (new AuthorRules($attributes))->validate();
    }
}
