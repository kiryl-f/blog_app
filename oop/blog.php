<?php

class Blog {
    private $name;
    private $text;
    private $date;

    public function __construct($name, $text)
    {
        $this->name = $name;
        $this->text = $text;
        $this->date =  date("Y/m/d");
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

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }


    public function checkLength(): string {
        if(strlen($this->text) < 20) {
            return "Text must be at least 20 characters long\n";
        }
        return '';
    }

    public function checkName(): string {
        if(strlen($this->name) < 5) {
            return "Text must be at least 20 characters long\n";
        }
        return '';
    }

    public function getErrorMessage(): string {
        $error_message = $this->checkName();
        $error_message .= $this->checkLength();
        return $error_message;
    }
}