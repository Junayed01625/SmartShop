<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/uikit.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/Wedding Couple.png">
  <title>Smart Shop</title>
</head>
<body>

  <!--NavBar-->
  <nav class="navbar navbar-dark navbar-expand-md "  uk-sticky="top: 200; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
   <!--navbar-expand-md for horizontal nav on medium to upper --> <!--navbar-dark for text white -->
   <div class="container ">
     <a href="index.html" class="navbar-brand text-primary pr-6 mr-3 "><h1 class="text-primary">Smart Shop</h1></a>
     <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarnav">
       <!--navbar-toggler to bring toggler on small device -->
       <!--data-target="#nav1" to call an id nav1 form div below.... small device -->
       <span class="navbar-toggler-icon"></span>
       <!--navbar-toggler-icon to bring toggler icon on small device -->

     </button>
     <div id="navbarnav" class="collapse navbar-collapse ">
       <!--collapse to remove home,... from nav.. small device fact -->
       <ul class="navbar-nav  ml-auto"><!--navbar-nav to remove bulletpoint from nav -->
         <li class="nav-item ">    <!--active to make the home icon actv in nav-->
           <a class="nav-link" href="index.html">Home</a>
         </li>
         <li class="nav-item active">
           <a class="nav-link" href="Categories.html">Categories</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="about.html">About Us</a>
         </li>
        <li class="nav-item">
           <a class="nav-link" href="contact.html">Contact</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="login_UI.php">Account</a>
           </li>
       </ul>
     </div>
   </div>
  </nav>

<!--Page Header-->
<section id="Mobile-page-header" class="text-light text-center mb-5">
  <div class="container">
    <div class="row">
      <div class="col pt-5">
        <h2 class="text-light">Music</h2>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, saepe.</p>
      </div>
    </div>
  </div>
</section>

<!--PhP for fetching main section-->
<?php

global $connectingdb;
$sql = "SELECT *FROM product WHERE type='music'";
$stmt = $connectingdb->query($sql);
while($DataRows = $stmt->fetch()){
  $id = $DataRows["id"];
  $name = $DataRows["name"];
  $email = $DataRows["email"];
  $price = $DataRows["price"];
  $phone = $DataRows["phone"];
  $spec = $DataRows["spec"];
  $address = $DataRows["address"];
  $detail = $DataRows["detail"];
  $image = $DataRows["image"];

?>
<!--Main Section-->
<section id="catering" class="py-3 ">
  <div class="container">
    <!--Row-1-->
    <div class="row">
      <div class="col-md-5">
        <img src="upload/<?php echo $image; ?>" class="img-fluid rounded" alt="image">
      </div>
      <div class="col-md-7 ">

        <h3> <?php echo $name; ?> </h3>
        <p class="lead">Price: <?php echo $price;?></p>

        <hr>

        <label class="lead">Info:</label>
        <p class="lead"> <?php echo $detail;?></p>

        <div class=" text-right pt-3 mr-5 pr-5">
        <a href="prod_more.php?id=<?php echo $id; ?>" class="btn btn-primary">Click for more</a>
        </div>
      </div>
    </div>

<hr class="bg-primary">


</section>

<?php } ?>



<!--Copyright-->
<section id="copyright" class="text-center py-3 text-light">
  <div class="container">
    <div class="row">
      <div class="col">
        <p class="lead mb-0">Copyright 2019 &copy; SmartShop</p>
      </div>
    </div>
  </div>
</section>






  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/uikit.min.js"></script>
  <script src="js/uikit-icons.min.js"></script>
</body>
</html>
