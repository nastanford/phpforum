<?php

namespace Models;

class User
{
  public $id;
  public $username;
  public $email;
  public $isLoggedIn;

  public function __construct($id = null, $username = null, $email = null)
  {
    $this->id = $id;
    $this->username = $username;
    $this->email = $email;
    $this->isLoggedIn = false;
  }

  public function login()
  {
    $this->isLoggedIn = true;
  }

  public function logout()
  {
    $this->isLoggedIn = false;
  }
}
