<?php 
ob_start();
session_start();
$result= ob_get_clean();
if(isset($_SESSION['username'])){
    include "init.php";
    // this for count total price of this deprtement
    
    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
    if ($do == 'Manage') {
      $stmt = $con->prepare("SELECT 
      places.nameofplaces AS Place, userid.username AS member, places.price AS amount, places.apartment AS aprtement   
      FROM places 
      INNER JOIN 
      userid
       ON 
      places.broker_id = userid.ID
      WHERE userid.TrustStatus = 2
        AND places.visability = 1
      ");
      $stmt->execute();
      $userC = $stmt->fetchAll();
      
      ?>
        <h1 class="p-relative">Apartment</h1>
        <span class="p-relative m-20"><?php if($userC['places.visability'] == 1){echo 'cairo'; }?></span>
        <div class="projects-page d-grid m-20 gap-20">
        

          <?php  foreach($userC as $c) { ?>
        
            
          <div class="project bg-white p-20 rad-6 p-relative">
            <span class="date fs-13 c-grey">15/10/2021</span>
            <h4 class="m-0"><?php echo $c['member'] ?></h4>
            <p class="c-grey mt-10 mb-10 fs-14">Elzero Dashboard Project Design And Programming And Hosting</p>
            <div class="team">
              <a href="#"><img src="./layOut/imgs/team-01.png" alt=""/></a>
            
            </div>
            <div class="do d-flex">
              <span class="fs-13 rad-6 bg-eee"><?php echo $c['Place'] ?></span>
            </div>
            <div class="info between-flex">
              
              <div class="fs-14 c-grey">
                <i class="fa-solid "></i>
                <?php echo "EGP" . $c['amount'] ?>
              </div>
            </div>
          </div>
          <?php }}?>
        </div>
        </div>
        
         
          
            
         <?php
    ob_end_flush() ;
    include $tbl . "footer.php";
    }
    else{
            header('location: index.php'); //-> tra to page is named index
            exit(); // run code
    } ?>
