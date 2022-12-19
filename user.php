<?php

require_once 'add_user_interface.php';

class User {
    private ?string $login;
    private ?string $password;
    private ?string $email;
    private ?string $name;

    public function __construct(?string $login, ?string $password, ?string $email, ?string $name)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->name = $name;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): void
    {
        $this->login = $login;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function toArray(): array {
        return
            array('login' => $this->login, 'password' => $this->password, 'email' => $this->email, 'name' => $this->name);
    }



}