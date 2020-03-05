<?php

namespace LucasFormiga\Notifications\Messages;

class DiscordMessage
{
    const AQUA = 1752220;
    const GREEN = 3066993;
    const BLUE = 3447003;
    const PURPLE = 10181046;
    const GOLD = 15844367;
    const ORANGE = 15105570;
    const RED = 15158332;
    const GREY = 9807270;
    const DARKER_GREY = 8359053;
    const NAVY = 3426654;
    const DARK_AQUA = 1146986;
    const DARK_GREEN = 2067276;
    const DARK_BLUE = 2123412;
    const DARK_PURPLE = 7419530;
    const DARK_GOLD = 12745742;
    const DARK_ORANGE = 11027200;
    const DARK_RED = 10038562;
    const DARK_GREY = 9936031;
    const LIGHT_GREY = 12370112;
    const DARK_NAVY = 2899536;
    const LUMINOUS_VIVID_PINK = 16580705;
    const DARK_VIVID_PINK = 12320855;

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
    public function card(string $title, string $content, string $color = self::BLUE, array $author = null, array $footer = null): self
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
        $this->card($title, $content, self::GREEN, $author, $footer);

        return $this;
    }

    /**
     * @param string $title
     * @param string $content
     * @return self
     */
    public function info(string $title, string $content, array $author = null, array $footer = null): self
    {
        $this->card($title, $content, self::BLUE, $author, $footer);

        return $this;
    }

    /**
     * @param string $title
     * @param string $content
     * @return self
     */
    public function warning(string $title, string $content, array $author = null, array $footer = null): self
    {
        $this->card($title, $content, self::ORANGE, $author, $footer);

        return $this;
    }

    /**
     * @param string $title
     * @param string $content
     * @return self
     */
    public function danger(string $title, string $content, array $author = null, array $footer = null): self
    {
        $this->card($title, $content, self::RED, $author, $footer);

        return $this;
    }

    /**
     * @param string $title
     * @param string $content
     * @param string $color
     * @param array|null $author
     * @param array|null $footer
     * @return array
     */
    private function embed(string $title, string $content, string $color, array $author = null, array $footer = null): array
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
