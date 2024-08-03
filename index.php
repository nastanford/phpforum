<?php
session_start();

// Set the session variable
// $_SESSION['username'] = 'NightCoder';
$_SESSION['username'] = '';

include './queries/qry_users.php';


// Display or process the users
foreach ($users as $user) {
  echo "User ID: " . $user['user_id'] . "<br>";
  echo "Username: " . $user['username'] . "<br>";
  echo "Email: " . $user['email'] . "<br>";
  echo "Join Date: " . $user['join_date'] . "<br>";
  echo "Post Count: " . $user['post_count'] . "<br>";
  echo "Reply Count: " . $user['reply_count'] . "<br>";
  echo "<hr>";
}
include 'includes/header.php';
include 'includes/navbar.php';

//var_dump($users);
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
      if ($_SESSION['username'] != "") {
        // include 'partials/home/login_check.php';
        include 'partials/home/register.php';
      } else {
        include 'partials/home/login.php';
      }
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