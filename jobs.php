<?php  
  ob_start();
  session_start();
  include "init.php";
  if(isset($_SESSION['username'])){
    $getUser = $con->prepare("SELECT * FROM userid WHERE username =?");
    $getUser->execute(array($sessionUser));
    $info = $getUser->fetch();
    $ID = $info['ID'];
?>

<div class="container">
  <div class="job">
    <div class="job-header">
      <h1 class="job-title">Job Page</h1>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="myForm" class="job-form">
        <input type="number"  name="user" id="user" value=<?php echo $ID?> hidden>
        <div class="job-select">
          <select name="jopName" id="jopName" class="job-select-box">
            <option selected></option>
            <option value="call center">Call Center</option>
            <option value="delivery">Delivery</option>
            <option value="designer">Customer Service</option>
            <option value="account manager">account manager</option>
          </select>
        </div>
        <div class="job-select">
          <select name="POJ" id="POJ" class="job-select-box">
            <?php 
              $stmt = $con->prepare("SELECT * FROM places WHERE visability = 2");
              $stmt->execute();
              $apartments = $stmt->fetchAll();
              foreach ($apartments as $apartment){
            ?>
            <option value="<?php echo $apartment['p_id']?>"><?php echo $apartment['nameofplaces']?></option>
            <?php }?>
          </select>
        </div>
        <input type="submit" value="Send" class="job-submit-btn">
      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="job-details-container">
    <h3 id="jobTitle" class="job-details-title">Job Details</h3>
    <div class="job-details" id="jobDetails">
      <h3 class="job-details-subtitle">About Job</h3>
      <p id="jobDesc" class="job-details-desc">Job Description</p>
    </div>
  </div>
  <hr class="job-details-hr">
</div>

<?php 
  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $user = $_POST['user'];
    $jopN = $_POST['jopName'];
    $place = $_POST['POJ'];
    // Add the new reservation
    $stmt = $con->prepare("INSERT INTO `job`(`job_name`, `job_salary`,date_j ,`requests_id`,`id_user`, `job_places`)
                           VALUES (:zjopName, 6000, now(), 1, :zuser, :zPOJ)");
    $stmt->execute(array(
      ':zjopName' => $jopN,
      ':zuser' => $user,
      ':zPOJ' => $place
    ));
    header('Location: jobs.php');
    exit();
  }
}else{
  echo "<div class='errAll'>";
  echo '<p class="NS">You must be logged in to access this page. Please <a href="login.php">log in</a> or <a href="signup.php">sign up</a>.</p>';
  echo "</div>";
}
include $tbl . "footer.php";
ob_end_flush();
?>
