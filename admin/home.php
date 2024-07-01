<?php 
ob_start();
session_start();


if(isset($_SESSION['username'])){
    include "init.php";
 
     if (isset($_SESSION['username'])){
        $getUser = $con->prepare("SELECT * FROM userid WHERE username = ? ");
        $getUser->execute(array($sessionUser));
        $info = $getUser->fetch();
        
?>
    <h1 class="p-relative andrw">Dashboard</h1>
    <div class="wrapper d-grid gap-20">
    <!-- Start Welcome Widget -->
    <div class="welcome bg-white rad-10 txt-c-mobile block-mobile">
    <div class="intro p-20 d-flex space-between bg-eee">
    <div>
    <h2 class="m-0">Welcome</h2>
    <p class="c-grey mt-5"><?=  $sessionUser ?></p>
    </div>
        <img class="hide-mobile" src="./layOut/imgs/welcome.png" alt="" />
    </div>
    <img src="./layOut/imgs/avatar.png" alt="" class="avatar" />
    <div class="body txt-c d-flex p-20 mt-20 mb-20 block-mobile">
    <div><?= $info["FullName"] ?><span class="d-block c-grey fs-14 mt-10">Developer</span></div>
    <div><?php if ($info['rageStatus'] == 1){?><span class="d-block c-grey fs-14 mt-10"><?php echo "Admin"; } ?></span></div>
    <div>+20<?php echo $info['phone'] ?><span class="d-block c-grey fs-14 mt-10">Phone</span></div>
</div>
<a href="profile.php" class="visit d-block fs-14 bg-blue c-white w-fit btn-shape">Profile</a>
</div>
<!-- End Welcome Widget -->
<!-- Start Add your Comment Widget -->
<div class="quick-draft p-20 bg-white rad-10">
<h2 class="mt-0 mb-10">massage</h2>
<p class="mt-0 mb-20 c-grey fs-15">Comment to other admin</p>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <!-- <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" placeholder="Title" /> -->
    <textarea class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="comment" placeholder="Your Thought"></textarea>
    <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="send" />
</form>
</div>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $comment = $_POST['comment'];

        // Check if the comment exists in the session, which means it has already been added
        if (isset($_SESSION['last_added_comment']) && $_SESSION['last_added_comment'] == $comment) {
            // A match was found in the session, preventing duplicate comment insertion
            echo '<div class="alert alert-warning">This comment has already been added.</div>';
        } else {
            // The comment is new, proceed with adding it to the database
            // $itemid = $info[Null];
            $userid = $info['ID'];

            if (!empty($comment)) {
                $stmt = $con->prepare("INSERT INTO `comment` (`comment`, `status`, `comment_date`, `user_id`) VALUES (:zcomment, 0, now(), :zuserid)");
                $stmt->execute(array(
                    'zcomment' => $comment,
                    'zuserid' => $userid
                ));

                if ($stmt) {
                                // Store the added comment in the session to prevent duplicates
                $_SESSION['last_added_comment'] = $comment;

                // Redirect the user or refresh the page
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
                }
            }
        }
    }
?>
<!-- End Add your Comment Widget -->
<!-- Start Targets Widget -->
<div class="targets p-20 bg-white rad-10">
<h2 class="mt-0 mb-10">Yearly Targets</h2>
<p class="mt-0 mb-20 c-grey fs-15">Targets Of The Year</p>
<div class="target-row mb-20 blue center-flex">
    <div class="icon center-flex">
    <i class="fa-solid fa-dollar-sign fa-lg c-blue"></i>
    </div>
    <div class="details">
    <span class="fs-14 c-grey">Money</span>
    <span class="d-block mt-5 mb-10 fw-bold">$20.000</span>
    <div class="progress p-relative">
        <span class="bg-blue blue" style="width: 80%">
        <span class="bg-blue">80%</span>
        </span>
    </div>
    </div>
</div>
<div class="target-row mb-20 center-flex orange">
    <div class="icon center-flex">
    <i class="fa-solid fa-code fa-lg c-orange"></i>
    </div>
    <div class="details">
    <span class="fs-14 c-grey">Projects</span>
    <span class="d-block mt-5 mb-10 fw-bold">24</span>
    <div class="progress p-relative">
        <span class="bg-orange orange" style="width: 55%">
        <span class="bg-orange">55%</span>
        </span>
    </div>
    </div>
</div>
<div class="target-row mb-20 center-flex green">
    <div class="icon center-flex">
    <i class="fa-solid fa-user fa-lg c-green"></i>
    </div>
    <div class="details">
    <span class="fs-14 c-grey">Team</span>
    <span class="d-block mt-5 mb-10 fw-bold">12</span>
    <div class="progress p-relative">
        <span class="bg-green green" style="width: 75%">
        <span class="bg-green">75%</span>
        </span>
    </div>
    </div>
</div>
</div>
<!-- End Targets Widget -->
<!-- Start Ticket Widget -->
<div class="tickets p-20 bg-white rad-10">
<h2 class="mt-0 mb-10">Tickets Statistics</h2>
<p class="mt-0 mb-20 c-grey fs-15">Everything About Support Tickets</p>
<div class="d-flex txt-c gap-20 f-wrap">
    <div class="box p-20 rad-10 fs-13 c-grey">
    <i class="fa-regular fa-rectangle-list fa-2x mb-10 c-orange"></i>
    <span class="d-block c-black fw-bold fs-25 mb-5"><?php echo countItmes('ID','userid'); ?></span>
    Total
    </div>
    <div class="box p-20 rad-10 fs-13 c-grey">
    <i class="fa-solid fa-spinner fa-2x mb-10 c-blue"></i>
    <span class="d-block c-black fw-bold fs-25 mb-5"><?php echo selectItem('rageStatus', 'userid', 0); ?></span>
    Pending members
    </div>
    <div class="box p-20 rad-10 fs-13 c-grey">
    <i class="fa-regular fa-circle-check fa-2x mb-10 c-green"></i>
    <span class="d-block c-black fw-bold fs-25 mb-5"><?php echo countItmes('c_id', 'comment')?></span>
    comment
    </div>
    <div class="box p-20 rad-10 fs-13 c-grey">
    <i class="fa-regular fa-rectangle-xmark fa-2x mb-10 c-red"></i>
    <span class="d-block c-black fw-bold fs-25 mb-5">100</span>
    Deleted
    </div>
</div>
</div>
<!-- End Ticket Widget -->
<!-- Start Latest News Widget -->
<div class="latest-news p-20 bg-white rad-10 txt-c-mobile">
<h2 class="mt-0 mb-20">Latest News</h2>
<div class="news-row d-flex align-center">
    <img src="./layOut/imgs/news-01.png" alt="" />
    <div class="info">
    <h3>Created SASS Section</h3>
    <p class="m-0 fs-14 c-grey">New SASS Examples & Tutorials</p>
    </div>
    <div class="btn-shape bg-eee fs-13 label">3 Days Ago</div>
</div>
<div class="news-row d-flex align-center">
    <img src="./layOut/imgs/news-02.png" alt="" />
    <div class="info">
    <h3>Changed The Design</h3>
    <p class="m-0 fs-14 c-grey">A Brand New Website Design</p>
    </div>
    <div class="btn-shape bg-eee fs-13 label">5 Days Ago</div>
</div>
<div class="news-row d-flex align-center">
    <img src="./layOut/imgs/news-03.png" alt="" />
    <div class="info">
    <h3>Team Increased</h3>
    <p class="m-0 fs-14 c-grey">3 Developers Joined The Team</p>
    </div>
    <div class="btn-shape bg-eee fs-13 label">7 Days Ago</div>
</div>
<div class="news-row d-flex align-center">
    <img src="./layOut/imgs/news-04.png" alt="" />
    <div class="info">
    <h3>Added Payment Gateway</h3>
    <p class="m-0 fs-14 c-grey">Many New Payment Gateways Added</p>
    </div>
    <div class="btn-shape bg-eee fs-13 label">9 Days Ago</div>
</div>
</div>
<!-- End Latest News Widget -->
<!-- Start Tasks Widget -->
<div class="tasks p-20 bg-white rad-10">
<h2 class="mt-0 mb-20">Latest Tasks</h2>
<div class="task-row between-flex">
    <div class="info">
    <h3 class="mt-0 mb-5 fs-15">Record One New Video</h3>
    <p class="m-0 c-grey">Record Python Create Exe Project</p>
    </div>
    <i class="fa-regular fa-trash-can delete"></i>
</div>
<div class="task-row between-flex">
    <div class="info">
    <h3 class="mt-0 mb-5 fs-15">Write Article</h3>
    <p class="m-0 c-grey">Write Low Level vs High Level Languages</p>
    </div>
    <i class="fa-regular fa-trash-can delete"></i>
</div>
<div class="task-row between-flex">
    <div class="info">
    <h3 class="mt-0 mb-5 fs-15">Finish Project</h3>
    <p class="m-0 c-grey">Publish Academy Programming Project</p>
    </div>
    <i class="fa-regular fa-trash-can delete"></i>
</div>
<div class="task-row between-flex done">
    <div class="info">
    <h3 class="mt-0 mb-5 fs-15">Attend The Meeting</h3>
    <p class="m-0 c-grey">Attend The Project Business Analysis Meeting</p>
    </div>
    <i class="fa-regular fa-trash-can delete"></i>
</div>
<div class="task-row between-flex">
    <div class="info">
    <h3 class="mt-0 mb-5 fs-15">Finish Lesson</h3>
    <p class="m-0 c-grey">Finish Teaching Flex Box</p>
    </div>
    <i class="fa-regular fa-trash-can delete"></i>
</div>
</div>
<!-- End Tasks -->
<!-- Start Top Search Word Widget -->
<div class="search-items p-20 bg-white rad-10">
<h2 class="mt-0 mb-20">Top Search Items</h2>
<div class="items-head d-flex space-between c-grey mb-10">
    <div>Keyword</div>
    <div>Search Count</div>
</div>
<div class="items d-flex space-between pt-15 pb-15">
    <span>Programming</span>
    <span class="bg-eee fs-13 btn-shape">220</span>
</div>
<div class="items d-flex space-between pt-15 pb-15">
    <span>JavaScript</span>
    <span class="bg-eee btn-shape fs-13">180</span>
</div>
<div class="items d-flex space-between pt-15 pb-15">
    <span>PHP</span>
    <span class="bg-eee btn-shape fs-13">160</span>
</div>
<div class="items d-flex space-between pt-15 pb-15">
    <span>Code</span>
    <span class="bg-eee btn-shape fs-13">145</span>
</div>
<div class="items d-flex space-between pt-15 pb-15">
    <span>Design</span>
    <span class="bg-eee btn-shape fs-13">110</span>
</div>
<div class="items d-flex space-between pt-15 pb-15">
    <span>Logic</span>
    <span class="bg-eee btn-shape fs-13">95</span>
</div>
</div>
<!-- End Top Search Word Widget -->
<!-- Start Latest Uploads Widget -->
<?php  $news = 5 ?>
<div class="latest-uploads p-20 bg-white rad-10">
<h2 class="mt-0 mb-20">Latest Uploads (<?php echo $news ?>)</h2>
<ul class="m-0">
    <?php $numOfUser = getLatset("*", "userid", "ID", $news);
            foreach ($numOfUser as $newMambers){
    ?>
    <li class="between-flex pb-10 mb-10">
    <div class="d-flex align-center">
        <img class="mr-10" src="./layOut/imgs/avatar.png" alt="" />
        <div>
        <span class="d-block"><?php  echo $newMambers ["username"] ; ?></span>
        <span class="fs-15 c-grey"><?php  echo $newMambers ["FullName"] ; ?></span>
    </div>
</div>
<div class="bg-eee btn-shape fs-13"><?php  echo $newMambers ["date"] ; ?></div>

<?php } ?>
    </li> 
</ul>
</div>
<!-- End Latest Uploads Widget -->
<!-- Start Last Project Progress Widget -->
<div class="last-project p-20 bg-white rad-10 p-relative">
<h2 class="mt-0 mb-20">Last Project Progress</h2>
<ul class="m-0 p-relative">
    <li class="mt-25 d-flex align-center done">Got The Project</li>
    <li class="mt-25 d-flex align-center done">Started The Project</li>
    <li class="mt-25 d-flex align-center done">The Project About To Finish</li>
    <li class="mt-25 d-flex align-center current">Test The Project</li>
    <li class="mt-25 d-flex align-center">Finish The Project & Get Money</li>
</ul>
<img class="launch-icon hide-mobile" src="./layOut/imgs/project.png" alt="" />
</div>
<!-- End Last Project Progress Widget -->
<!-- Start Reminders Widget -->

<?php
            $stmt = $con->prepare("SELECT comment.*,  userid.username AS member 
            FROM
            comment
            INNER JOIN 
            userid
            ON
            userid.ID = comment.user_id
            ORDER BY 
            c_id
            ");
                //execute the statement
                $stmt->execute(array());
                //assign to variable
                $comment = $stmt->fetchAll();
                ?>
<div class="reminders p-20 bg-white rad-10 p-relative">
    <h2 class="mt-0 mb-25">comment from other Admin</h2>
                    <?php
    foreach ($comment as $com){
?>
<ul class="m-0">
    <li class="d-flex align-center mt-15">
        <span class="key bg-blue mr-15 d-block rad-half"></span>
        <div class="pl-15 blue">
            <p class="fs-14 fw-bold mt-0 mb-5"><?= $com['comment'] ?></p>
            <a href="" style="color:black;">
                <i class="fa-regular fa-trash-can delete"></i>
            </a>
<span class="fs-13 c-grey"><?= $com['comment_date'] ?> - 12:00am</span>
<span class="fs-13 c-grey">from: <?= $com['member'] ?></span>
</div>

</li>
<?php  } ?>
    
</ul>
</div>
<!-- End Reminders Widget -->
<!-- Start Latest Post Widget -->
                <!-- <div class="latest-post p-20 bg-white rad-10 p-relative">
                <h2 class="mt-0 mb-25">Latest Post</h2>
                <div class="top d-flex align-center">
                    <img class="avatar mr-15" src="./layOut/imgs/avatar.png" alt="" />
                    <div class="info">
                    <span class="d-block mb-5 fw-bold">mohaamed mostaf</span>
                    <span class="c-grey">About 3 Hours Ago</span>
                    </div>
                </div>
                <div class="post-content txt-c-mobile pt-20 pb-20 mt-20 mb-20">
                    You can fool all of the people some of the time, and some of the people all of the time, but you can't
                    fool all of the people all of the time.
                </div>
                <div class="post-stats between-flex c-grey">
                    <div>
                    <i class="fa-regular fa-heart"></i>
                    <span>1.8K</span>
                    </div>
                    <div>
                    <i class="fa-regular fa-comments"></i>
                    <span>500</span>
                    </div>
                </div>
                </div> -->
<!-- End Latest Post Widget -->
<!-- Start Social Media Stats Widget -->
                <!-- <div class="social-media p-20 bg-white rad-10 p-relative">
                <h2 class="mt-0 mb-25">Social Media Stats</h2>
                <div class="box twitter p-15 p-relative mb-10 between-flex">
                    <i class="fa-brands fa-twitter fa-2x c-white h-full center-flex"></i>
                    <span>90K Followers</span>
                    <a class="fs-13 c-white btn-shape" href="#">Follow</a>
                </div>
                <div class="box facebook p-15 p-relative mb-10 between-flex">
                    <i class="fa-brands fa-facebook-f fa-2x c-white h-full center-flex"></i>
                    <span>2M Like</span>
                    <a class="fs-13 c-white btn-shape" href="#">Like</a>
                </div>
                <div class="box youtube p-15 p-relative mb-10 between-flex">
                    <i class="fa-brands fa-youtube fa-2x c-white h-full center-flex"></i>
                    <span>1M Subs</span>
                    <a class="fs-13 c-white btn-shape" href="#">Subscribe</a>
                </div>
                <div class="box linkedin p-15 p-relative mb-10 between-flex">
                    <i class="fa-brands fa-linkedin fa-2x c-white h-full center-flex"></i>
                    <span>70K Followers</span>
                    <a class="fs-13 c-white btn-shape" href="#">Follow</a>
                </div>
                </div> -->
<!-- Start End Media Stats Widget -->
</div>
<!-- Start Projects Table -->
<div class="projects p-20 bg-white rad-10 m-20">
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
</div>
<!-- End Projects Table -->
</div>
</div>
<?php
    include $tbl . "footer.php";
    ob_end_flush() ;
    ?>
    <?php }}else{
            header('location: index.php'); //-> tra to page is named index
            exit(); // run code
    } ?>
