<?php

namespace FlorianRambur\DiscordWebhook\Tests;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Collection;
use FlorianRambur\DiscordWebhook\Content\Rules\FooterRules;
use FlorianRambur\DiscordWebhook\Exceptions\InvalidAttributeException;

class FooterRulesTest extends TestCase
{
    /**
     * @test
     */
    public function is_valid()
    {
        $attributes = new Collection([
            'text' => 'This is the footer',
            'timestamp' => '2021-07-06T22:00:00.000Z',
            'icon_url' => 'https://github.com/florianrambur/discord-webhook/icon.jpg',
        ]);

        $validate = (new FooterRules($attributes))->validate();

        $this->assertTrue($validate);
    }

    /**
     * @test
     */
    public function has_icon_without_text()
    {
        $attributes = new Collection([
            'timestamp' => '2021-07-06T22:00:00.000Z',
            'icon_url' => 'https://github.com/florianrambur/discord-webhook/icon.jpg',
        ]);

        $this->expectException(InvalidAttributeException::class);
        $this->expectExceptionMessage('You cannot set an icon_url without a text');

        (new FooterRules($attributes))->validate();
    }
}
