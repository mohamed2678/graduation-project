<?php
ob_start();
session_start();
include "init.php";

if (isset($_SESSION['username'])) {
    $getUser = $con->prepare("SELECT * FROM userid WHERE username = ?");
    $getUser->execute(array($_SESSION['username']));
    $info = $getUser->fetch();
?>

<section class="apartments" id="apartments">
  <div class="container">
        <h2>Apartments</h2>
        <?php
            if (isset($_POST['submit_comment'])) {
                $userid = $info['ID'];
                $apartmentid = $_POST['place_id'];
                $comment = $_POST['comment'];
        
                if (empty($comment)) {
                    echo '<div class="AErr"><p class="NS">Comment cannot be empty</p></div>';
                } else {
                    try {
                        $stmt = $con->prepare("INSERT INTO `comment` (`comment`, `status`, `comment_date`, `user_id`, `places_id`) VALUES (:zcomment, 1, now(), :zuserid, :zpid)");
                        $stmt->execute(array(
                            'zcomment' => $comment,
                            'zuserid' => $userid,
                            'zpid' => $apartmentid
                        ));
                        echo "<div class='alert alert-success'>Comment added successfully!</div>";
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                }
            }
            
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['book'])) {
        $UID = $_POST['user'];
        $PID = $_POST['place'];
        $NU = $_POST['nameUser'];
        $bed = $_POST['bed'];

        // Check if the user exists in the userid table
        $stmt = $con->prepare("SELECT * FROM userid WHERE username = ?");
        $stmt->execute(array($NU));
        $user = $stmt->fetch();

        try {
            // Add the new reservation
            $stmt = $con->prepare("INSERT INTO `reservation` (`R_name`, `pending`, `date_r`,`U_id`, `P_id`)
             VALUES (:znames, 0, now(),:zusers, :zplaces)");  
            $stmt->execute(array(
                ':znames' => $NU,
                ':zusers' => $UID,
                ':zplaces' => $PID
            ));

            // Decrement beds by 1
            $newBedCount = $bed - 1;
            $updateStmt = $con->prepare("UPDATE places SET bed = ? WHERE p_id = ?");
            $updateStmt->execute(array($newBedCount, $PID));
            echo "<div class='alert alert-success'>Success!</div>";
            header('location: profile.php');
            exit();
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo '<div class="AErr">';
                echo '<p class="NS">Your reservation has already been added</p>';
                echo '</div>';
            } else {
                echo $e->getMessage();
            }
        }
    }


}
            
        ?>
        <div class="search-container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                <input type="text" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <button type="submit">Search</button>
                <?php if (isset($_GET['search'])): ?>
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="cancel-search">Cancel Search</a>
                <?php endif; ?>
            </form>
        </div>
        <div class="product">
            <?php 
                // Check if a search query is provided
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    // Modify your SQL query to include the search criteria
                    $getapartments = $con->prepare("SELECT * FROM places WHERE (visability = 2 OR visability = 1) AND nameofplaces LIKE :search ORDER BY p_id ASC");
                    $getapartments->execute(array(':search' => '%' . $search . '%'));
                } else {
                    // Default query without search
                    $getapartments = $con->prepare("SELECT * FROM places WHERE visability = 2 OR visability = 1 ORDER BY p_id ASC");
                    $getapartments->execute();
                }

                // Fetch apartments based on the query result
                $apartments = $getapartments->fetchAll();

                foreach ($apartments as $apartment) {
            ?>
            <div class="row">
                <div class="product-text">
                    <?php if (empty($apartment['image'])) { 
                        echo "<img class='rad-half mb-10' src='uploads/avatar/7679314_contact.png' alt='map'>";
                    } else {
                        echo "<img class='mb-10' src='uploads/avatar/" . $apartment['image'] . "' alt='image of place'>";
                    } ?>
                    <h5><?= $apartment['nameofplaces'] ?></h5>
                    <span class="build">Building number: <?= $apartment['building'] ?></span>
                    <span class="apra">Apartment number: <?= $apartment['apartment'] ?></span>
                    <span class="room">Room: <?= $apartment['room'] ?></span>
                    <span class="beds">Beds: <?= $apartment['bed'] ?></span>
                    <div class="heart-icon">
                        <i id="heartIcon" class="heart fas fa-heart" onclick="changeClass(this)"></i>
                    </div>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <span><?= $apartment['rate'] ?></span>
                    </div>
                    <div class="price">
                        <h5>Half - running set</h5>
                        <p>EGP <?= $apartment['price'] ?> <span>per month</span></p>
                    </div>
                    <div class="button">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="place" value="<?= $apartment['p_id'] ?>">
                            <input type="hidden" name="user" value="<?= $apartment['broker_id'] ?>">
                            <input type="hidden" name="bed" value="<?= $apartment['bed'] ?>">
                            <input type="hidden" name="nameUser" value="<?= $_SESSION['username'] ?>">
                            <input type="submit" name="book" value="Book Now!">
                        </form>
                    </div>
                    <div class="comment-section">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <textarea class="comment_p" name="comment" placeholder="Your comment!"></textarea>
                            <input type="hidden" name="place_id" value="<?= $apartment['p_id'] ?>">
                            <input type="submit" name="submit_comment" value="Submit Comment">
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php
} else {
    echo '<div class="m-10p">';
    echo "<div class='errJob'>";
    echo '<p class="NS">You must be logged in to access this page. Please <a href="login.php">log in</a> or <a href="signup.php">sign up</a>.</p>';
    echo "</div>";
    echo "</div>";
}
include $tbl . "footer.php";
ob_end_flush();
?>
