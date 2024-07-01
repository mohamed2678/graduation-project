<?php  
  ob_start();
  session_start();
  include "init.php";
  // if (isset($_SESSION['username'])){
  //   header('location: login.php');
  //  } 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
      $user = $_POST['username'];
      $pass = $_POST['password'];
      $hashpass = sha1($pass);
          //check if this user exist In database 
    $stmt = $con->prepare("SELECT ID, username, password from userid where 
    username = ? and password = ? ");
    $stmt->execute(array($user, $hashpass));
    $get = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0 ){
        $_SESSION['username'] = $user;
        $_SESSION['id'] = $get['ID'];
        // redirctHome('', 'back', 1);
       header('location: index.php');
      exit();
      }
      else{
    $formErrors = array();
    $username = $_POST['username'];

        if (empty($formErrors)){
          //check this user exist in database
         $check =  selectItem("username", "userid", $user);
          if ($check == 0)  {
              $formErrors[] = '<h3>this user is not exist!</h3>'; 
        }
      }
    }
  }
  ?>
    <form class="loginf" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container login" id="login"> 
      <h1>Login</h1>
        <label class="form-input" for="uname"><b>Username</b></label>
        <input class="form-control" type="text" placeholder="Enter Username" name="username" required>
        <label class="form-input" for="psw"><b>Password</b></label>
        <input class="form-control" type="password" placeholder="Enter Password" name="password" required>
        <input type="submit" value="login"> 
        <span>or</span>
        <a href="./signUp.php">signUp</a>
        
    </div>
  </form>
  <?php 
        if (!empty($formErrors)){
            foreach($formErrors as $errors){
              echo '<div class="container">' ;
              echo '<div class="error-log">' ;
              echo '<p class="msg">' . $errors . '</p><br>';
              echo '</div>';
              echo '</div>';
            }
          }

              ?>
<?php
    include $tbl . "footer.php";
    ob_end_flush() ;
    ?>
