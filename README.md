# Discord Webhook

## Usage 
Here is a simple example
```php
<?php

use FlorianRambur\DiscordWebhook\Client;

$config = [
    'url' => 'https://your-discord-webhook-url',
    'author' => [
        'username' => 'Florian',
        'avatar_url' => 'https://i.imgur.com/ZGPxFN2.jpg',
    ],
];

$client = new Client($config);

$response = $client->send([
    'content' => 'This is the main content',
]);
```
![Simple Example](https://i.ibb.co/f9ycPF9/simple-example.png)

## Work with Embed
This package give you the opportunity to work with a simple `Embed` class that allow you to create an advanced message
```php
<?php

$embed = (new Embed())
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

$config = [
    'url' => 'https://your-discord-webhook-url',
    'author' => [
        'username' => 'Florian',
        'avatar_url' => 'https://i.imgur.com/ZGPxFN2.jpg',
    ],
];

$client = new Client($config);

$response = $client->send([
    'embeds' => [
        $embed->toArray(),
    ],
]);
```
![Embed Example](https://i.ibb.co/dkPYbKG/embed-example.png)

## What's next
This package is under development and few things are missing :
- constraints on attributes (e.g check if every fields are ok)
- few templates will be created to give you the possibility to create a message easier and faster