<?php

namespace LucasFormiga\Notifications\Messages;

class DiscordMessage
{
    const COLOR_SUCCESS = 3066993;
    const COLOR_INFO = 3447003;
    const COLOR_WARNING = 15105570;
    const COLOR_DANGER = 15158332;

    private $payload;

    /**
     * @param string $text
     * @return $this
     */
    public function content(string $text): self
    {
        $this->payload['content'] = $text;

        return $this;
    }

    /**
     * @param string $input
     * @return $this
     */
    public function name(string $input): self
    {
        $this->payload['username'] = $input;

        return $this;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function avatar(string $url): self
    {
        $this->payload['avatar_url'] = $url;

        return $this;
    }

    /**
     * @param bool $switch
     * @return $this
     */
    public function isTts(): self
    {
        $this->payload['tts'] = true;

        return $this;
    }

    /**
     * @param string $title
     * @param string $content
     * @param string $color
     * @return self
     */
    public function card(string $title, string $content, string $color = self::COLOR_INFO, array $author = null, array $footer = null): self
    {
        if (
            isset($this->payload['embeds'])
            && count($this->payload['embeds']) < 10
        ) {
            $this->payload['embeds'][] = $this->embed($title, $content, $color, $author, $footer);

            return $this;
        }

        if (!isset($this->payload['embeds'])) {
            $this->payload['embeds'][] = $this->embed($title, $content, $color, $author, $footer);

            return $this;
        }

        return $this;
    }

    /**
     * @param string $title
     * @param string $content
     * @return self
     */
    public function success(string $title, string $content, array $author = null, array $footer = null): self
    {
        $this->card($title, $content, self::COLOR_SUCCESS, $author, $footer);

        return $this;
    }

    /**
     * @param string $title
     * @param string $content
     * @return self
     */
    public function info(string $title, string $content, array $author = null, array $footer = null): self
    {
        $this->card($title, $content, self::COLOR_INFO, $author, $footer);

        return $this;
    }

    /**
     * @param string $title
     * @param string $content
     * @return self
     */
    public function warning(string $title, string $content, array $author = null, array $footer = null): self
    {
        $this->card($title, $content, self::COLOR_WARNING, $author, $footer);

        return $this;
    }

    /**
     * @param string $title
     * @param string $content
     * @return self
     */
    public function danger(string $title, string $content, array $author = null, array $footer = null): self
    {
        $this->card($title, $content, self::COLOR_DANGER, $author, $footer);

        return $this;
    }

    private function embed(string $title, string $content, string $color, array $author = null, array $footer = null)
    {
        $data = [
            'title' => $title,
            'description' => $content,
            'color' => (integer) $color
        ];

        if (!is_null($author)) {
            $data['author'] = $author;
        }

        if (!is_null($footer)) {
            $data['footer'] = $footer;
        }

        return $data;
    }

    /**
     * @return mixed
     */
    public function toArray()
    {
        return $this->payload;
    }
}
