<?php
session_start();
// Include the autoloader
require_once 'autoloader.php';

// Include your class definitions or use an autoloader
// require_once './models/User.php';

// Ensure the User object is properly instantiated in the session
if (!isset($_SESSION['user']) || !($_SESSION['user'] instanceof Models\User)) {
  $_SESSION['user'] = new Models\User();
}
// set username 
$_SESSION['user']->setUsername('NightCoder');


// Now you can safely use the User object
if ($_SESSION['user']->getUsername() !== null) {
  echo 'User: ' . $_SESSION['user']->getUsername();
}

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
      if ($_SESSION['user']->getUsername() !== null) {
        include 'partials/home/login_check.php';

        // echo 'User: ' . $_SESSION['user']->getUsername();
      } else {
        include 'partials/home/login.php';
      }

      // Right Side 
      // if ($_SESSION['username'] != "") {
      //   // include 'partials/home/login_check.php';
      //   include 'partials/home/register.php';
      // } else {
      //   include 'partials/home/login.php';
      // }
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