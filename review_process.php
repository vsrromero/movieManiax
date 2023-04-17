<?php

  require_once("globals.php");
  require_once("db.php");
  require_once("models/Movie.php");
  require_once("models/Review.php");
  require_once("models/Message.php");
  require_once("dao/UserDAO.php");
  require_once("dao/MovieDAO.php");
  require_once("dao/ReviewDAO.php");

  $message = new Message('/');
  $userDao = new UserDAO($conn, '/');
  $movieDao = new MovieDAO($conn, '/');
  $reviewDao = new ReviewDAO($conn, '/');

  $type = filter_input(INPUT_POST, "type");

  $userData = $userDao->verifyToken();

  if($type === "create") {

    $rating = filter_input(INPUT_POST, "rating");
    $review = filter_input(INPUT_POST, "review");
    $movies_id = filter_input(INPUT_POST, "movies_id");
    $users_id = $userData->id;

    $reviewObject = new Review();

    $movieData = $movieDao->findById($movies_id);

    if($movieData) {

      if(!empty($rating) && !empty($review) && !empty($movies_id)) {

        $reviewObject->rating = $rating;
        $reviewObject->review = $review;
        $reviewObject->movies_id = $movies_id;
        $reviewObject->users_id = $users_id;

        $reviewDao->create($reviewObject);

      } else {

        $message->setMessage("Missing rate and review!", "error", "back");

      }

    } else {

      $message->setMessage("Invalid input", "error", "index.php");

    }

  } else {

    $message->setMessage("Invalid input", "error", "index.php");

  }