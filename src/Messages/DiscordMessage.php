<?php

namespace LucasFormiga\Notifications\Messages;

class DiscordMessage
{
    const COLOR_SUCCESS = '44bd32';
    const COLOR_INFO = '00a8ff';
    const COLOR_WARNING = 'fbc531';
    const COLOR_DANGER = 'e84118';

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
    public function card(string $title, string $content, string $color = self::COLOR_INFO): self
    {
        if (!is_null($this->payload['embed'])) {
            if (count($this->payload['embed']) < 10) {
                $this->payload['embed'][] = [
                    'title' => $title,
                    'description' => $content,
                    'color' => $color
                ];
            } else {
                $this->payload['embed'][9] = [
                    'title' => $title,
                    'description' => $content,
                    'color' => $color
                ];
            }
        }

        if (is_null($this->payload['embed'])) {
            $this->payload['embed'][] = [
                'title' => $title,
                'description' => $content,
                'color' => $color
            ];
        }

        return $this;
    }

    /**
     * @param string $title
     * @param string $content
     * @return self
     */
    public function success(string $title, string $content): self
    {
        if (!is_null($this->payload['embed'])) {
            if (count($this->payload['embed']) < 10) {
                $this->payload['embed'][] = [
                    'title' => $title,
                    'description' => $content,
                    'color' => self::COLOR_SUCCESS
                ];
            } else {
                $this->payload['embed'][9] = [
                    'title' => $title,
                    'description' => $content,
                    'color' => self::COLOR_SUCCESS
                ];
            }
        }

        if (is_null($this->payload['embed'])) {
            $this->payload['embed'][] = [
                'title' => $title,
                'description' => $content,
                'color' => self::COLOR_SUCCESS
            ];
        }

        return $this;
    }

    /**
     * @param string $title
     * @param string $content
     * @return self
     */
    public function info(string $title, string $content): self
    {
        if (!is_null($this->payload['embed'])) {
            if (count($this->payload['embed']) < 10) {
                $this->payload['embed'][] = [
                    'title' => $title,
                    'description' => $content,
                    'color' => self::COLOR_INFO
                ];
            } else {
                $this->payload['embed'][9] = [
                    'title' => $title,
                    'description' => $content,
                    'color' => self::COLOR_INFO
                ];
            }
        }

        if (is_null($this->payload['embed'])) {
            $this->payload['embed'][] = [
                'title' => $title,
                'description' => $content,
                'color' => self::COLOR_INFO
            ];
        }

        return $this;
    }

    /**
     * @param string $title
     * @param string $content
     * @return self
     */
    public function warning(string $title, string $content): self
    {
        if (!is_null($this->payload['embed'])) {
            if (count($this->payload['embed']) < 10) {
                $this->payload['embed'][] = [
                    'title' => $title,
                    'description' => $content,
                    'color' => self::COLOR_WARNING
                ];
            } else {
                $this->payload['embed'][9] = [
                    'title' => $title,
                    'description' => $content,
                    'color' => self::COLOR_WARNING
                ];
            }
        }

        if (is_null($this->payload['embed'])) {
            $this->payload['embed'][] = [
                'title' => $title,
                'description' => $content,
                'color' => self::COLOR_WARNING
            ];
        }

        return $this;
    }

    /**
     * @param string $title
     * @param string $content
     * @return self
     */
    public function danger(string $title, string $content): self
    {
        if (!is_null($this->payload['embed'])) {
            if (count($this->payload['embed']) < 10) {
                $this->payload['embed'][] = [
                    'title' => $title,
                    'description' => $content,
                    'color' => self::COLOR_DANGER
                ];
            } else {
                $this->payload['embed'][9] = [
                    'title' => $title,
                    'description' => $content,
                    'color' => self::COLOR_DANGER
                ];
            }
        }

        if (is_null($this->payload['embed'])) {
            $this->payload['embed'][] = [
                'title' => $title,
                'description' => $content,
                'color' => self::COLOR_DANGER
            ];
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function toArray()
    {
        return $this->payload;
    }
}
