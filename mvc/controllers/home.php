<?php
    include("./mvc/core/controller.php");
    class home extends controller{
        function __construct()
        {
            // tim 4 san pham bat ky de show qua home
            $shoe= $this->model("sanpham");
            $shoes=$shoe->limit4();
            $this->view("home", ["shoes"=>$shoes]);
        }
    }
?>