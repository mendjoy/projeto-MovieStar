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

        //upload da imagem
        if(isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])){
            
            $image = $_FILES["image"];
            $imageTypes =["image/jpeg", "image/jpg", "image/png"];
            $jpgArray = ["image/jpeg", "image/jpg"];

            //checa o tipo de imagem 
            if(in_array($image["type"], $imageTypes)){

                //checar se é jpeg
                if(in_array($image, $jpgArray )){

                    $imageFile = imageCreateFromJpeg($image["tmp_name"]);

                //se for png 
                } else {
                    $imageFile = imageCreateFromPng($image["tmp_name"]);

                }

                $imageName = $user->imageGenerateName();
                imagejpeg($imageFile, "./img/users/" . $imageName, 100);

                $userData->image = $imageName;


            } else {
                $message->setMessage("Tipo de imagem inválido! Faça upload de jpeg, jpg ou png", "error", "back");

            }

        }

        $userDao->update($userData);



    //atualizar senha do usuario 
    } else if ($type === "changepassword"){

        $password = filter_input(INPUT_POST, "password");
        $confirmpassword = filter_input(INPUT_POST, "confirmpassword");
       
        //resgata dados do usuario 
        $userData = $userDao->verifyToken();
        $id = $userData->id;

        //checar se a senha é igual a confirmação de senha
        if($password == $confirmpassword){

            $user = new User();

            $finalPassword = $user->generatePassword($password);

            $user->password = $finalPassword;
            $user->id = $id;

            $userDao->changePassoword($user);

        //se nao for igual
        } else{
            $message->setMessage("As senhas não são iguais!", "error", "back");

        }
        

    } else{
        $message->setMessage("Informações inválidas!", "error", "index.php");
    }