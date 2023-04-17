<?php
  require_once("templates/header.php");
?>
  <div id="main-container" class="container-fluid">
    <div class="col-md-12">
      <div class="row" id="auth-row">
        <div class="col-md-4" id="login-container">
          <h2>Sign in</h2>
          <form action="/auth_process.php" method="POST">
            <input type="hidden" name="type" value="login">
            <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <input type="submit" class="btn card-btn" value="Sign in">
          </form>
        </div>
        <div class="col-md-4" id="register-container">
          <h2>Sign up</h2>
          <form action="/auth_process.php" method="POST">
            <input type="hidden" name="type" value="register">
            <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
            </div>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="lastname">Last name:</label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="confirmpassword">Confirm your password:</label>
              <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm you passwerd">
            </div>
            <input type="submit" class="btn card-btn" value="Sign up">
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
  require_once("templates/footer.php");
?>