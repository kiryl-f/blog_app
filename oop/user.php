<?php

require_once 'add_user_interface.php';

class User {
    private ?string $login;
    private ?string $password;
    private ?string $email;
    private ?string $name;

    public function __construct(?string $login, ?string $password, ?string $name, ?string $email)
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

    private function checkLogin($login):string {
        if(strlen($login) < 6) {
            return "Login must be at least 6 characters long\n";
        }
        return '';
    }

    private function checkPassword($password): string {
        if(strlen($password) < 6) {
            return "Password must be at least 6 characters long\n";
        }

        if (!(preg_match('/[A-Za-z]/', $password) && preg_match('/[0-9]/', $password))) {
            return "Password should contain numbers and letters\n";
        }
        return '';
    }

    private function checkName($name):string {
        if(!preg_match('/[A-Za-z]/', $name)) {
            return "Name should consist of letters\n";
        }
        return '';
    }


    public function getErrorMessage():string {
        $error_message = $this->checkLogin($this->getLogin());
        $error_message .= $this->checkPassword($this->getPassword());
        $error_message .= $this->checkName($this->getName());

        return $error_message;
    }

    public function saltPassword() {
        $this->setPassword(md5($this->getPassword()) . 'salt');
    }


}