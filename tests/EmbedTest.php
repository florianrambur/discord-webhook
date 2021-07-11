<?php

namespace FlorianRambur\DiscordWebhook\Tests;

use PHPUnit\Framework\TestCase;
use FlorianRambur\DiscordWebhook\Content\Embed;
use FlorianRambur\DiscordWebhook\Content\Attributes\Body;
use FlorianRambur\DiscordWebhook\Content\Attributes\Image;
use FlorianRambur\DiscordWebhook\Content\Attributes\Author;
use FlorianRambur\DiscordWebhook\Content\Attributes\Footer;

class EmbedTest extends TestCase
{

    /**
     * @test
     */
    public function make()
    {
        $embed = $this->prepareEmbed();

        $expected = $this->getExpected();

        $this->assertInstanceOf(Embed::class, $embed);
        $this->assertEquals($expected, $embed->toArray());
    }

    /**
     * @test
     */
    public function make_with_methods()
    {
        $embed = $this->prepareEmbedWithMethods();

        $expected = $this->getExpected();

        $this->assertInstanceOf(Embed::class, $embed);
        $this->assertEquals($expected, $embed->toArray());
    }

    protected function prepareEmbed(): Embed
    {
        $author = new Author([
            'name' => 'This is the author',
            'url' => 'https://github.com/florianrambur/discord-webhook',
            'icon_url' => 'https://github.com/florianrambur/discord-webhook/icon.jpg',
        ]);

        $body = new Body([
            'title' => 'Webhook Title',
            'description' => 'Webhook Description',
            'color' => 5814783,
        ]);

        $image = new Image([
            'image' => 'https://i.imgur.com/ZGPxFN2.jpg',
        ]);

        $footer = new Footer([
            'text' => 'This is the footer',
            'timestamp' => '2021-07-06T22:00:00.000Z',
        ]);

        return (new Embed())->addMany([$author, $body, $image, $footer]);
    }

    protected function prepareEmbedWithMethods()
    {
        $author = (new Author())
            ->name('This is the author')
            ->url('https://github.com/florianrambur/discord-webhook')
            ->iconUrl('https://github.com/florianrambur/discord-webhook/icon.jpg');

        $body = (new Body())
            ->title('Webhook Title')
            ->description('Webhook Description')
            ->color(5814783);

        $image = (new Image())->image('https://i.imgur.com/ZGPxFN2.jpg');

        $footer = (new Footer())
            ->text('This is the footer')
            ->timestamp('2021-07-06T22:00:00.000Z');

        return (new Embed())->addMany([$author, $body, $image, $footer]);
    }

    protected function getExpected(): array
    {
        return [
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
    }
}