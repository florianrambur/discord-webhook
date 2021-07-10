<?php

namespace FlorianRambur\DiscordWebhook\Tests;

use PHPUnit\Framework\TestCase;
use FlorianRambur\DiscordWebhook\Content\Embed;
use FlorianRambur\DiscordWebhook\Content\Attributes\Body;
use FlorianRambur\DiscordWebhook\Content\Attributes\Author;
use FlorianRambur\DiscordWebhook\Content\Attributes\Footer;
use FlorianRambur\DiscordWebhook\Content\Attributes\Images;

class EmbedTest extends TestCase
{
    /**
     * @test
     */
    public function send()
    {
        $embed = $this->prepareEmbed();

        $expected = [
            'author' => [
                'name' => 'This is the author',
                'url' => 'https://github.com/florianrambur/discord-webhook',
                'icon_url' => 'https://github.com/florianrambur/discord-webhook/icon.jpg',
            ],
            'title' => 'Webhook Title',
            'description' => 'Webhook Description',
            'url' => null,
            'color' => 5814783,
            'image' => [
                'url' => 'https://i.imgur.com/ZGPxFN2.jpg',
            ],
            'thumbnail' => [
                'url' => null,
            ],
            'footer' => [
                'text' => 'This is the footer',
                'icon_url' => null,
            ],
            'timestamp' => '2021-07-06T22:00:00.000Z',
        ];

        $this->assertInstanceOf(Embed::class, $embed);
        $this->assertEquals($expected, $embed->toArray());
    }

    protected function prepareEmbed(): Embed
    {
        return (new Embed())
            ->add(new Author([
                'name' => 'This is the author',
                'url' => 'https://github.com/florianrambur/discord-webhook',
                'icon_url' => 'https://github.com/florianrambur/discord-webhook/icon.jpg',
            ]))
            ->add(new Body([
                'title' => 'Webhook Title',
                'description' => 'Webhook Description',
                'color' => 5814783,
            ]))
            ->add(new Images([
                'images' => ['https://i.imgur.com/ZGPxFN2.jpg'],
            ]))
            ->add(new Footer([
                'text' => 'This is the footer',
                'timestamp' => '2021-07-06T22:00:00.000Z',
            ]));
    }
}