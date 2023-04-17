<?php
  require_once("templates/header.php");

  require_once("models/User.php");
  require_once("dao/UserDAO.php");

  $user = new User();
  $userDao = new UserDao($conn, '/');

  $userData = $userDao->verifyToken(true);

?>
  <div id="main-container" class="container-fluid">
    <div class="offset-md-4 col-md-4 new-movie-container">
      <h1 class="page-title">Add momvie</h1>
      <p class="page-description">Share your thoughts!</p>
      <form action="/movie_process.php" id="add-movie-form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="type" value="create">
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Movie title">
        </div>
        <div class="form-group">
          <label for="image">Image:</label>
          <input type="file" class="form-control-file" name="image" id="image">
        </div>
        <div class="form-group">
          <label for="length">Length:</label>
          <input type="text" class="form-control" id="length" name="length" placeholder="Movie length">
        </div>
        <div class="form-group">
          <label for="category">Category:</label>
          <select name="category" id="category" class="form-control">
            <option value="">Select</option>
            <option value="Action">Action</option>
            <option value="Drama">Drama</option>
            <option value="Comedy">Comedy</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Syfy">Syfy</option>
            <option value="Romance">Romance</option>
          </select>
        </div>
        <div class="form-group">
          <label for="trailer">Trailer:</label>
          <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Movie trailer link">
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <textarea name="description" id="description" rows="5" class="form-control" placeholder="Movie description"></textarea>
        </div>
        <input type="submit" class="btn card-btn" value="Add movie">
      </form>
    </div>
  </div>
<?php
  require_once("templates/footer.php");
?>