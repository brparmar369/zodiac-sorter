<?php

namespace Models;
/**
 * Class Horoscope
 *
 * Represents a horoscope entry with an ID, title, and content.
 */
class Horoscope {
    /**
     * @var string Unique identifier for the horoscope.
     */
    private string $id;

    /**
     * @var string Title of the horoscope.
     */
    private string $title;

    /**
     * @var string Content of the horoscope message.
     */
    private string $content;

    /**
     * Horoscope constructor.
     *
     * @param string $id Unique identifier of the horoscope.
     * @param string $title Title of the horoscope.
     * @param string $content Content of the horoscope.
     */
    public function __construct(string $id, string $title, string $content) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function toArray() {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content
        ];
    }
}
