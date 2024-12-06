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
  <div class="row">
  <div class="row">
    <?php
    if(isset($_GET['catid'])){
      $catid = $_GET['catid'];
      $gallery_image=mysqli_query($conn,'SELECT * FROM products WHERE status=1 AND cat_name ="$catid"');
      if($gallery_image == 0){
        $gallery_image=mysqli_query($conn,'SELECT * FROM products WHERE status=1');
      }
    }
    else{
      $gallery_image=mysqli_query($conn,'SELECT * FROM products  WHERE status=1');
    }
    foreach($gallery_image as $product){
    ?>
    <div class="col-md-3">
    <div class="product_card">
        <div class="add_to_wishlist">
            <i class="far fa-heart"></i>
        </div>
        <div class="image">
            <img src="admin/<?=$product['product_images']?>" alt="">
        </div>
        <div class="product_info">
            <h2 class="product_name">
            <?=$product['product_name']?>
            </h2>
            <p class="product_description">
            <?=$product['short_des']?>
            </p>
            <div class="colors">
                <div class="color" style="background-color: gray;"></div>
                <div class="color" style="background-color: black;"></div>
                <div class="color" style="background-color: blue;"></div>
            </div>

            <div class="bottom">
                <div class="price">
                    <span class="_price">₹ <?=$product['price']?></span>
                </div>
                <div class="buttons">
                  <a href="product-list.php?catid=<?php echo base64_encode($product['product_code']) ?>">
                    <button class="add_to_cart">
                       Place order  
                        <i class="fas fa-arrow-right"></i>
                    </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php 
    }
    ?>
  </div>
</div>

  <?php 
  include('footer.php');
  ?>