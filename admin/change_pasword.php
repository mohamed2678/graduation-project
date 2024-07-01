<?php 
ob_start();
session_start();
if (isset($_SESSION['username'])){
    include "init.php";
    $userid = $_SESSION['username'];
    // $userid =  isset($_GET['ID']) && is_numeric($_GET['ID']) ? intval($_GET['ID']) : 0;
    $stmt = $con->prepare("SELECT * from userid WHERE username = ? LIMIT 1");
    $stmt->execute(array($userid));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();         
    ?>
<h1 class="p-relative">your new password</h1>
        <div class="password-page m-20 d-grid gap-20">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                <div class="p-20 bg-white rad-10">
                <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="first">enter your New password</label>
              <input
              name="password"
                class="b-none border-ccc p-10 rad-6 d-block w-full"
                type="text"
                id="first"
                placeholder="old-password"
                value="<?php echo $row['Password'] ?>"
                disabled
              />
            </div>
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="first">enter your New password</label>
              <input
              name="password"
                class="b-none border-ccc p-10 rad-6 d-block w-full"
                type="text"
                id="first"
                placeholder="new-password"
                autocomplete="off"
              />
            </div>
            <div>
              <label class="fs-14 c-grey d-block mb-5" for="email">email </label>
              <input
                class="email b-none border-ccc p-10 rad-6 w-full mr-10"
                id="email"
                type="email"
                value="<?php echo $row ["email"]  ?> "
                disabled
              />
              <input type="submit" class="c-blue">
            </div>
          </div>
        </form>
          <!-- End Settings Box -->
        </div>
        <?php
    
        
    //get this varibales from form
    
    // trick of password 
    // $pass = '';
    //update password or  stay old password
    
    // update database with info 
    //    echo $id . '<br>' . $user . $email . $full; 
    $stmt = $con->prepare("UPDATE `userid` SET  `password` = ?, `email` = ? WHERE `userid`.`ID` =  ?;");
    $stmt->execute(array( $pass, $email ,$row['uid'] ));  
    
    //  sucsess message
    $themsg =  "<div class='alert alert-success'>" . $stmt->rowCount() . ' record update </div>';
    $email = $_POST['email'];
    //    redirctHome($themsg, 'back');
    $pass =  (empty($_POST['new-password'])) ? $_POST['old-password'] : sha1($_POST['new-password']);
  
    echo '</div>';
}
         ?>