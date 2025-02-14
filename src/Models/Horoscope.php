<?php

namespace Models;

class Horoscope {
    private string $id;
    private string $title;
    private string $content;

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
