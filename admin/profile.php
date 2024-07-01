<?php 
ob_start();
session_start();
include "init.php";
if (isset($_SESSION['username'])){
    $getUser = $con->prepare("SELECT * FROM userid WHERE username = ? ");
    $getUser->execute(array($sessionUser));
    $info = $getUser->fetch();
   
  ?>
  
  
        <h1 class="p-relative">Profile</h1>
        <div class="profile-page m-20">
          <!-- Start Overview -->
          <div class="overview bg-white rad-10 d-flex align-center">
            <div class="avatar-box txt-c p-20">
              <img class="rad-half mb-10" src="./layOut/imgs/avatar.png" alt="" />
              <h3 class="m-0"><?php echo $sessionUser ?></h3>
              
              <p class="c-grey mt-10"><?=$info['date'];?> </p>
              <div class="level rad-6 bg-eee p-relative">
                <span style="width: 70%"></span>
              </div>
              <div class="rating mt-10 mb-10">
                <i class="fa-solid fa-star c-orange fs-13"></i>
                <i class="fa-solid fa-star c-orange fs-13"></i>
                <i class="fa-solid fa-star c-orange fs-13"></i>
                <i class="fa-solid fa-star c-orange fs-13"></i>
                <i class="fa-solid fa-star c-orange fs-13"></i>
              </div>
              <!-- <p class="c-grey m-0 fs-13">550 Rating</p> -->
            </div>
            <div class="info-box w-full txt-c-mobile">
              <!-- Start Information Row -->
              <div class="box p-20 d-flex align-center">
                <h4 class="c-grey fs-15 m-0 w-full">General Information</h4>
                <div class="fs-14">
                  <span class="c-grey">Full Name</span>
                  <span><?php  echo  $info['FullName']; ?></span>
                  <span class="c-grey">.</span>
                  <span><?php  $info['ID']; ?></span>
                  <span class="c-grey">email</span>
                  <span><?php echo   $info['email'] ;?> </span>
                  <span class="c-grey">.phone</span>
                  <span><?php echo   $info['phone'] ;?> </span>
                </div>
              </div>
              <!-- End Information Row -->
            </div>
          </div>
          <!-- End Overview -->
          <!-- Start Other Data -->
          <div class="other-data d-flex gap-20">
            <div class="skills-card p-20 bg-white rad-10 mt-20">
              <h2 class="mt-0 mb-10">My Skills</h2>
              <p class="mt-0 mb-20 c-grey fs-15">Complete Skills List</p>
              <ul class="m-0 txt-c-mobile">
                <li><span>HTML</span><span>Pugjs</span><span>HAML</span></li>
                <li><span>CSS</span><span>SASS</span><span>Stylus</span></li>
                <li><span>JavaScript</span><span>TypeScript</span></li>
                <li><span>Vuejs</span><span>Reactjs</span></li>
                <li><span>Jest</span><span>Jasmine</span></li>
                <li><span>PHP</span><span>Laravel</span></li>
                <li><span>Python</span><span>Django</span></li>
              </ul>
            </div>
            <div class="activities p-20 bg-white rad-10 mt-20">
              <h2 class="mt-0 mb-10">Latest Activities</h2>
              <p class="mt-0 mb-20 c-grey fs-15">Latest Activities Done By The User</p>
              <div class="activity d-flex align-center txt-c-mobile">
                <img src="./layOut/imgs/activity-01.png" alt="" />
                <div class="info">
                  <span class="d-block mb-10">Store</span>
                  <span class="c-grey">Bought The Mastering Python Course</span>
                </div>
                <div class="date">
                  <span class="d-block mb-10">18:10</span>
                  <span class="c-grey">Yesterday</span>
                </div>
              </div>
              <div class="activity d-flex align-center txt-c-mobile">
                <img src="./layOut/imgs/activity-02.png" alt="" />
                <div class="info">
                  <span class="d-block mb-10">Academy</span>
                  <span class="c-grey">Got The PHP Certificate</span>
                </div>
                <div class="date">
                  <span class="d-block mb-10">16:05</span>
                  <span class="c-grey">Yesterday</span>
                </div>
              </div>
              <div class="activity d-flex align-center txt-c-mobile">
                <img src="./layOut/imgs/activity-03.png" alt="" />
                <div class="info">
                  <span class="d-block mb-10">Badges</span>
                  <span class="c-grey">Unlocked The 10 Skills Badge</span>
                </div>
                <div class="date">
                  <span class="d-block mb-10">18:05</span>
                  <span class="c-grey">Yesterday</span>
                </div>
              </div>
              <div class="activity d-flex align-center txt-c-mobile">
                <img src="./layOut/imgs/activity-01.png" alt="" />
                <div class="info">
                  <span class="d-block mb-10">Store</span>
                  <span class="c-grey">Bought The Typescript Course</span>
                </div>
                <div class="date">
                  <span class="d-block mb-10">12:05</span>
                  <span class="c-grey">Yesterday</span>
                </div>
              </div>
            </div>
          </div>
          <!-- End Other Data -->
        </div>
      </div>
    </div>
    <?php
    include $tbl . "footer.php";
    ob_end_flush() ;
    ?>
    <?php }else{
            header('location: index.php'); //-> tra to page is named index
            exit(); // run code
    } ?>
