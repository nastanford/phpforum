<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>
<div class="container mt-5">
  <h2>Add To Do</h2>
  <form action="item_operations.php" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label fw-bold">Name</label>
      <input type="text" class="form-control border-dark" id="name" name="name" required>
    </div>
    <button type="submit" class="btn btn-secondary"><i class="bi bi-plus-lg"></i> Add</button>
  </form>
</div>
<?php
include 'includes/footer.php';
?>