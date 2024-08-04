<?php

namespace Repositories;

use DAOs\UserDAO;
use Models\User;

class UserRepository
{
  private $userDAO;

  public function __construct(UserDAO $userDAO)
  {
    $this->userDAO = $userDAO;
  }

  public function findById(int $id): ?User
  {
    return $this->userDAO->findById($id);
  }

  public function save(User $user): void
  {
    $this->userDAO->save($user);
  }

  public function findByUsername(string $username): ?User
  {
    // This method would need to be implemented in the UserDAO
    return $this->userDAO->findByUsername($username);
  }
}
