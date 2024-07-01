    <?php 
    ob_start();
    session_start();
    include "init.php";

    if (isset($_SESSION['username'])) {
      $sessionUser = $_SESSION['username'];
      $getUser = $con->prepare("SELECT * FROM userid WHERE username = ?");
      $getUser->execute(array($sessionUser));
      $info = $getUser->fetch();
    ?>
      <div class="container">
          <h1 class="p-relative center">Profile</h1>
          <div class="profile-page m-20">
              <div class="overview bg-white rad-10 d-flex align-center">
                  <div class="avatar-box txt-c p-20">
                      <?php 
                      if (empty($info['avatar'])) { 
                          echo "<img class='rad-half mb-10' src='uploads/avatar/7679314_contact.png' alt=''>";
                      } else {
                          echo "<img class='rad-half mb-10' src='uploads/avatar/".$info['avatar']."' alt=''>";
                      } 
                      ?>
                      <h3 class="m-0"><?php echo $sessionUser ?></h3>
                      <p class="c-grey mt-10"><?= $info['date']; ?></p>
                  </div>
                  <div class="info-box w-full txt-c-mobile">
                      <div class="box p-20 d-flex align-center">
                          <h4 class="c-grey fs-15 m-0 w-full">General Information</h4>
                          <div class="fs-14">
                              <span class="c-grey">Full Name</span>
                              <span><?php echo $info['FullName']; ?></span>
                              <span class="c-grey">.</span>
                              <span><?php echo $info['ID']; ?></span>
                              <span class="c-grey">email</span>
                              <span><?php echo $info['email']; ?></span>
                              <span class="c-grey">phone</span>
                              <span><?php echo $info['phone']; ?></span>
                          </div>
                      </div>
                  </div>
              </div>

              <?php
              try {
                  $items = getItems('reservation.R_name', $sessionUser);
              ?>
              <div class="other-data d-flex gap-20">
                  <div class="skills-card p-20 bg-white rad-10 mt-20">
                      <h2 class="mt-0 mb-10">Reservation Status</h2>
                      <?php
                      foreach ($items as $item) {
                      ?>
                      <p class="mt-0 mb-20 c-black fs-15">
                          <?php if ($item['pending'] == 0) {
                              echo "( pending <i class='fa-regular fa-clock'></i> )";
                          } else {
                              echo "( confirmed )";
                          } ?> 
                          <?php echo $item['place']; ?> 
                      </p>
                      <ul class="m-0 txt-c-mobile">
                          <li>
                              <span>Broker: <?php echo $item['admin'] ?></span>
                              <span>Place: <?php echo $item['place'] ?></span>
                              <span>Date: <?php echo $item['datee'] ?></span>
                          </li>
                      </ul>
                      <div class="buttonsP">
                      <?php if ($item['status_p'] !== 'paid') { ?>
                        <button onclick="showConfirmationModal(<?php echo $item['R_id']; ?>)" class="btn btn-danger">Cancel</button>
                        <?php } else { 
                          echo "<a href='#'>req to cancel reservation</a>";
                          } 
                          ?>

                        <?php if ($item['status_p'] != 'paid') { ?>
                          <form class="payment" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return showPaymentModal(<?php echo $item['R_id']; ?>);">
                            <button type="submit" class="btn btn-sm btn-success">Pay</button>
                          </form>
                        </div>
                      <?php } ?>
                      <?php 
                      }
                      ?>

                  </div>
              </div>
              <?php
              } catch (Exception $e) {
                  echo 'Error: ' . $e->getMessage();
              }
              ?>

              <div class="activities p-20 bg-white rad-10 mt-20">
                  <h2 class="mt-0 mb-10">Jobs</h2>
                  <p class="mt-0 mb-20 c-grey fs-15">Hiring</p>
                  <div class="activity d-flex align-center txt-c-mobile">
                      <div class="info">
                          <span class="d-block mb-10">Store</span>
                          <span class="c-grey">Bought The Mastering Python Course</span>
                      </div>
                      <div class="date">
                          <span class="d-block mb-10">18:10</span>
                          <span class="c-grey">Yesterday</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="modal">
      <div class="modal-content">
          <span class="close" onclick="closeModal()">&times;</span>
          <p>Are you sure you want to cancel this reservation?</p>
          <form id="confirmCancellationForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
              <input type="hidden" name="delete" id="deleteInput" value="" />
              <input type="hidden" name="place_id" id="placeId" value="" />
              <button type="submit" class="btn btn-sm btn-danger">Yes, Cancel</button>
              <button type="button" onclick="closeModal()" class="btn btn-sm btn-secondary">No, Keep Reservation</button>
          </form>
      </div>
    </div>

    <!-- Payment Modal -->
    <div id="paymentModal" class="modal">
      <div class="modal-content">
          <span class="close" onclick="closeModal()">&times;</span>
          <p>Enter Visa Information</p>
          <form id="paymentForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <input type="hidden" name="payment" id="paymentId" value="" />
              <label for="visaNumber">Visa Number:</label>
              <input type="text" id="visaNumber" name="visaNumber" required><br><br>
              <label for="expiryDate">Expiry Date:</label>
              <input type="text" id="expiryDate" name="expiryDate" required><br><br>
              <label for="cvv">CVV:</label>
              <input type="text" id="cvv" name="cvv" required><br><br>
              <button type="submit" class="btn btn-success">Submit Payment</button>
          </form>
      </div>
    </div>

    <script>
      function confirmCancellation() {
          // Show confirmation dialog before canceling reservation
          var confirmCancel = confirm("Are you sure you want to cancel this reservation?");
          return confirmCancel; // If confirmed, form submits; if canceled, form submission is prevented
      }

      function showPaymentModal(reservationId) {
          document.getElementById('paymentId').value = reservationId;
          document.getElementById('paymentModal').style.display = 'block';
          return false;
      }

      function closeModals() {
          document.getElementById('paymentModal').style.display = 'none';
          document.getElementById('confirmationModal').style.display = 'none';
      }

      function showConfirmationModal(id) {
          document.getElementById('deleteInput').value = id;
          document.getElementById('confirmationModal').style.display = 'block';
          return false; // Prevent the form from submitting immediately
      }

      function closeModal() {
          closeModals(); // Close all modals
      }
    </script>
        <?php
    if(isset($_GET['delete']) && is_numeric($_GET['delete'])){
        $id = $_GET['delete'];
        
        // Fetch the place_id before deleting the reservation
        $stmtPlace = $con->prepare("SELECT P_id FROM reservation WHERE R_id = ?");
        $stmtPlace->execute(array($id));
        $placeId = $stmtPlace->fetchColumn();

        $stmt = $con->prepare("DELETE FROM reservation WHERE R_id = :zid");
        $stmt->bindParam(":zid", $id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            echo "<script>alert('Reservation Canceled');</script>";
            
            // Update the room count after canceling the reservation
            $stmtRoom = $con->prepare("UPDATE places SET bed = bed + 1 WHERE p_id = ?");
            $stmtRoom->execute(array($placeId));
            
            echo "<script>window.location.href='profile.php'</script>";
            exit();
        } else {
            echo "<script>alert('Error: Reservation not found or not canceled');</script>";
        }
    }
?>

    <?php
    if (isset($_POST['payment']) && is_numeric($_POST['payment'])) {
      $reservationId = $_POST['payment'];
      $visaNumber = $_POST['visaNumber'];
      $expiryDate = $_POST['expiryDate'];
      $cvv = $_POST['cvv'];

      // Handle payment logic here
      if (!empty($visaNumber) && !empty($expiryDate) && !empty($cvv)) {
          // Update reservation status to 'paid' in the database
          $stmt = $con->prepare("UPDATE reservation SET status_p = 'paid', pending = 1 WHERE R_id = ?");
          $stmt->execute(array($reservationId));

          if ($stmt->rowCount() > 0) {
              echo "<script>alert('Payment Successful');</script>";
          } else {
              echo "<script>alert('Error: Payment not processed');</script>";
          }
      } else {
          echo "<script>alert('Error: All fields are required');</script>";
      }

      echo "<script>window.location.href='profile.php'</script>";
      exit();
    }
    ?>

    <?php
    include $tbl . "footer.php";
    ob_end_flush();
    } else {
      header('location: index.php');
      exit();
    }
    ?>
