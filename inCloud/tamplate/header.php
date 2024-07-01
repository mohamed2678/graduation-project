<?php 
ob_start()

?>
<!DOCTYPE html>
<meta charset="utf-8">
<html>
    <head>
    <title><?php getTitle()?></title>
        <link rel="stylesheet" href="<?php echo $css ?>/all.min.css"> 
        <link rel="stylesheet" href="<?php echo $css ?> /master.css">
        <link rel="stylesheet" href="<?php echo $css ?> /normaliz.css">
        <link rel="stylesheet" href="<?php echo $css ?> /framework.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>                          
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link rel="Website icon" href="<?php echo $css ?> /ac.png"  type="png">
    </head>
    <body>
    <div class="seting-box">
        <div class="toggle-setting">
            <i class="fa fa-gear"></i>
        </div>
        <div class="contanier-box">
            <div class="option-box">
                <h4>Color</h4>
                <ul  class="color-list">
                    <li class="active" data-color="#393e4f"></li>
                    <li data-color="#E91E64"></li>
                    <li data-color="#c47e28"></li>
                    <li  data-color="#9D56CA"></li>
                    <li data-color="#000000"></li>
                </ul>
            </div>
            <div class="option-box">
                <h4>Random background</h4>
                <div class="random-background">
                    <span class="yes active" data-background="yes">yes</span>
                    <span class="no" data-background="no">no</span>
                </div>
            </div>
        </div>
    </div>
    <!-- end setting box -->
    <div class="container header">
        <header class="">
        <div class="header-area">
            <a href='http://localhost/elmoghtraben/index.php'>
                <div class="logo"><img src="<?php echo $css ?> /logo.png" width="135" height="100"></a>
            </div>
                
                 <div class="container-links">
                    <ul class="links">
                        <li><a href="http://localhost/elmoghtraben/" class="active">Home</a></li>
                        <li><a href="./about.php">About</a></li>
                        <li><a href="./jobs.php">Jobs</a></li>
                        <li><a href="./apartments.php">Apartments</a></li>
                        <?php if (isset($_SESSION['username'])): 
                            $getUser = $con->prepare("SELECT * FROM userid WHERE username = ?");
                            $getUser->execute(array($_SESSION['username']));
                            $info = $getUser->fetch();
                        ?>
                            <li class="clickD"><a href="#"><?php echo $_SESSION['username']; ?></a></li>
                            <div class="drop-about">
                                <li><a href="profile.php">Profile</a></li>
                                <?php if ($info['rageStatus'] == 1): ?>
                                    <li><a href="./newAD.php">Create AD</a></li>
                                <?php endif; ?>
                                <li><a href="logout.php">Logout</a></li>
                            </div>
                        <?php else: ?>
                            <li><a href="./login.php">Login / Sign Up</a></li>
                        <?php endif; ?>
                    </ul>
                    <button class="toggle-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button> 
                    </header>
                </div>
            </div>
        </div>