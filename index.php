<?php
session_start();
$conn = mysqli_connect('localhost','root','','contact_db') or die('connection failed');

include('db.php');
if(isset($_POST['submit'])){
   if (!isset($_SESSION['username']))
{
    header("Location: login.php");
    die();
}

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $date = $_POST['date'];

   $insert = mysqli_query($conn, "INSERT INTO `appointments`(fullname, email, number, date) VALUES('$name','$email','$number','$date')") or die('query failed');

   if($insert){
      $message[] = 'appointment made successfully!';
   }else{
      $message[] = 'appointment failed';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Complete Responsive Dentist Website Design Tutorial</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->

<?php
include_once('navbar.php');

?>
<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

   <div class="container">

      <div class="row min-vh-100 align-items-center">
         <div class="content text-center text-md-left">
            <h3>Smile Bright, Smile Confidently.</h3>
            <p>Welcome to SmileBar, your premier destination for comprehensive dental care and oral health solutions. 
               Our mission is to provide exceptional dental services with a focus on patient comfort, 
               cutting-edge technology, and a commitment to delivering healthy, beautiful smiles.
</p>
            <a href="#contact" class="link-btn">Make Appointment</a>
         </div>
      </div>

   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="images/aboutus.jpeg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <span>About us</span>
            <h3>Caring for all your family’s dental needs.</h3>
            <p>At SmileBar, we understand that visiting the dentist can sometimes be an anxiety-inducing experience. That's why we have created a warm and inviting atmosphere, designed to make you feel relaxed and at ease from the moment you walk through our doors. Our friendly and highly skilled dental team is dedicated to ensuring your comfort throughout your entire dental journey.
With years of experience and a passion for excellence, our dentists and specialists are equipped to address a wide range of dental needs for patients of all ages. Whether you require routine preventive care, restorative treatments, cosmetic enhancements, or more complex procedures, we have the expertise to deliver exceptional results.</p>
            <a href="#contact" class="link-btn">Make Appointment</a>
         </div>

      </div>

   </div>

</section>

<!-- about section ends -->

<!-- services section starts  -->

<section class="services" id="services">

   <h1 class="heading">Our services</h1>

   <div class="box-container container">

<?php 
$sql= mysqli_query($conn, "SELECT * FROM `services`");
while ($row = mysqli_fetch_assoc($sql)) { ?>

      <div class="box">

         
         <h3><?php echo $row['service'] ?></h3>
         <p><?php echo $row['description'] ?></p>
      </div>
<?php
} ?>


   </div>

</section>

<!-- services section ends -->

<!-- process section starts  -->

<section class="process">

   <h1 class="heading">Work process</h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/process-1.png" alt="">
         <h3>Cosmetic Dentistry</h3>
         <p>Although it may be very painful, at the end of the day it's beautiful and it makes you feel fulfilled.</p>
      </div>

      <div class="box">
         <img src="images/process-2.png" alt="">
         <h3>Pediatric Dentistry</h3>
         <p>Your kids will be in safe hands, we take special care in making their time at our clinic as fun as it can get.</p>
      </div>

      <div class="box">
         <img src="images/process-3.png" alt="">
         <h3>Dental Implants</h3>
         <p>Missing something? We got you. We can bring back that smile you have been missing.</p>
      </div>

   </div>

</section>

<!-- process section ends -->

<!-- reviews section starts  -->

<section class="reviews" id="reviews">

   <h1 class="heading"> Satisfied Clients </h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, iure? Nemo est aspernatur voluptatum id, laboriosam asperiores iure omnis alias?</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>kevin merko</h3>
         <span>satisfied client</span>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, iure? Nemo est aspernatur voluptatum id, laboriosam asperiores iure omnis alias?</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>fjola gjeloshi</h3>
         <span>satisfied client</span>
      </div>

      <div class="box">
         <img src="images/pic-3.png" alt="">
         <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, iure? Nemo est aspernatur voluptatum id, laboriosam asperiores iure omnis alias?</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>florian nikolli</h3>
         <span>satisfied client</span>
      </div>

   </div>

</section>

<!-- reviews section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

   <h1 class="heading">Make Appointment</h1>

   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <?php 
         if(isset($message)){
            foreach($message as $message){
               echo '<p class="message">'.$message.'</p>';
            }
         }
      ?>
      <span>Your Name :</span>
      <input type="text" name="name" placeholder="enter your name" class="box" required>
      <span>Your Email :</span>
      <input type="email" name="email" placeholder="enter your email" class="box" required>
      <span>Your Number :</span>
      <input type="number" name="number" placeholder="enter your number" class="box" required>
      <span>Appointment Date :</span>
      <input type="datetime-local" name="date" class="box" required>

      <input type="submit" value="Make Appointment" name="submit" class="link-btn" Onclick>
   </form>  

</section>

<!-- contact section ends -->

<!-- footer section starts  -->

<section class="footer">

   <div class="box-container container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>Phone Number</h3>
         <p>+355-111-8888</p>
         <p>+355-222-8888</p>
      </div>
      
      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>Our Address</h3>
         <p>Laprake, Tirane</p>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>Opening Hours</h3>
         <p>9:00am to 8:00pm</p>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>Email Address</h3>
         <p>kmerko21@epoka.edu.al</p>
         <p>fnikolli21@epoka.edu.al</p>
      </div>

   </div>

   <div class="credit"> &copy; Copyright @ <?php echo date('Y'); ?> by <span>Group 8</span>  </div>

</section>

<!-- footer section ends -->










<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>