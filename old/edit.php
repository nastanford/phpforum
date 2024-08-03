<?php
include 'includes/header.php';
include 'includes/navbar.php';
include 'queries/qry_item.php';
?>

<div class="container mt-5">
  <h2>Edit To Do</h2>
  <form action="item_operations.php" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">
    <div class="mb-3">
      <label for="name" class="form-label fw-bold">Name</label>
      <input type="text" class="form-control border-dark" id="name" name="name" value="<?= htmlspecialchars($item['name']) ?>" required>
    </div>
    <button type="submit" class="btn btn-secondary">
      <i class='bi bi-pencil'></i>
      Update</button>
  </form>
</div>
<?php
include 'includes/footer.php';
?>