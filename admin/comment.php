<?php
ob_start();
session_start();
 if (isset($_SESSION['username'])){ // if user name is available 
// $pageTitle = 'comments'; // name title of page 
include 'init.php'; // transaction to initshlais option 
//<!-- start categories Page  -->
$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

//

if ($do == 'Manage') {

    
    if (isset($_GET['page']) && $_GET['page'] == 'pending' ) {
        
    }
    // select all users except admin 
    $stmt = $con->prepare("SELECT comment.*, places.nameofplaces AS place_name, userid.username AS member
                        FROM
                        comment
                        INNER JOIN 
                        places
                        ON 
                        places.p_id  = comment.places_id 
                        INNER JOIN 
                        userid
                        ON
                        userid.ID = comment.user_id ");

    $stmt->execute();
    $cID = $stmt->fetchAll();
    ?>

<!-- <div class="projects p-20 bg-white rad-10 m-20">
<h2 class="mt-0 mb-20">Projects</h2>
<div class="responsive-table">
<table class="fs-15 w-full">
    <thead>
    <tr>
        <td>Name</td>
        <td>Finish Date</td>
        <td>Client</td>
        <td>Price</td>
        <td>Team</td>
        <td>Status</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Ministry Wikipedia</td>
        <td>10 May 2022</td>
        <td>Ministry</td>
        <td>$5300</td>
        <td>
        <img src="./layOut/imgs/team-01.png" alt="" />
        <img src="./layOut/imgs/team-02.png" alt="" />
        <img src="./layOut/imgs/team-03.png" alt="" />
        <img src="./layOut/imgs/team-05.png" alt="" />
        </td>
        <td>
        <span class="label btn-shape bg-orange c-white">Pending</span>
        </td>
    </tr>
    </tbody>
</table>
</div>
</div> -->

    <div class="projects p-20 bg-white rad-10 m-20">
        <h2 class="mt-0 mb-20">comments</h2>
            <div class="responsive-table">
                <table class="fs-15 w-full">
                <tr>
                    
                    <th>ID</th>
                    <th>comment</th>
                    <th>username</th>
                    <th>place</th>
                    <th>registerd date</th>
                    <th>control</th>
                </tr>
                <?php foreach($cID as $c){
                    echo '<tr>';
                    echo '<td>' . $c["c_id"]   .'</td>'; 
                    echo '<td>' . $c["comment"] .'</td>'; 
                    echo '<td>' . $c["member"] .   '</td>'; 
                    echo '<td>' . $c["place_name"]   .   '</td>'; 
                    echo '<td>' . $c["comment_date"] .   '</td>'; 
                    echo '<td><a class="btn btn-success" href="comment.php?do=edit&cID='. $c['c_id'] . '">Edit</a>
                        <a class="btn btn-danger confirm btn-pen" href="comment.php?do=delete&cID='. $c['c_id'] . '">delete</a> ';
                        if ($c['status'] == 0){
                            echo '<a class="btn btn-info btn-pen" href="comment.php?do=Activate&cID='. $c['c_id'] . '">Approve</a>';
                                
                                }
                        '</td>';
                    echo '</tr>';
                    }?>
            </table>
                </div>
            </div>
            
            <?php
}
elseif ($do == 'edit') {
    // this to sure the ID is number not key
    $cID =  isset($_GET['cID']) && is_numeric($_GET['cID']) ? intval($_GET['cID']) : 0;
    $stmt = $con->prepare("SELECT * from comment WHERE c_id = ? ");
    // $check = selectItem('*', 'users', 'userID');
    // echo $check;
    // change value of data to one method
    $stmt->execute(array($cID));
    $cID = $stmt->fetch();
    $count = $stmt->rowCount();        
    if ($count  > 0) { 
                ?>
                <h1 class="text-center">Edit Comment</h1>
                <div class="container edit-pro">
                    <form class="form-horizontal add form-control" action="?do=update" method="POST">
                        <input type="hidden" name="cID" value="<?php echo $cID['c_id']?>">
                            <!-- strat name field -->
        <div class="input-group mb-3">
            <span class="input-group-text">@</span>
        <div class="form-floating">
    <textarea type="text" class="form-control" name="comment" id="comment"  placeholder="Name of the categories" required="required"><?php echo $cID['comment']; ?></textarea>
            <label for="Name">Comment</label>
                </div>
                    </div>
                            <!-- strat name end-->
                    </select>
                        <!--  categories end-->
                                <!-- strat button field -->
                                <div class="form-group">
                        <div class="col-sm-offset-10 col-sm-10">
                            <input type="submit" value="save your edit" class="btn btn-success sub">
                            </div>
                        </div>
                    <!-- strat button end-->
                    </form>
            </div>
 <?php   
    }
}
elseif ($do == 'update') {
    echo   '<h1 class="text-center">Update Comment</h1>';
    echo   '<div class="container">';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       //get this varibales from form
       $cID =    $_POST['cID'];
       $comment  =  $_POST['comment'];
            // update database with info 
            
            $stmt = $con->prepare("UPDATE `comment` SET `comment` = ? WHERE `comment`.`c_id` = ?;");
            $stmt->execute(array ($comment, $cID));
            //  sucsess message
            $themsg =  "<div class='alert alert-success'>" . $stmt->rowCount() . ' record update </div>';
            redirctHome($themsg, 'back', .5);
echo '</div>';

   }

}
elseif ($do == 'delete') {
    $cID =  isset($_GET['cID']) && is_numeric($_GET['cID']) ? intval($_GET['cID']) : 0;
    // select all data on database
    $check = selectItem('c_id', 'comment', $cID);        
    if($check > 0) {
        $stmt = $con->prepare("DELETE FROM comment WHERE c_id = :zid");
        $stmt->bindParam(':zid', $cID);
        $stmt->execute();
        echo  '<div class="container">';
        $themsg =  "<div class='alert alert-success'>" . $stmt->rowCount() . ' record delete </div>';
        redirctHome($themsg, 'back', .5);
        echo '</div>';


    }
    else {
        echo  '<div class="container">';
        $themsg = '<h1 class="text-cneter">please don`t enter this page dircte</h1>';
        redirctHome($themsg,'back', 3);
    }
    echo '</div>';
}
elseif ($do == 'Activate') {    
                echo "<h1 class='text-center'>approve comment</h1>";
                echo "<div class='container'>";
                //check if this id is number not any string
                $cID =  isset($_GET['cID']) && is_numeric($_GET['cID']) ? intval($_GET['cID']) : 0;
                // select all data on database
                $check = selectItem('c_id', 'comment', $cID);        
                if($check > 0) {
                    $stmt = $con->prepare("UPDATE comment SET status = 1 WHERE c_id = ?");
                    $stmt->execute(array($cID));
                    $themsg =  "<div class='alert alert-success'>" . $stmt->rowCount() . ' record activation </div>';
                    redirctHome($themsg, 'back', .5);
                    echo '</div>';
                }
        else {
            
            redirctHome($themsg);
            $themsg = "error";
        }
    }

?>
<?php
include $tbl . 'footer.php'; // ->  footer page
 }else // is not
{
    header('location: index.php'); //-> tra to page is named index
    exit(); // run code
}


