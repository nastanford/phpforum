<?php
include 'includes/config.php';

// Get the item ID from a GET request or another source
$item_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($item_id > 0) {
  // Prepare the query
  $query = 'SELECT * FROM items WHERE id = :id';
  // Prepare the statement
  $stmt = $connect->prepare($query);
  // Bind the ID parameter
  $stmt->bindParam(':id', $item_id, PDO::PARAM_INT);
  // Execute the statement
  $stmt->execute();
  // Fetch the data
  $item = $stmt->fetch(PDO::FETCH_ASSOC);
  // Check if an item was found
  if ($item) {
    // Output or process the item data as needed
    print_r($item);
  } else {
    echo "Item not found.";
  }
} else {
  echo "Invalid item ID.";
}
