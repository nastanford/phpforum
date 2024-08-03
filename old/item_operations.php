<?php
include 'includes/config.php';

// Insert or update item
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $item_id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

  if ($item_id > 0) {
    // Update the item
    $query = 'UPDATE items SET Name = :name WHERE ID = :id';
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':id', $item_id, PDO::PARAM_INT);
  } else {
    // Insert a new item
    $query = 'INSERT INTO items (Name) VALUES (:name)';
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  }

  if ($stmt->execute()) {
    header('Location: index.php');
    exit();
  } else {
    echo "Error in executing query.";
  }
}


// Fetch the item for editing if ID is provided
$item = ['ID' => 0, 'Name' => ''];
if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
  $item_id = (int)$_GET['id'];
  $query = 'SELECT * FROM items WHERE ID = :id';
  $stmt = $connect->prepare($query);
  $stmt->bindParam(':id', $item_id, PDO::PARAM_INT);
  $stmt->execute();
  $item = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$item) {
    echo "Item not found.";
    exit();
  }
}

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container mt-5">
  <h2><?= $item['ID'] > 0 ? 'Edit To Do' : 'Add To Do' ?></h2>
  <form action="item_operations.php" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($item['ID']) ?>">
    <div class="mb-3">
      <label for="name" class="form-label fw-bold">Name</label>
      <input type="text" class="form-control border-dark" id="name" name="name" value="<?= htmlspecialchars($item['Name']) ?>" required>
    </div>
    <button type="submit" class="btn btn-secondary">
      <i class='bi bi-pencil'></i> <?= $item['ID'] > 0 ? 'Update' : 'Add' ?>
    </button>
    <?php if ($item['ID'] > 0) : ?>
      <a href="item_operations.php?action=delete&id=<?= htmlspecialchars($item['ID']) ?>" class="btn btn-danger">
        <i class="bi bi-trash"></i> Delete
      </a>
    <?php endif; ?>
  </form>
</div>

<?php
include 'includes/footer.php';
?>