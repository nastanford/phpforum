<?php

namespace Controllers;

use Services\UserService;

class UserController
{
  private $userService;

  public function __construct(UserService $userService)
  {
    $this->userService = $userService;
  }

  public function register()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = $_POST['username'] ?? '';
      $email = $_POST['email'] ?? '';

      $user = $this->userService->registerUser($username, $email);

      // Redirect to login page or set session, etc.
      header('Location: /login.php');
      exit;
    }

    // If not POST, display the registration form
    include 'views/register.php';
  }

  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = $_POST['username'] ?? '';
      $password = $_POST['password'] ?? '';

      $user = $this->userService->login($username, $password);

      if ($user) {
        $_SESSION['user'] = $user;
        header('Location: /dashboard.php');
        exit;
      } else {
        $error = 'Invalid username or password';
      }
    }

    // If not POST or login failed, display the login form
    include 'views/login.php';
  }

  public function logout()
  {
    if (isset($_SESSION['user'])) {
      $this->userService->logout($_SESSION['user']);
      unset($_SESSION['user']);
    }

    header('Location: /');
    exit;
  }

  public function profile()
  {
    if (!isset($_SESSION['user'])) {
      header('Location: /login.php');
      exit;
    }

    $user = $this->userService->getUserById($_SESSION['user']->getUserId());

    include 'views/profile.php';
  }
}
