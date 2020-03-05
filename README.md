# Laravel Discord Notification Channel

<a href="https://packagist.org/packages/lucasformiga/discord-notification-channel"><img src="https://poser.pugx.org/lucasformiga/discord-notification-channel/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/lucasformiga/discord-notification-channel"><img src="https://poser.pugx.org/lucasformiga/discord-notification-channel/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/lucasformiga/discord-notification-channel"><img src="https://poser.pugx.org/lucasformiga/discord-notification-channel/license.svg" alt="License"></a>

## Summary
- [Installation](#installation)
	- [Setting up the Connector](#setting-up-the-connector)
- [Usage](#usage)
	- [Available Methods](#available-methods)
	- [Available Colors](#available-colors)
- [Contributing](#contributing)
- [License](#license)

## Installation
You can install this package using composer:
```bash
composer require lucasformiga/discord-notification-channel
```

After the package installation you will need your channel's webhook URL.
[This article will help you](https://support.discordapp.com/hc/pt-br/articles/228383668-Usando-Webhooks) to setup and add a webhook connector to your Discord's channel.

### Setting up the Connector

```php
// config/services.php
'discord' => [
    'notification_webhook' => env('DISCORD_NOTIFICATION_WEBHOOK')
],
```

Also, you will need to add ``DISCORD_NOTIFICATION_WEBHOOK`` on your .env file along with your webhook url previously generated. Make sure your .env.example is synced with your .env variables.

## Usage
You can now use this package as a notification channel on your Notification, just change the return value to ``['discord']`` on via() method.

### Available Methods
- ``content()``: The content method will receive a string and add a text to your message.
- ``name()``: The name method will receive a string and change the username of your message.
- ``avatar()``: The avatar method will receive a URL as string and change the user avatar of your message.
- ``isTts()``: You can also send a Text To Speech message!
- ``card()``: This method will receive two required string as params, the first param will be the card title while the second param will be the card content. The other three params will be a color, author and footer. (If you would like to add a author and footer, follow this guide: [Embed Author Structure](https://discordapp.com/developers/docs/resources/channel#embed-object-embed-author-structure) [Embed Footer Structure](https://discordapp.com/developers/docs/resources/channel#embed-object-embed-footer-structure)). You will only be able to add 10 cards (info, success, warning and danger cards also included).
- ``info()``: This method will receive two required string as params, the first param will be the card title while the second param will be the card content. The other two params will be a author and footer.
- ``success()``: This method will receive two required string as params, the first param will be the card title while the second param will be the card content. The other two params will be a author and footer.
- ``warning()``: This method will receive two required string as params, the first param will be the card title while the second param will be the card content. The other two params will be a author and footer.
- ``danger()``: This method will receive two required string as params, the first param will be the card title while the second param will be the card content. The other two params will be a author and footer.

### Available Colors
- AQUA
- GREEN
- BLUE
- PURPLE
- GOLD
- ORANGE
- RED
- GREY
- DARKER_GREY
- NAVY
- DARK_AQUA
- DARK_GREEN
- DARK_BLUE
- DARK_PURPLE
- DARK_GOLD
- DARK_ORANGE
- DARK_RED
- DARK_GREY
- LIGHT_GREY
- DARK_NAVY
- LUMINOUS_VIVID_PINK
- DARK_VIVID_PINK

Just use DiscordMessage::COLOR with your card method.

## Contributing

- [Lucas Formiga](https://github.com/lucasformiga)

## License

Discord Notification Channel is open-sourced software licensed under the [MIT license](LICENSE.md).
