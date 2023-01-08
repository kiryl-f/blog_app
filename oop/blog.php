<?php

class Blog {
    private $name;
    private $text;

    public function __construct($name, $text)
    {
        $this->name = $name;
        $this->text = $text;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text): void
    {
        $this->text = $text;
    }

    public function checkLength() {
        if(strlen($this->text) < 20) {
            return 'Text must be at least 20 characters long';
        }
        return '';
    }
}