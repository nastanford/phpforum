<div id="loginScreen">
  <div class="container col-12 mb-2">
    <form hx-post="/partials/home/login_check.php" hx-target="#loginScreen" hx-swap="outerHTML">
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="name@example.com">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="" hx-get="/partials/home/register.php" hx-target="#loginScreen" class="btn btn-secondary">Register</a>
      </div>
    </form>
  </div>
</div>