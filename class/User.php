<?php


class User
{
    protected $username;
    protected $password;
    protected $isAdmin;

    public function __construct($username, $password, $isAdmin = '0')
    {
        $this->username = $username;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
    }

    public function login()
    {

    }

    public function register()
    {
    }
}