  <div id="loginScreen">
    <div class="container col-12 mb-3">
      <form hx-get="/partials/home/submit_user.php" hx-target="#loginScreen" hx-swap="innerHTML">

        <div class="mb-3">
          <label for="username" class="form-label">Username:</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
          <label for="mypassword" class="form-label">Password:</label>
          <input type="password" class="form-control" id="mypassword" name="mypassword">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Register</button>
          <button type="button" class="btn btn-secondary" hx-get="/partials/home/login.php" hx-target="#loginScreen" hx-swap="innerHTML">Cancel</button>
        </div>
      </form>
    </div>
  </div>