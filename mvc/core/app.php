<?php
    class app{
        private $controller="home";
        private $action;
        private $params;
        function __construct(){
            $arr= $this->UrlProcess();
            // Xu lu controller
            if(isset($arr[0])){
                if(file_exists("../MVC/mvc/controllers/".$arr[0].".php")){
                    $this->controller=$arr[0];
                    require_once("../MVC/mvc/controllers/".$arr[0].".php");
                    unset($arr[0]);
                }
            }
            else require_once("../MVC/mvc/controllers/home.php");
            $this->controller = new $this->controller;
            // Action
            if(isset($arr[1])){
                if( method_exists( $this->controller , $arr[1]) ){
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }
            // Params
            $this->params = $arr?array_values($arr):[];
            if(isset($this->action))
            call_user_func_array([$this->controller, $this->action], $this->params );
        }
        // xu ly url
        function UrlProcess(){
            if(isset($_GET['url'])){
                return explode("/", filter_var(trim($_GET["url"])));
            }
        }
    }
?>