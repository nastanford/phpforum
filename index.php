<?php
session_start();

// Set the session variable
$_SESSION['username'] = 'NightCoder';

include 'includes/header.php';
include 'includes/navbar.php';


?>



<div class="container mt-4">
  <div class="row">
    <div class="col-md-8">
      <h1 class="mb-4">PHP and HTMX Forum</h1>
      <?php
      // Left Side 
      include 'partials/home/card1.php';
      include 'partials/home/card2.php';
      ?>
    </div>
    <div class="col-md-4">
      <?php
      // Right Side 
      echo $_SESSION['username'];
      include 'partials/home/card3.php';
      include 'partials/home/card4.php';
      include 'partials/home/card5.php';
      ?>
    </div>
  </div>
</div>

<?php
include 'includes/footer.php';
?>