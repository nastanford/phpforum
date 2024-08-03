<?php
include 'includes/header.php';
include 'includes/navbar.php';
include 'queries/qry_items.php';

// Handle delete request
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id']) && (int)$_GET['id'] > 0) {
  $item_id = (int)$_GET['id'];
  $query = 'DELETE FROM items WHERE ID = :id';
  $stmt = $connect->prepare($query);
  $stmt->bindParam(':id', $item_id, PDO::PARAM_INT);

  if ($stmt->execute()) {
    // After deletion, redirect back to index.php
    header('Location: index.php');
    exit();
  } else {
    echo "Error in executing delete query.";
  }
}
?>

<div class="container-fluid mt-4">
  <div class="row">
    <div class="col-9 h3 ms-2">
      To Do List
    </div>
    <div class="col-2 text-end">
      <a href="add.php"
        class="btn btn-sm btn-secondary">
        <i class="bi bi-plus-lg"></i> Add
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <table class="table table-sm table-striped">
        <thead>
          <tr>
            <th class="col-1">Edit</th>
            <th class="col-10">Item</th>
            <th class="col-1 text-end">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($items as $item) : ?>
          <tr>
            <td><a href="edit.php?id=<?= $item['id'] ?>"
                class="btn btn-secondary btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
            <td><?= $item['name'] ?></td>
            <td class="col-1 text-end">
              <a href="index.php?action=delete&id=<?= $item['id'] ?>"
                class="btn btn-secondary btn-sm"><i class="bi bi-trash"></i> Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
include 'includes/footer.php';
?>