<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>

<!--action-->
<?php
if (isset($_POST["Submit"])){
$name = $_POST["uname"] ;
$email = $_POST["email"] ;
$price= $_POST["price"] ;
$phone= $_POST["phone"] ;
$spec= $_POST["spec"] ;
$type= $_POST["type"] ;
$address= $_POST["address"] ;
$detail=$_POST["detail"];
$image= $_FILES["image"]["name"] ; //Selcting only the name of the image
$target = "upload/".basename($_FILES["image"]["name"]); //Showing the directory


if(empty($name) || empty($email) || empty($price) || empty($phone) || empty($address) ) {
  $_SESSION["ErrorMessage"]="All fields must be filled out";
  Redirect_to("addpost.php");
}elseif (strlen($name)<2) {
  $_SESSION["ErrorMessage"]="Name must be greater than 2 characters";
  Redirect_to("addpost.php");
}elseif (strlen($name)>40) {
  $_SESSION["ErrorMessage"]=" Name must be less than 40 characters";
  Redirect_to("addpost.php");

}else {
   //Query to insert info into database
   $sql="INSERT INTO product(name,email,price,phone,spec,type,address,detail,image)";
   $sql .="VALUES(:NamE,:EmaiL,:PricE,:PhonE,:SpEc,:TypE,:AddRess,:DeTaiL,:ImagE)";
   $stmt = $connectingdb->prepare( $sql);
   $stmt->bindValue(':NamE',$name );
   $stmt->bindValue(':EmaiL',$email);
   $stmt->bindValue(':PricE',$price);
   $stmt->bindValue(':PhonE',$phone);
   $stmt->bindValue(':SpEc',$spec);
   $stmt->bindValue(':TypE',$type);
   $stmt->bindValue(':AddRess',$address);
   $stmt->bindValue(':DeTaiL',$detail);
   $stmt->bindValue(':ImagE',$image);
   $Execute=$stmt->execute();
   move_uploaded_file($_FILES["image"]["tmp_name"],$target); //To fetch the file in to the destination

   if($Execute){
    $_SESSION["SuccessMessage"] = "Registered Succesfully";
    Redirect_to("addpost.php");
  }else{
    $_SESSION["ErrorMessage"]="Something went wrong. Please Try again";
    Redirect_to("addpost.php");
  }
}
}
 ?>
