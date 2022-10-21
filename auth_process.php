<?php
    require_once("globals.php");
    require_once("db.php");
    require_once("models/User.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");

    $message = new Message($BASE_URL);
    

    //resgata o tipo do form

    $type = filter_input(INPUT_POST, "type");

    //verificar o tipo de form

    if ($type === "register"){

        $name = filter_input(INPUT_POST, "name");
        $lastname = filter_input(INPUT_POST, "lastname");
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

        //verificação de dados minimos 
        if($name && $lastname && $email && $password){

        } else {
            //enviar msg de erro, com os dados faltando 
            $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
        }

    } else if ($type === "login"){

    }

