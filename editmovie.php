<?php
  require_once("templates/header.php");

  require_once("models/User.php");
  require_once("dao/UserDAO.php");
  require_once("dao/MovieDAO.php");

  $user = new User();
  $userDao = new UserDao($conn, '/');

  $userData = $userDao->verifyToken(true);

  $movieDao = new MovieDAO($conn, '/');

  $id = filter_input(INPUT_GET, "id");

  if(empty($id)) {

    $message->setMessage("Movie not found", "error", "index.php");

  } else {

    $movie = $movieDao->findById($id);

    if(!$movie) {

      $message->setMessage("Movie not found", "error", "index.php");

    }

  }

  if($movie->image == "") {
    $movie->image = "movie_cover.jpg";
  }

?>
  <div id="main-container" class="container-fluid">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 offset-md-1">
          <h1><?= $movie->title ?></h1>
          <p class="page-description">Fill in the form to update the movie</p>
          <form id="edit-movie-form" action="/movie_process.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="type" value="update">
            <input type="hidden" name="id" value="<?= $movie->id ?>">
            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Movie title" value="<?= $movie->title ?>">
            </div>
            <div class="form-group">
              <label for="image">Image:</label>
              <input type="file" class="form-control-file" name="image" id="image">
            </div>
            <div class="form-group">
              <label for="length">Length:</label>
              <input type="text" class="form-control" id="length" name="length" placeholder="Length" value="<?= $movie->length ?>">
            </div>
            <div class="form-group">
              <label for="category">Category:</label>
              <select name="category" id="category" class="form-control">
                <option value="">Choose</option>
                <option value="Ação" <?= $movie->category === "Action" ? "selected" : "" ?>>Action</option>
                <option value="Drama" <?= $movie->category === "Drama" ? "selected" : "" ?>>Drama</option>
                <option value="Comédia" <?= $movie->category === "Comedy" ? "selected" : "" ?>>Comedy</option>
                <option value="Syfy" <?= $movie->category === "Syfy" ? "selected" : "" ?>>Syfy</option>
                <option value="Fantasia / Ficção" <?= $movie->category === "Fantasia / Ficção" ? "selected" : "" ?>>Fantasy</option>
                <option value="Romance" <?= $movie->category === "Romance" ? "selected" : "" ?>>Romance</option>
              </select>
            </div>
            <div class="form-group">
              <label for="trailer">Trailer:</label>
              <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Insert the movie trailer" value="<?= $movie->trailer ?>">
            </div>
            <div class="form-group">
              <label for="description">Movie description:</label>
              <textarea name="description" id="description" rows="5" class="form-control" placeholder="Tell about the movie"><?= $movie->description ?></textarea>
            </div>
            <input type="submit" class="btn card-btn" value="Edit movie">
          </form>
        </div>
        <div class="col-md-3">
          <div class="movie-image-container" style="background-image: url('/img/movies/<?= $movie->image ?>')"></div>
        </div>
      </div>
    </div>
  </div>
<?php
  require_once("templates/footer.php");
?>
