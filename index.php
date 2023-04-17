<?php
  require_once("templates/header.php");

  require_once("dao/MovieDAO.php");

  $movieDao = new MovieDAO($conn, '/');

  $latestMovies = $movieDao->getLatestMovies();

  $actionMovies = $movieDao->getMoviesByCategory("Ação");

  $comedyMovies = $movieDao->getMoviesByCategory("Comédia");

?>
  <div id="main-container" class="container-fluid">
    <h2 class="section-title">Recent added</h2>
    <p class="section-description">See the last reviews on MovieManiax</p>
    <div class="movies-container">
      <?php foreach($latestMovies as $movie): ?>
        <?php require("templates/movie_card.php"); ?>
      <?php endforeach; ?>
      <?php if(count($latestMovies) === 0): ?>
        <p class="empty-list">No movies registered!</p>
      <?php endif; ?>
    </div>
    <h2 class="section-title">Action</h2>
    <p class="section-description">See the bast action movies</p>
    <div class="movies-container">
      <?php foreach($actionMovies as $movie): ?>
        <?php require("templates/movie_card.php"); ?>
      <?php endforeach; ?>
      <?php if(count($actionMovies) === 0): ?>
        <p class="empty-list">No action movies registered!</p>
      <?php endif; ?>
    </div>
    <h2 class="section-title">Comedy</h2>
    <p class="section-description">See the best comedy movies</p>
    <div class="movies-container">
      <?php foreach($comedyMovies as $movie): ?>
        <?php require("templates/movie_card.php"); ?>
      <?php endforeach; ?>
      <?php if(count($comedyMovies) === 0): ?>
        <p class="empty-list">No movies comedy movies registered!</p>
      <?php endif; ?>
    </div>
  </div>
<?php
  require_once("templates/footer.php");
?>