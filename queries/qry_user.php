<?php
include './includes/config.php';

// Get the item ID from a GET request or another source
$user_id = isset($_GET['user_id']) ? (int)$_GET['user_id'] : 0;
if ($user_id > 0) {
  // Prepare the query
  $query = 'SELECT * FROM user WHERE user_id = :id';
  // Prepare the statement
  $stmt = $connect->prepare($query);
  // Bind the ID parameter
  $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
  // Execute the statement
  $stmt->execute();
  // Fetch the data
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  // Check if an item was found
  if ($user) {
    // Output or process the user data as needed
  } else {
    echo "User not found.";
  }
} else {
  echo "Invalid user ID.";
}
