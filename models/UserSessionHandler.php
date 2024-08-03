<?php

namespace Models;

class UserSessionHandler
{
  public function login($id, $username, $email)
  {
    $_SESSION['user'] = [
      'id' => $id,
      'username' => $username,
      'email' => $email,
      'isLoggedIn' => true
    ];
  }

  public function logout()
  {
    unset($_SESSION['user']);
  }

  public function isLoggedIn()
  {
    return isset($_SESSION['user']) && $_SESSION['user']['isLoggedIn'];
  }

  public function getUser()
  {
    return $_SESSION['user'] ?? null;
  }
}
