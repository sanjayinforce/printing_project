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

<div class="container">
<div class="container-fluid p-0"> <a class="navbar-brand text-uppercase fw-800" href="#">Select and Customize Your Design </a> </div>
  <div class="row">

    <?php
if (isset($_GET['catid'])) {
    
      $catid = base64_decode($_GET['catid']);
  
      
      $gallery_image = mysqli_query($conn, "SELECT * FROM products_images WHERE product_code = '$catid'");
  
  
      if (mysqli_num_rows($gallery_image) == 0) {
          $gallery_image = mysqli_query($conn, "SELECT * FROM products ");
      }
  } else {
      // If catid is not set, fetch all active products
      $gallery_image = mysqli_query($conn, "SELECT * FROM products WHERE status = 1");
  }
  foreach($gallery_image as $product){
   
    ?>
   
   
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
          <a href="product-details.php?proid=<?php echo base64_encode($product['id']) ?>">
            <div class="product"> <img src="admin/<?= $product['images']?>" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            </a>
            <!-- <div class="tag bg-red">sale</div> -->
            <div class="title pt-4 pb-1"><a href="" class="btn-getstarted">Customize</a></div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <!-- <div class="price">$ 60.0</div> -->
        </div>



    <?php 
    }
    ?>
  </div>
</div>

  <?php 
  include('footer.php');
  ?>