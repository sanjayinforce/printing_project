<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <!-- <link href="assets/vendor/aos/aos.css" rel="stylesheet"> -->
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main1.css" rel="stylesheet">
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

</head>

<body class="portfolio-details-page">
  <?php include('header.php') ?>

  <section id="hero" class="hero heroes section dark-background">

<img src="assets/img/aboutus/printing_1.webp" alt="" data-aos="fade-in">

<div class="container">
  <div class="row">
    <div class="col-lg-12 d-flex justify-content-center">
      <h2 data-aos="fade-up" data-aos-delay="100"> Our Service</h2>
      
    </div>
    
  </div>
</div>


</section>
  <section class="we-offer-area text-center bg-gray">
      
                    <?php
                    if(isset($_GET['ourservice'])){
                      $service =base64_decode($_GET['ourservice']) ;

                    
 $gallery_image=mysqli_query($conn,"SELECT * FROM services  WHERE id = '$service'");
    foreach($gallery_image as $service){
    ?>
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                        <div class="site-heading text-center">
                        <h2><?= $service['name']?></span></h2>
                        
                    </div>

                        </div>
                        <div class="col-md-6"> <img src="admin/<?=$service['image']?>" alt="" class="w-100"></div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center"><?= $service['short_description']?></div>
                       
 
                      </div>
                      <br>
                      <br>
                      <div class="row">
                      <div class="con-md-12">
                        <?= $service['description']?>
                        </div>
                      </div>
                    </div>
                    <?php 
    }
}
    ?>
                    <!-- End Single Item -->

                   

                    
       
    </section>

  <?php 
  include('footer.php');
  ?>