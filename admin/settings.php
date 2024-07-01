<?php 
ob_start();
session_start();
$result= ob_get_clean();
if(isset($_SESSION['username'])){
    include "init.php";
	
?>
        <h1 class="p-relative">Settings</h1>
        <div class="settings-page m-20 d-grid gap-20">
          <!-- Start Settings Box -->
          <div class="p-20 bg-white rad-10">
            <h2 class="mt-0 mb-10">Site Control</h2>
            <p class="mt-0 mb-20 c-grey fs-15">Control The Website If There Is Maintenance</p>
            <div class="mb-15 between-flex">
              <div>
                <span>Website Control</span>
                <p class="c-grey mt-5 mb-0 fs-13">Open/Close Website And Type The Reason</p>
              </div>
              <div>
                <label>
                  <input class="toggle-checkbox" type="checkbox" checked />
                  <div class="toggle-switch"></div>
                </label>
              </div>
            </div>
            <textarea class="close-message p-10 rad-6 d-block w-full" placeholder="Close Message Content"></textarea>
          </div>
          <!-- End Settings Box -->
          <!-- Start Settings Box -->
          <div class="p-20 bg-white rad-10">
            <h2 class="mt-0 mb-10">General Info</h2>
            <p class="mt-0 mb-20 c-grey fs-15">General Information About Your Account</p>
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="first">First Name</label>
              <input
                class="b-none border-ccc p-10 rad-6 d-block w-full"
                type="text"
                id="first"
                placeholder="First Name"
              />
            </div>
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-5" for="last">Last Name</label>
              <input
                class="b-none border-ccc p-10 rad-6 d-block w-full"
                id="last"
                type="text"
                placeholder="Last Name"
              />
            </div>
            <div>
              <label class="fs-14 c-grey d-block mb-5" for="email">Email</label>
              <input
                class="email b-none border-ccc p-10 rad-6 w-full mr-10"
                id="email"
                type="email"
                value="o@nn.sa"
                disabled
              />
              <a class="c-blue" href="#">Change</a>
            </div>
          </div>
          <!-- End Settings Box -->
          <!-- Start Settings Box -->
          <div class="p-20 bg-white rad-10">
            <h2 class="mt-0 mb-10">Security Info</h2>
            <p class="mt-0 mb-20 c-grey fs-15">Security Information About Your Account</p>
            <div class="sec-box mb-15 between-flex">
              <div>
                <span>Password</span>
                <p class="c-grey mt-5 mb-0 fs-13">Last Change On 25/10/2021</p>
              </div>
              <a class="button bg-blue c-white btn-shape" href="change_pasword.php">Change</a>
            </div>
            <div class="sec-box mb-15 between-flex">
              <div>
                <span>Two-Factor Authentication</span>
                <p class="c-grey mt-5 mb-0 fs-13">Enable/Disable The Feature</p>
              </div>
              <label>
                <input class="toggle-checkbox" type="checkbox" checked />
                <div class="toggle-switch"></div>
              </label>
            </div>
            <div class="sec-box between-flex">
              <div>
                <span>Devices</span>
                <p class="c-grey mt-5 mb-0 fs-13">Check The Login Devices List</p>
              </div>
              <a class="bg-eee c-black btn-shape" href="#">Devices</a>
            </div>
          </div>
          <!-- End Settings Box -->
          <!-- Start Settings Box -->
          <div class="social-boxes p-20 bg-white rad-10">
            <h2 class="mt-0 mb-10">Social Info</h2>
            <p class="mt-0 mb-20 c-grey fs-15">Social Media Information</p>
            <div class="d-flex align-center mb-15">
              <i class="fa-brands fa-twitter center-flex c-grey"></i>
              <input class="w-full" type="text" placeholder="Twitter Username" />
            </div>
            <div class="d-flex align-center mb-15">
              <i class="fa-brands fa-facebook-f center-flex c-grey"></i>
              <input class="w-full" type="text" placeholder="Facebook Username" />
            </div>
            <div class="d-flex align-center mb-15">
              <i class="fa-brands fa-linkedin center-flex c-grey"></i>
              <input class="w-full" type="text" placeholder="Linkedin Username" />
            </div>
            <div class="d-flex align-center">
              <i class="fa-brands fa-youtube center-flex c-grey"></i>
              <input class="w-full" type="text" placeholder="Youtube Username" />
            </div>
          </div>
          <!-- End Settings Box -->

        </div>
      </div>
    </div>
  </body>
</html>
<?php
    include $tbl . "footer.php";
    ob_end_flush() ;
    ?>
    <?php }else{
            header('location: index.php'); //-> tra to page is named index
            exit(); // run code
    } ?>
