<?php

namespace classes\Users;

class Users
{
    protected string $name;
    protected string $nickname;
    protected string $birthday;
    protected string $stack;

    public function __construct($name, $nickname, $birthday, $stack)
    {
        $this->name = $name;
        $this->nickname = $nickname;
        $this->birthday = $birthday;
        $this->stack = $stack;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($new_name) {
        $this->name = $new_name;
    }

    public function getNickname() {
        return $this->nickname;
    }

    public function setNickname($new_nickname) {
        $this->nickname = $new_nickname;
    }
}
