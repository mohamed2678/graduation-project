<?php 
        ini_set('dispaly_errors', 'On');
        error_reporting(E_ALL);
        include "connect.php";
        $sessionUser = '';
        if (isset($_SESSION['username'])) {
                $sessionUser = $_SESSION['username'];
        }


        $tbl = "inCloud/tamplate/";
        $func = "inCloud/function/";
        $css = "layOut/css";
        $js = "layOut/js";
        
       // incloud the important files
        
        // include 'inCloud/lang/lang.php';
        include $func . 'function.php';
        include $tbl . "header.php" ;


        // include $tbl . "footer.php";