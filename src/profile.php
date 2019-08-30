<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("login_act.php"); ?>
<?php confirm_login2(); ?>
<?php
//fetching the admin data
$adminid=$_SESSION["UserId"];
global $connectingdb;
$sql ="SELECT *FROM client WHERE id='$adminid'";
$stmt=$connectingdb->query($sql);
while($DataRows = $stmt->fetch()){
  $id=$DataRows['id']; //fetched this one for the edit option
  $Existingname= $DataRows['name'];
  $Existingemail= $DataRows['email'];
  $Existingpassword=$DataRows['password'];
  $Existingphone=$DataRows['phone'];
  $Existingtype=$DataRows['address'];
  $Existingimage=$DataRows['image'];

}

 ?>
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
         <li class="nav-item">    <!--active to make the home icon actv in nav-->
           <a class="nav-link" href="index.html">Home</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="Categories.html">Categories</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="about.html">About Us</a>
         </li>
        <li class="nav-item">
           <a class="nav-link" href="contact.html">Contact</a>
         </li>
         <li class="nav-item active">
           <a class="nav-link" href="profile.php">Profile</a>
         </li>

         <li class="nav-item">
           <a class="nav-link" href="logout.php">Logout</a>
         </li>
       </ul>
     </div>
   </div>
  </nav>
<?php echo ErrorMessage();
 echo SuccessMessage();
 ?>

<!--profile main-->
<section class="py-5 text-center" id="profile">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Welcome <?php echo $Existingname ?> </h3>
      </div>
    </div>
  </div>
</section>

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="upload/<?php echo $Existingimage; ?>" class="img-fluid rounded-circle" alt="image">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle py-3">
					<div class="profile-usertitle-job">
              <!--Null-->
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->

				<div class="profile-userbuttons py-3">
					<a class="btn btn-success btn-sm" href="update_client_info.php?id=<?php echo $id; ?>"> Edit</a>
					<a class="btn btn-primary btn-sm" href="addpost.php"> Add Post</a>
				</div>
				<!-- END SIDEBAR BUTTONS -->

				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
                  <h5 class="py-4 text-center font-weight-bold text-info">Your Information!</h5>

                      <form class="form-group" action="update_member.php" method="post">
                        <div class="form-group text-center">
                        <label class="font-weight-bold" >Name</label>
                         <p><?php echo $Existingname ?></p>
                      </div>
                      <div class="text-center">
                        <label class="mt-1 font-weight-bold">Email</label>
                        <p><?php echo $Existingemail ?></p>
                      </div>
                      <div class=" mt-3 text-center">
                        <label class="font-weight-bold">Adress</label>
                            <p><?php echo $Existingtype ?></p>
                      </div>
                        <div class="form-group mt-3 text-center">
                            <label class="font-weight-bold">Phone No.</label>
                            <p><?php echo $Existingphone ?></p>
                        </div>

            </form>
       </div>
		</div>
	</div>
</div>


<!--Post_Table-->
<section class="">
<div class="container py-2 mb-4">
  <div class="row">
    <div class="col">

      <h1 class="text-danger text-center bg-dark py-2" >Your Added Post</h1>
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
          <th class="py-2">#</th>

          <th class="py-2">Name</th>
          <th class="py-2">Type</th>
          <th class="py-2">Display</th>
          <th class="py-2">Email</th>
          <th class="py-2">Phone</th>
          <th class="py-2">Action</th>
        </tr>
        </thead>
        <!--PhP for fetching Client info from client table -->
        <?php
        global $connectingdb;
        $sql = "SELECT *FROM product WHERE email='$Existingemail'";
        $stmt = $connectingdb->query($sql);
        while($DataRows = $stmt->fetch()){

          $id = $DataRows["id"];
          $name = $DataRows["name"];
          $email = $DataRows["email"];
          $phone = $DataRows["phone"];
          $image = $DataRows["image"];
          $type =  $DataRows["type"];

        ?>
        <tbody>
        <tr>
          <td>#</td>

          <td><?php echo $name; ?></td>
          <td><?php echo $type; ?></td>
          <td><img src="upload/<?php echo $image; ?>" alt="img" width="170px;" height="50px"></td>
          <td><?php echo $email; ?></td>
          <td><?php echo $phone; ?></td>
          <td>
            <span>
              <a href="addpost_edit.php?id=<?php echo $id; ?>"><span class="btn btn-warning">Edit</span></a>
              <a href="Delete_admin.php?id=<?php echo $id; ?>"><span class="btn btn-danger">Delete</span></a>

            </span>

          </td>

        </tr>
        </tbody>
        <?php } ?>
      </table>

    </div>
  </div>
</div>

</section>
<br>
<br>

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
