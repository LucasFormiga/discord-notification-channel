<?php

namespace LucasFormiga\Notifications;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\ChannelManager;
use LucasFormiga\Notifications\Channels\DiscordChannel;

class DiscordServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Notification::resolved(function (ChannelManager $service) {
            $service->extend('discord', function ($app) {
                return new DiscordChannel(
                    $app->make(HttpClient::class),
                    $app['config']['services.discord.notification_webhook']
                );
            });
        });
    }
}
