<?php 
  ob_start();
  session_start();
  include "init.php";
//   strat page about us
?>

        <section class="about-us">
        <div class="container">
        <div class="about-us">
            <div class="info-box">
                <h2>About Us</h2>
                <p>Welcome to our platform dedicated to supporting international students! Our vision is to create a comfortable and sustainable environment for students living abroad, 
                    combining high-quality accommodation with local employment opportunities. Our mission is to facilitate a seamless living and learning experience for students seeking unique opportunities in a new location. 
                    We provide essential services such as secure and comfortable housing, along with guidance towards suitable local employment opportunities. Our values, including a commitment to quality, attention to detail,
                     and dedication to student comfort, form the foundation of our project. Meet our dedicated team, each contributing their expertise to ensure the success of our mission. Feel free to reach out to us; we are here to assist with any inquiries or concerns. Don't just take our word for it – explore testimonials from previous students who have benefited from our services.
                     We look forward to being a part of your enriching journey as an international student.
                </p>
            </div> 
                <div class="img-box">
                    <img  src="./layOut/img/about.jpg" alt="about-us">
                </div>
        </div>
    </div>
        </section>
        <br>
        
      <?php
    include $tbl . "footer.php";
    ob_end_flush();
    ?>

