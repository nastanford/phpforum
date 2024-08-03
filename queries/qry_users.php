<?php
include './includes/config.php';

try {
  // Prepare and execute the query
  $stmt = $connect->prepare("SELECT * FROM USER");
  $stmt->execute();

  // Fetch all users
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $err) {
  echo "Error: " . $err->getMessage();
}

// Close the connection
// $connect = null;

// // create query
// $query = 'SELECT * FROM users';
// // get result
// $result = $connect->query($query);
// // fetch data
// $users = $result->fetchAll(PDO::FETCH_ASSOC);