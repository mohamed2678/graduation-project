<?php  
ob_start();
session_start();
include "init.php";

if (isset($_SESSION['username'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Check if the file input is set and not empty
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
            $avatarName = $_FILES['avatar']['name'];
            $avatarSize = $_FILES['avatar']['size'];
            $avatarTmp = $_FILES['avatar']['tmp_name'];
            $avatarType = $_FILES['avatar']['type'];

            // List of allowed file types to upload
            $avatarAllowedExtension = array('jpeg', 'jpg', 'png', 'gif');
            // Get avatar extension
            $avatarExtension = strtolower(pathinfo($avatarName, PATHINFO_EXTENSION));

            $formErrors = array();
            $name = $_POST['nameofplaces'];
            $build = $_POST['building'];
            $apar = $_POST['apartment']; 
            $bed = $_POST['beds'];
            $room = $_POST['room'];
            $vis = $_POST['visability']; 
            $bork = $_POST['broker_id'];

            if (strlen($name) < 2){
                $formErrors[] = 'Sorry, your item name is less than 2 characters.';
            }
            if (!empty($avatarName) && !in_array($avatarExtension, $avatarAllowedExtension)){
                $formErrors[] = "This extension is not allowed.";
            }

            if (empty($formErrors)){
                $avatar = rand(0, 100000000) . '_' . $avatarName;
                move_uploaded_file($avatarTmp, "uploads/avatar/" . $avatar);

                $stmt = $con->prepare("INSERT INTO `places` (`nameofplaces`, `building`, `apartment`, `bed`, `room`, `image`, `P_date`,`visability`, `broker_id`)
                                       VALUES (:zname, :zbuld, :zapr, :zbed, :zroom, :zimg, now(),:zvis, :zbrok)");
                $stmt->execute(array(
                    "zname" => $name,
                    "zbuld" => $build,
                    "zapr" => $apar,
                    "zbed" => $bed,
                    "zroom" => $room,
                    "zimg" => $avatar,
                    "zvis" => $vis,
                    "zbrok" => $bork
                ));

                if ($stmt){
                    header('Location: apartments.php');
                    exit();
                }
            }
        } else {
            $formErrors[] = "You must upload an image.";
        }
    }
?>

<h1 class="text-center">New ADS</h1>
<div class="information block">
    <div class="container">
        <div class="card">
            <div class="card-header">Add Your New Product</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <form class="form-horizontal add form-control" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <label for="nameofplaces">Place</label>
                                    <input type="text" class="form-control live-name" name="nameofplaces" id="nameofplaces" placeholder="Name of the Item">
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <label for="building">Building</label>
                                    <input type="number" class="form-control live-price" name="building" id="building" placeholder="Building number">
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <label for="apartment">Apartment</label>
                                    <input type="text" class="form-control" name="apartment" id="apartment" placeholder="Apartment">
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <label for="beds">Beds</label>
                                    <input type="text" class="form-control" name="beds" id="beds" placeholder="Beds">
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <label for="room">Room</label>
                                    <input type="text" class="form-control" name="room" id="room" placeholder="Room">
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <label for="visability">Visibility</label>
                                <div class="form-floating">
                                    <select name="visability" class="form-select" id="inputState">
                                        <option value="1">Public</option>
                                        <option value="0">Private</option>
                                    </select>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <label for="broker_id">Broker</label>
                                <div class="form-floating">
                                    <select name="broker_id" class="form-select">
                                        <?php
                                            $stmt = $con->prepare("SELECT * FROM `userid` WHERE rageStatus = 1");
                                            $stmt->execute();
                                            $rows = $stmt->fetchAll();
                                            foreach($rows as $brok) {
                                                echo '<option value="'. $brok['ID'] .'">'. $brok["username"] .'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <label for="avatar">Image</label>
                                <div class="form-floating">
                                    <input type="file" class="form-control" name="avatar" id="avatar">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-10 col-sm-10">
                                    <input type="submit" value="Create Your Item" class="btn btn-success sub">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <div class="card-group item-box live-preview">
                            <span class="date"></span>
                            <div class="card">
                                <img src="./download.png" class="card-img-top" width="200" height="200" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Title</h5>
                                    <p class="card-text">Description</p>
                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>
                    </div>

                    <?php
                    if (!empty($formErrors)){
                        foreach($formErrors as $errors){
                            echo '<div class="alert alert-danger">' . $errors . '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
} else {
    redirctlogin("You need to sign in first", $url = "login.php", 1);
    exit();
}

include $tbl . "footer.php";
ob_end_flush();
?>


