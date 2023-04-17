<?php

  require_once("globals.php");
  require_once("db.php");
  require_once("models/User.php");
  require_once("models/Message.php");
  require_once("dao/UserDAO.php");

  $message = new Message('/');

  $userDao = new UserDAO($conn, '/');

  $type = filter_input(INPUT_POST, "type");

  if($type === "register") {

    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

    if($name && $lastname && $email && $password) {

      if($password === $confirmpassword) {

        if($userDao->findByEmail($email) === false) {

          $user = new User();

          $userToken = $user->generateToken();
          $finalPassword = $user->generatePassword($password);

          $user->name = $name;
          $user->lastname = $lastname;
          $user->email = $email;
          $user->password = $finalPassword;
          $user->token = $userToken;

          $auth = true;

          $userDao->create($user, $auth);

        } else {
          
          $message->setMessage("Email already registered", "error", "back");

        }

      } else {

        $message->setMessage("Passwords don't match", "error", "back");

      }

    } else {

      $message->setMessage("Please, fill in all fields", "error", "back");

    }

  } else if($type === "login") {

    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");

    if($userDao->authenticateUser($email, $password)) {

      $message->setMessage("Wellcome", "success", "editprofile.php");

    } else {

      $message->setMessage("Wrong User/Password", "error", "back");

    }

  } else {

    $message->setMessage("Input not valid", "error", "index.php");

  }