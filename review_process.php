<?php
    require_once("globals.php");
    require_once("db.php");
    require_once("models/User.php");
    require_once("models/Message.php");
    require_once("models/Movie.php");
    require_once("dao/UserDAO.php");
    require_once("dao/MovieDAO.php");

    //recebe o tipo do form
    $type = filter_input(INPUT_POST, "type");

    $message = new Message($BASE_URL);
    $userDao = new UserDAO($conn, $BASE_URL);
    $movieDao = new MovieDAO($conn, $BASE_URL);

    $userData = $userDao->verifyToken();

    if($type === "create"){ 

    }