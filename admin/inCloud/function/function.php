<?php
/*
** v.1.0.0
** function select items from database [function select parameters ]
**$select item [example= user | Item |category]
**from = table form
*/ 
function selectItem($select, $from, $value){
    global $con;
    $statement = $con->prepare("SELECT $select FROM $from where $select = ?");
    $statement->execute(array($value));
    $count = $statement->rowCount();
    return $count;
}
/*
** v 2.0.0
** get all function
**$select = select all fields from database
**$tabel = select all tabale from dataabse 
*/ 


function getAllFrom($field, $table, $orderfield,  $where = NULL, $and = null,  $ordering = 'DESC') {  
    global $con;
    $getAll = $con->prepare("SELECT $field FROM $table $where $and ORDER BY $orderfield $ordering");
    $getAll->execute();
    $all = $getAll->fetchAll();
    return $all;
}

// v 1 
// this function to easy get name of title page
function getTitle(){
    global $pageTitle;
    if (isset($pageTitle)){
        echo $pageTitle;
    }
    
}
// this fun to back page
function redirctHome($themsg, $url = null ,$sec = 3) { 
    if ($url === null){
       $url = "index.php";

    }else{
       if (isset($_SERVER["HTTP_REFERER"]) && $_SERVER['HTTP_REFERER'] !== '') {
           $url = $_SERVER['HTTP_REFERER'];

       }else{
           $url = 'index.php';
       }
    }

   echo  $themsg;
   echo "<div class='alert alert-info ms'>$sec</div>";
   header("refresh:$sec;url=$url");
   exit();
} 
// this fun to back page
function redirctlogin($themsg, $url = null ,$sec = 3) { 
    if ($url === null){
       $url = "login.php";

    }else{
       if (isset($_SERVER["HTTP_REFERER"]) && $_SERVER['HTTP_REFERER'] !== '') {
           $url = $_SERVER['HTTP_REFERER'];

       }else{
           $url = 'login.php';
       }
    }

   echo  $themsg;
   echo "<div class='alert alert-info ms'>$sec</div>";
   header("refresh:$sec;url=$url");
   exit();
} 
/*
** v.1.0.0
** count how many row in database
**item = the item to count  
**table= tabel of database select
*/ 
function countItmes($item, $table){
    global $con;
    $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");
    $stmt2->execute();
    return $stmt2->fetchColumn();
}
/*
** v.1.0.0
** getlatset records function
**$select = select fields from database
**$tabel = select tabale from dataabse 
**$limit = number of you get from database
*/ 


function getLatset($select, $tabel, $order,  $limit = 5){  
    global $con;
    $getSmtm = $con->prepare("SELECT $select FROM $tabel ORDER BY $order DESC LIMIT $limit ");
    $getSmtm->execute();
    $row = $getSmtm->fetchAll();
    return $row;
}


//aadm