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
** get categories function
**$select = select fields from database
**$tabel = select tabale from dataabse 
**$limit = number of you get from database
*/ 
function getItems($where, $value) {
    global $con;

    // List of allowed columns to prevent SQL injection
    $allowedColumns = [
        'reservation.P_id', 
        'reservation.U_id',
        'reservation.R_name',
        'reservation.pending',
        'places.p_id',
        'userid.ID'
        // Add other allowed column names with their respective tables here
    ];

    if (!in_array($where, $allowedColumns)) {
        throw new InvalidArgumentException('Invalid column name');
    }

    // Prepare the SQL statement
    $query = "SELECT reservation.*, places.nameofplaces AS place, P_date AS datee, userid.username AS admin 
              FROM reservation 
              INNER JOIN places ON places.p_id = reservation.P_id 
              INNER JOIN userid ON userid.ID = reservation.U_id 
              WHERE $where = ?";
    
    $getItems = $con->prepare($query);

    // Execute the query
    if ($getItems->execute(array($value))) {
        // Fetch all results
        $items = $getItems->fetchAll();
        return $items;
    } else {
        // Handle query execution error
        throw new Exception('Failed to execute query: ' . implode(' ', $getItems->errorInfo()));
    }
}
