<?php

namespace DAOs;

use Models\User;
use PDO;

class UserDAO
{
  private $db;

  public function __construct(PDO $db)
  {
    $this->db = $db;
  }

  public function findById(int $id): ?User
  {
    $stmt = $this->db->prepare("SELECT * FROM users WHERE user_id = :id");
    $stmt->execute(['id' => $id]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$userData) {
      return null;
    }

    return new User(
      $userData['user_id'],
      new \DateTime($userData['join_date']),
      $userData['post_count'],
      $userData['reply_count'],
      $userData['username'],
      $userData['email']
    );
  }

  public function save(User $user): void
  {
    if ($user->getUserId() === null) {
      $this->insert($user);
    } else {
      $this->update($user);
    }
  }

  private function insert(User $user): void
  {
    $stmt = $this->db->prepare("
            INSERT INTO users (join_date, post_count, reply_count, username, email)
            VALUES (:join_date, :post_count, :reply_count, :username, :email)
        ");

    $stmt->execute([
      'join_date' => $user->getJoinDate()->format('Y-m-d H:i:s'),
      'post_count' => $user->getPostCount(),
      'reply_count' => $user->getReplyCount(),
      'username' => $user->getUsername(),
      'email' => $user->getEmail()
    ]);

    $user->setUserId($this->db->lastInsertId());
  }

  private function update(User $user): void
  {
    $stmt = $this->db->prepare("
            UPDATE users
            SET join_date = :join_date, post_count = :post_count, reply_count = :reply_count,
                username = :username, email = :email
            WHERE user_id = :user_id
        ");

    $stmt->execute([
      'user_id' => $user->getUserId(),
      'join_date' => $user->getJoinDate()->format('Y-m-d H:i:s'),
      'post_count' => $user->getPostCount(),
      'reply_count' => $user->getReplyCount(),
      'username' => $user->getUsername(),
      'email' => $user->getEmail()
    ]);
  }

  public function findByUsername(string $username): ?User
  {
    $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$userData) {
      return null;
    }

    return new User(
      $userData['user_id'],
      new \DateTime($userData['join_date']),
      $userData['post_count'],
      $userData['reply_count'],
      $userData['username'],
      $userData['email'],
      $userData['password_hash']
    );
  }
}
