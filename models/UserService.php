<?php

namespace Services;

use Models\User;
use Repositories\UserRepository;

class UserService
{
  private $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function registerUser(string $username, string $email): User
  {
    $user = new User(null, new \DateTime(), 0, 0, $username, $email);
    $this->userRepository->save($user);
    return $user;
  }

  public function getUserById(int $id): ?User
  {
    return $this->userRepository->findById($id);
  }

  public function updateUserProfile(User $user): void
  {
    $this->userRepository->save($user);
  }

  public function login(string $username, string $password): ?User
  {
    // This would involve checking the password, which isn't implemented in our simple User model
    // For now, let's just find the user by username
    $user = $this->userRepository->findByUsername($username);
    if ($user) {
      $user->setLoggedIn(true);
      $this->userRepository->save($user);
    }
    return $user;
  }

  public function logout(User $user): void
  {
    $user->setLoggedIn(false);
    $this->userRepository->save($user);
  }
}
