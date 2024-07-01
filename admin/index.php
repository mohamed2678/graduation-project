<?php 
ob_start();
session_start();
?>
  <?php  
  if (isset($_SESSION['username'])){
    header('location: home.php');
  } 
  $noNavbar = true; 
  include "init.php";
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
        $_SESSION['iD'] = $get['id'];
      header('location: index.php');
      exit();
      }
      else{
    $formErrors = array();
    $username = $_POST['username'];
    $dub = $username;
      $dub = true;
      $password =['password'];
      $checkP = $password;
      $checkP = false;
    
  //     foreach($password as $value){
  //       if (!preg_match("/^[A-Za-z0-9]+$/", $value)) {
  //           $formErrors[] = "Password can only contain letters and numbers.";
  //           $checkP = false;
  //       }
  //     }
  //    if(!empty($username) && !$dub ) {
  //      $query = $dbh -> prepare("INSERT INTO `userid` (`username`) VALUES (:usn)");
  //      $query -> execute(['usn' => $username]);
  //      $lastId = $dbh -> lastInsertId();
  //      setcookie("ID", $lastId , time() + (3600), "/");
  //      $_COOKIE["ID"]= $lastId ;
  //    }
  //  }
    
        
  // setcookie("loggedIn", "yes" , time() + (86400 * 7), "/");

        if (empty($formErrors)){
          //check this user exist in database
         $check =  selectItem("username", "userid", $user);
          if ($check == 0)  {
              $formErrors[] = 'this user is not exist!'; 
        }
        if (isset($username) || empty($password)) {
          $formErrors[] = "Username or Password is missing!";
        }
          }
        }
      }
        
        // else{
        //       $pass = implode('', $password);
        //       if ($pass != $check[$username]['password']) {
        //           $formErrors[] = 'Wrong username or password';
        //       }
              
        // }
  ?>
  <div class="BS">
    <form class="sihi-in" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container card" id="login"> 
      
      <div class="row card-body justify-content-center align-items-center text-center">
        <img src="/images/logo.png" alt="" width="150px">
      <h1>Login</h1>
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <input class=".btn-login" type="submit" value="login">
      </div>
        
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
    </div>
        
  </form>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  </div>

<?php
    include $tbl . "footer.php";
    ob_end_flush() ;
      
    ?>
  </body>