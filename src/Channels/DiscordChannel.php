<?php

namespace LucasFormiga\Notifications\Channels;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Notifications\Notification;
use Exception;

class DiscordChannel
{
    private $url;
    private $client;

    /**
     * DiscordChannel constructor.
     * @param HttpClient $client
     * @param string $url
     */
    public function __construct(HttpClient $client, string $url)
    {
        $this->client = $client;
        $this->url = $url;
    }

    /**
     * @param $notifiable
     * @param Notification $notification
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toDiscord($notifiable);
        $payload = $this->build($message->toArray());

        try {
            $response = $this->client->post($this->url, $payload);
        } catch (ClientException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            throw $ex;
        }

        return $response;
    }

    public function build(array $payload): array
    {
        $data = collect([]);

        $data->put('content', $payload['content'] ?? '');

        if (!is_null($payload['username'])) {
            $data->put('username', $payload['username']);
        }

        if (!is_null($payload['avatar_url'])) {
            $data->put('avatar_url', $payload['avatar_url']);
        }

        if (!is_null($payload['tts'])) {
            $data->put('tts', $payload['tts']);
        }

        if (!is_null($payload['embeds'])) {
            $data->put('embeds', $payload['embeds']);
        }

        return $data->toArray();
    }
}
