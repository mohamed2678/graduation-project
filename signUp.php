<?php  
  ob_start();
  session_start();
  include "init.php";
  ?>
            <div class="container signup">
                <form class="form-horizontal add form-control" action="?do=insert" method="post"  enctype="multipart/form-data">

                    <!-- strat username field -->
                    <div class="input-group mb-3">
                        <!-- <span class="input-group-text">@</span> -->
                        <div class="form-floating">
    <h1 class="signUp">SignUp</h1>
    <label class="form-input" for="form-input">Username</label>
    <input type="text" class="form-control" name="username" id="floatingInputGroup1"  placeholder="Username" autocomplete="off" required="required">
            </div>
                </div>
                        <!-- strat username end-->
     <!-- strat password field -->
      <div class="form-floating mb-3">
          <label class="form-input" for="floatingPassword">Password</label>
        <input type="password" class="password form-control" name="password" id="floatingPassword" placeholder="Password" autocomplete="new-password" required="required" >
        <!-- <input type="checkbox" class="show-pass"> -->
                        </div>
          <!-- end password end-->
            <!-- strat email field -->
        <div class="form-floating mb-3">
            <label class="form-input" for="floatingPassword">email</label>
      <input type="email" class="form-control" name="email" id="floatingPassword"  placeholder="email" required="required">
            </div>
                <!--  email end-->
                <!-- start address  -->
                <div class="form-floating mb-3">
                    <label class="form-input" for="floatingPassword">address</label>
      <input type="text" class="form-control" name="address" id="floatingPassword"  placeholder="address" required="required">
            </div>
                <!-- end address  -->
                <!-- start phone -->
                <div class="form-floating mb-3">
                    <label class="form-input" for="floatingPassword">Phone</label>
      <input type="phone" class="form-control" name="phone" id="floatingPassword"  placeholder="Phone" required="required">
            </div>
                <!-- end phone -->
              <!-- strat fullname field -->
                <div class="form-floating mb-3">
                    <label class="form-input" for="floatingPassword">full name</label>
        <input type="text" class="form-control" name="fullname" id="floatingPassword"  placeholder="full name" required="required">
            </div>
                        <!--  fullname end-->
                           <!-- strat upload avatar field -->
                <div class="form-floating mb-3">
            <label class="form-input" for="floatingPassword">upload photo</label>
        <input type="file" name="avatar" class="upload" required="required">
            </div>
                        <!-- end upload avatar -->
                                    <!-- strat button field -->
                                    <div class="form-group">
                            <div class="col-sm-offset-10 col-sm-10">
                                <input type="submit" value="Create" class="btn btn-success sub">
                                <span>or</span>
                                <a href="./login.php">LogIn</a>
                                </div>
                            </div>
                        <!-- strat button end-->
                        </form>
                </div>

                <?php   
         if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $avatarName = $_FILES['avatar']['name'];
            $avatarSize = $_FILES['avatar']['size'];
            $avatarTmp = $_FILES['avatar']['tmp_name'];
            $avatarType = $_FILES['avatar']['type'];
            // list of allowed file typed to upload
            $avatarAllowedExtension = array('jpeg', 'jpg', 'png', 'gif');
            // get avatar extension
            $avatarExtension = strtolower(end(explode('.', $avatarName)));
            
        //get this varibales from form

        
        $user  =  $_POST['username'];
        $pass  =  $_POST['password']; 
        $email =  $_POST['email'];
        $addres = $_POST['address'];
        $mobil = $_POST['phone'];
        $full  =  $_POST['fullname'];
        $hashpass = sha1($_POST['password']);
        //update database with this info
        // validate this form 
        $formerror = array();
        if (strlen($user) < 4) {
            $formerror[] =  'user cant be less than 4 <strong>character</strong>';
        }if (strlen($user) > 20){
            $formerror[] =  'user cant be letter than 20 <strong>chrarcter</strong>';
        }
        if (empty($user)){ 
            $formerror[] =  'cant be user is<strong> empty </strong>';
        }if (empty($email)){
            $formerror[] =  'cant be email is <strong> empty </strong>';
        }if (empty($full)){
            $formerror[] =  'cant be full name is <strong> empty </strong>';
        } 
        if(! empty($avatarName) && !in_array($avatarExtension, $avatarAllowedExtension)){
            echo "<div class='alert alert-danger'>this extension is not allowed</div>";
        }
        if(empty($avatarName)){
            $formerror[] = 'avatar is <strong> empty </strong>';
        }
        if($avatarSize > 4194304){
            $formerror[] = 'avatar can`t be larger than <strong> 4MB </strong>';
        }
        foreach ($formerror as $Error) {
               echo  '<div class="alert alert-danger">'  .  $Error  . "</div>";
        }
        //check if there's no error proceed the update operation 
        if (empty($formerror)){
            //check this user exist in database
         $check =  selectItem("username", "userid", $user);
        }
        $avatar = rand(0,100000000) . '_' . $avatarName;
        move_uploaded_file($avatarTmp, "uploads\avatar\\" . $avatar);
        if ($check == 1){
            $themsg ='
            <div class="errJob">
            <div class="alert alert-danger">sorry this username already exist!
            </div>
            </div>';
            echo $themsg;
            //  redirctHome($themsg, 'back');
            //  $sec = '<div class="ms"></div>';
             }
        else{
                        // insert new user in database
                        // echo $id . '<br>' . $user . $email . $full; //test only
                $stmt = $con->prepare("INSERT INTO userid(username, password, email, address, phone, FullName, rageStatus, date, avatar)
                    VALUES (:zuser, :zpass, :zmail,:zadd ,:zpho ,:zname, 0, now(), :zavatar)");
                $stmt->execute(array(
                "zuser" => $user,
                "zpass" => $hashpass,
                "zmail" => $email,
                "zadd" => $addres,
                "zpho" => $mobil,
                "zname" => $full,
                "zavatar" => $avatar
            ));
            header('Location: index.php');
            exit();
            }
        }
        ?>
        <?php
    include $tbl . "footer.php";
    ob_end_flush() ;
    ?>