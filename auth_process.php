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
  
    // Verificação do tipo de form
    if($type === "register") {
  
      $name = filter_input(INPUT_POST, "name");
      $lastname = filter_input(INPUT_POST, "lastname");
      $email = filter_input(INPUT_POST, "email");
      $password = filter_input(INPUT_POST, "password");
      $confirmpassword = filter_input(INPUT_POST, "confirmpassword");
  
      // Verificação de dados mínimos 
      if($name && $lastname && $email && $password) {

          //verificar se as senhas são iguais 
          if($password === $confirmpassword){

              //verificar se o email ja foi cadastrado
              if($userDao->findByEmail($email) === false){
               

              } else{
                 

              }
              
          } else {
            $message->setMessage("As senhas não são iguais!", "error", "back");

          }


      } else {
        //quando há dados faltando 
        $message->setMessage("Por favor, preencha todos os campos!", "error", "back");
      }

      } else if ($type === "login"){

    }