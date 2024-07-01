<?php 
        ini_set('dispaly_errors', 'On');
        error_reporting(E_ALL);
        include "conect.php";
        $sessionUser = '';
        if (isset($_SESSION['username'])) {
                $sessionUser = $_SESSION['username'];
        }

        $tbl = "inCloud/template/";
        $func = "inCloud/function/";
        $css = "layOut/css";
        $js = "layOut/js";
        
       // incloud the important files
        
        // include 'inCloud/lang/lang.php';
        include $func . 'function.php';
        include $tbl . "header.php" ;
        if (!isset($noNavbar))
        {
                
                include $tbl . "nav.php" ; 

        }


        // include $tbl . "footer.php";