<?php

    require_once("globals.php");
    require_once("db.php");
    require_once("models/User.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");

    $message = new Message($BASE_URL);

    $userDao = new UserDAO($conn, $BASE_URL);

    // Resgata o tipo do form
    $type = filter_input(INPUT_POST, "type");

    //atualizar usuario 
    if($type === "update"){

        //resgata dados do user
        $userData = $userDao->verifyToken();

        //receber dados do post 
        $name = filter_input(INPUT_POST, "name");
        $lastname = filter_input(INPUT_POST, "lastname");
        $email = filter_input(INPUT_POST, "email");
        $bio = filter_input(INPUT_POST, "bio");

        //criar um novo objeto de usuario 
        $user = new User();

        //preencher dados do usuario 
        $userData->name = $name;
        $userData->lastname = $lastname;
        $userData->email = $email;
        $userData->bio = $bio;

        $userDao->update($userData);



    //atualizar senha do usuario 
    } else if ($type === "changepassword"){

    } else{
        $message->setMessage("Informações inválidas!", "error", "index.php");
    }