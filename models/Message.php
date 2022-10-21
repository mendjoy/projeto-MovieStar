<?php

    class Message {

        private $url;

        public function __construct($url){
            $this->url = $url;
        }

        public function setMessage($msg, $type, $redirect = "index.php"){
            $_SESSION["msg"] = $msg;
            $_SESSION["type"] = $type;

            if($redirect != "back"){
                header("location: $this->url" . $redirect); //VOLTA PRO INDEX
            }else{
                header("location: " . $_SERVER["HTTP_REFERER"]); //VOLTA PARA ULTIMA PAGINA ACESSADA
                
            }

        }

        public function getMessage(){

        }

        public function clearMessage(){

        }

    }