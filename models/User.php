<?php

namespace Models;

class User
{
  private $userId;
  private $joinDate;
  private $postCount;
  private $replyCount;
  private $username;
  private $email;
  private $passwordHash;
  private $isLoggedIn;

  public function __construct(
    int $userId = null,
    ?\DateTime $joinDate = null,
    int $postCount = 0,
    int $replyCount = 0,
    ?string $username = null,
    ?string $email = null,
    ?string $passwordHash = null
  ) {
    $this->userId = $userId;
    $this->joinDate = $joinDate ?? new \DateTime();
    $this->postCount = $postCount;
    $this->replyCount = $replyCount;
    $this->username = $username;
    $this->email = $email;
    $this->isLoggedIn = false;
    $this->passwordHash = $passwordHash;
  }


  public function __serialize(): array
  {
    return [
      'userId' => $this->userId,
      'joinDate' => $this->joinDate->format('Y-m-d H:i:s'),
      'postCount' => $this->postCount,
      'replyCount' => $this->replyCount,
      'username' => $this->username,
      'email' => $this->email,
      'isLoggedIn' => $this->isLoggedIn,
    ];
  }

  public function __unserialize(array $data): void
  {
    $this->userId = $data['userId'];
    $this->joinDate = new \DateTime($data['joinDate']);
    $this->postCount = $data['postCount'];
    $this->replyCount = $data['replyCount'];
    $this->username = $data['username'];
    $this->email = $data['email'];
    $this->isLoggedIn = $data['isLoggedIn'];
  }


  public function getUserId(): ?int
  {
    return $this->userId;
  }

  public function getJoinDate(): \DateTime
  {
    return $this->joinDate;
  }

  public function getPostCount(): int
  {
    return $this->postCount;
  }

  public function incrementPostCount(): void
  {
    $this->postCount++;
  }

  public function getReplyCount(): int
  {
    return $this->replyCount;
  }

  public function incrementReplyCount(): void
  {
    $this->replyCount++;
  }

  public function getUsername(): ?string
  {
    return $this->username;
  }

  public function setUserId(string $user_id): void
  {
    $this->userId = $user_id;
  }
  public function setUsername(string $username): void
  {
    $this->username = $username;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function setEmail(string $email): void
  {
    $this->email = $email;
  }

  public function isLoggedIn(): bool
  {
    return $this->isLoggedIn;
  }

  public function setLoggedIn(bool $isLoggedIn): void
  {
    $this->isLoggedIn = $isLoggedIn;
  }

  public function getPasswordHash(): ?string
  {
    return $this->passwordHash;
  }
  public function setPasswordHash(string $passwordHash): void
  {
    $this->passwordHash = $passwordHash;
  }
}
