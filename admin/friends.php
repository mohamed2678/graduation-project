<?php 
ob_start();
session_start();
$result= ob_get_clean();
if(isset($_SESSION['username'])){
    include "init.php";
?>
        <h1 class="p-relative">Friends</h1>
        <div class="friends-page d-grid m-20 gap-20">
          <div class="friend bg-white rad-6 p-20 p-relative">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="txt-c">
              <img class="rad-half mt-10 mb-10 w-100 h-100" src="./layOut/imgs/friend-01.jpg" alt="" />
              <h4 class="m-0">Ahmed Nasser</h4>
              <p class="c-grey fs-13 mt-5 mb-0">JavaScript Developer</p>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>99 Friend</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>15 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>25 Articles</span>
              </div>
              <span class="vip fw-bold c-orange">VIP</span>
            </div>
            <div class="info between-flex fs-13">
              <span class="c-grey">Joined 02/10/2021</span>
              <div>
                <a class="bg-blue c-white btn-shape" href="profile.php">Profile</a>
                <a class="bg-red c-white btn-shape" href="#">Remove</a>
              </div>
            </div>
          </div>
          <div class="friend bg-white rad-6 p-20 p-relative">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="txt-c">
              <img class="rad-half mt-10 mb-10 w-100 h-100" src="./layOut/imgs/friend-02.jpg" alt="" />
              <h4 class="m-0">Omar Fathy</h4>
              <p class="c-grey fs-13 mt-5 mb-0">Cloud Developer</p>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>30 Friends</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>11 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>12 Articles</span>
              </div>
            </div>
            <div class="info between-flex fs-13">
              <span class="c-grey">Joined 02/08/2020</span>
              <div>
                <a class="bg-blue c-white btn-shape" href="profile.php">Profile</a>
                <a class="bg-red c-white btn-shape" href="">Remove</a>
              </div>
            </div>
          </div>
          <div class="friend bg-white rad-6 p-20 p-relative">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="txt-c">
              <img class="rad-half mt-10 mb-10 w-100 h-100" src="./layOut/imgs/friend-03.jpg" alt="" />
              <h4 class="m-0">Omar Ahmed</h4>
              <p class="c-grey fs-13 mt-5 mb-0">Mobile Developer</p>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>80 Friends</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>20 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>18 Articles</span>
              </div>
            </div>
            <div class="info between-flex fs-13">
              <span class="c-grey">Joined 02/06/2020</span>
              <div>
                <a class="bg-blue c-white btn-shape" href="profile.php">Profile</a>
                <a class="bg-red c-white btn-shape" href="">Remove</a>
              </div>
            </div>
          </div>
          <div class="friend bg-white rad-6 p-20 p-relative">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="txt-c">
              <img class="rad-half mt-10 mb-10 w-100 h-100" src="./layOut/imgs/friend-04.jpg" alt="" />
              <h4 class="m-0">Shady Nabil</h4>
              <p class="c-grey fs-13 mt-5 mb-0">Back-End Developer</p>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>70 Friends</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>30 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>18 Articles</span>
              </div>
            </div>
            <div class="info between-flex fs-13">
              <span class="c-grey">Joined 28/06/2020</span>
              <div>
                <a class="bg-blue c-white btn-shape" href="profile.php">Profile</a>
                <a class="bg-red c-white btn-shape" href="">Remove</a>
              </div>
            </div>
          </div>
          <div class="friend bg-white rad-6 p-20 p-relative">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="txt-c">
              <img class="rad-half mt-10 mb-10 w-100 h-100" src="./layOut/imgs/friend-05.jpg" alt="" />
              <h4 class="m-0">Mohamed Ibrahim</h4>
              <p class="c-grey fs-13 mt-5 mb-0">Algorithm Developer</p>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>80 Friends</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>30 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>18 Articles</span>
              </div>
            </div>
            <div class="info between-flex fs-13">
              <span class="c-grey">Joined 28/08/2020</span>
              <div>
                <a class="bg-blue c-white btn-shape" href="profile.php">Profile</a>
                <a class="bg-red c-white btn-shape" href="">Remove</a>
              </div>
            </div>
          </div>
          <div class="friend bg-white rad-6 p-20 p-relative">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="txt-c">
              <img class="rad-half mt-10 mb-10 w-100 h-100" src="./layOut/imgs/friend-04.jpg" alt="" />
              <h4 class="m-0">Amr Hendawy</h4>
              <p class="c-grey fs-13 mt-5 mb-0">Back-End Developer</p>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>70 Friends</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>30 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>18 Articles</span>
              </div>
            </div>
            <div class="info between-flex fs-13">
              <span class="c-grey">Joined 28/06/2020</span>
              <div>
                <a class="bg-blue c-white btn-shape" href="profile.php">Profile</a>
                <a class="bg-red c-white btn-shape" href="">Remove</a>
              </div>
            </div>
          </div>
          <div class="friend bg-white rad-6 p-20 p-relative">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="txt-c">
              <img class="rad-half mt-10 mb-10 w-100 h-100" src="./layOut/imgs/friend-02.jpg" alt="" />
              <h4 class="m-0">Mahmoud Adel</h4>
              <p class="c-grey fs-13 mt-5 mb-0">Cloud Developer</p>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>30 Friends</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>11 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>12 Articles</span>
              </div>
            </div>
            <div class="info between-flex fs-13">
              <span class="c-grey">Joined 02/08/2020</span>
              <div>
                <a class="bg-blue c-white btn-shape" href="profile.php">Profile</a>
                <a class="bg-red c-white btn-shape" href="">Remove</a>
              </div>
            </div>
          </div>
          <div class="friend bg-white rad-6 p-20 p-relative">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="txt-c">
              <img class="rad-half mt-10 mb-10 w-100 h-100" src="./layOut/imgs/friend-05.jpg" alt="" />
              <h4 class="m-0">Ahmed Abuzaid</h4>
              <p class="c-grey fs-13 mt-5 mb-0">Content Creator</p>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>80 Friends</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>30 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>18 Articles</span>
              </div>
              <span class="vip fw-bold c-orange">Vip</span>
            </div>
            <div class="info between-flex fs-13">
              <span class="c-grey">Joined 28/08/2020</span>
              <div>
                <a class="bg-blue c-white btn-shape" href="profile.php">Profile</a>
                <a class="bg-red c-white btn-shape" href="">Remove</a>
              </div>
            </div>
          </div>
          <div class="friend bg-white rad-6 p-20 p-relative">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="txt-c">
              <img class="rad-half mt-10 mb-10 w-100 h-100" src="./layOut/imgs/friend-01.jpg" alt="" />
              <h4 class="m-0">Gareeb Elshiekh</h4>
              <p class="c-grey fs-13 mt-5 mb-0">JavaScript Developer</p>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>90 Friends</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>15 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>25 Articles</span>
              </div>
              <span class="vip fw-bold c-orange">Vip</span>
            </div>
            <div class="info between-flex fs-13">
              <span class="c-grey">Joined 02/10/2020</span>
              <div>
                <a class="bg-blue c-white btn-shape" href="profile.php">Profile</a>
                <a class="bg-red c-white btn-shape" href="">Remove</a>
              </div>
            </div>
          </div>
          <div class="friend bg-white rad-6 p-20 p-relative">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="txt-c">
              <img class="rad-half mt-10 mb-10 w-100 h-100" src="./layOut/imgs/friend-03.jpg" alt="" />
              <h4 class="m-0">Hamza</h4>
              <p class="c-grey fs-13 mt-5 mb-0">Front-End Developer</p>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>80 Friends</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>20 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>18 Articles</span>
              </div>
            </div>
            <div class="info between-flex fs-13">
              <span class="c-grey">Joined 02/06/2020</span>
              <div>
                <a class="bg-blue c-white btn-shape" href="profile.php">Profile</a>
                <a class="bg-red c-white btn-shape" href="">Remove</a>
              </div>
            </div>
          </div>
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
