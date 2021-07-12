<?php

namespace FlorianRambur\DiscordWebhook\Tests;

use FlorianRambur\DiscordWebhook\Content\Rules\BodyRules;
use FlorianRambur\DiscordWebhook\Exceptions\InvalidAttributeException;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class BodyRulesTest extends TestCase
{
    /**
     * @test
     */
    public function is_valid()
    {
        $attributes = new Collection([
            'title' => 'Webhook Title',
            'description' => 'Webhook Description',
            'color' => '5814783',
        ]);

        $validate = (new BodyRules($attributes))->validate();

        $this->assertTrue($validate);
    }

    /**
     * @test
     */
    public function has_url_without_title()
    {
        $attributes = new Collection([
            'url' => 'https://github.com/florianrambur/discord-wewbhook',
            'description' => 'Webhook Description',
            'color' => '5814783',
        ]);

        $this->expectException(InvalidAttributeException::class);
        $this->expectExceptionMessage('You cannot set an url without a title');

        (new BodyRules($attributes))->validate();
    }

    /**
     * @test
     */
    public function has_invalid_url()
    {
        $attributes = new Collection([
            'title' => 'Webhook Title',
            'url' => 'invalid url',
            'description' => 'Webhook Description',
            'color' => '5814783',
        ]);

        $this->expectException(InvalidAttributeException::class);
        $this->expectExceptionMessage('The url field is not valid');

        (new BodyRules($attributes))->validate();
    }
}
