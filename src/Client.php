<?php

namespace FlorianRambur\DiscordWebhook;

use GuzzleHttp;

class Client
{
    protected $url;
    protected $author;

    public function __construct(array $config)
    {
        $this->url = $config['url'];
        $this->author = $config['author'];
    }

    public function send(array $message): int
    {
        $client = $this->prepareClient();

        $body = $this->prepareBody($message);

        $response = $client->post($this->url, [
            'json' => $body,
        ]);

        return $response->getStatusCode();
    }

    protected function prepareClient(): GuzzleHttp\Client
    {
        return new GuzzleHttp\Client([
            'timeout' => 2.0,
            'verify' => false,
        ]);
    }

    protected function prepareBody(array $message): array
    {
        return [
            'username' => $this->author['username'],
            'avatar_url' => $this->author['avatar_url'],
            'content' => $message['content'] ?? '',
            'embeds' => $message['embeds'] ?? [],
        ];
    }
}
