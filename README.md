# Discord Webhook

## Installation
```
composer require florianrambur/discord-webhook
```

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
This package give you the opportunity to work with a simple `Embed` class that allow you to create an advanced message. To do that, you can pass data into the constructor or use some methods like `name($value)`
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
    ->add(new Image([
        'images' => ['https://i.imgur.com/ZGPxFN2.jpg'],
    ]))
    ->add(new Footer([
        'text' => 'This is the footer',
        'timestamp' => '2021-07-06T22:00:00.000Z',
    ]));
```

```php
<?php

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

$embed = (new Embed())->addMany([$author, $body, $image, $footer]);
```
The `Embed` provides two methods to add an attribute class
```php
<?php

(new Embed())
    ->add($body)
    ->add($footer);

(new Embed())->addMany([$body, $footer]);
```

Then, pass your data and your config to the `Client` class
```php
<?php

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
- some constraints on attributes are missing
- few templates will be created to give you the possibility to create a message easier and faster
