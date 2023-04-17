<?php
  require_once("templates/header.php");

  require_once("dao/MovieDAO.php");

  $movieDao = new MovieDAO($conn, '/');

  $q = filter_input(INPUT_GET, "q");

  $movies = $movieDao->findByTitle($q);

?>
  <div id="main-container" class="container-fluid">
    <h2 class="section-title" id="search-title">You are searching for: <span id="search-result"><?= $q ?></span></h2>
    <p class="section-description">Search results.</p>
    <div class="movies-container">
      <?php foreach($movies as $movie): ?>
        <?php require("templates/movie_card.php"); ?>
      <?php endforeach; ?>
      <?php if(count($movies) === 0): ?>
        <p class="empty-list">No movies found to your search, <a href="/" class="back-link">back</a>.</p>
      <?php endif; ?>
    </div>
  </div>
<?php
  require_once("templates/footer.php");
?>