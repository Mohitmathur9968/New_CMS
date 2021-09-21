<?php   require_once("DB.php"); ?>
<?php   require_once("funtions.php");  ?>
<?php   require_once("Session.php");  ?>
<?php


if(isset($_POST["Submit"])){
 $PostTitle = $_POST["PostTitle"];
 $Category = $_POST["Category"];
 $image = $_FILES["Image"]["name"];
 $Target = "Uploads/";//.basename($_Files["Image"]["name"]);
 $PostDescription = $_POST["Post"];
 $Admin = "Mohit";

 date_default_timezone_set("Asia/Mumbai");
 $CurrentTime = time(); 
 $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime); 
 
 

if(empty($PostTitle)){

  $_SESSION["ErrorMessage"]= "Title Can't be empty";
  Redirect_to("addnewpost.php");
}
elseif (strlen($PostTitle)< 5){

   $_SESSION["ErrorMessage"] = "Category title should be greater then 5 characters";
    Redirect_to("addnewpost.php");
}
   else{
   $sql = "INSERT INTO post(datetime,title,category,author,image,post)";
   $sql .= "VALUES(:dateTime,:Posttitle,:categoryName,:adminname,:imageName,:PostDescription)";
   $stmt = $ConnectingDB->prepare($sql);
   $stmt->bindValue(':dateTime',$DateTime);
   $stmt->bindValue(':postTitle',$PostTitle);
   $stmt->bindValue(':categoryName',$Category);
   $stmt->bindValue(':adminName',$Admin);
   $stmt->bindValue(':imageName',$image);
   $stmt->bindValue(':PostDescription',$PostText);
   $Execute= $stmt->execute();
   
   
   if($Execute){
      $_SESSION["SuccessMessage"] = "Category Added Successfully";
      Redirect_to("addnewpost.ph");
   }else{
           $_SESSION["ErrorMessage"] = "Try Again";
      Redirect_to("addnewpost.ph");
   } 
   

}
 
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
   <title>Categories</title>
</head>
<body>
   <div style="height: 10px; background-color: black;"></div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <button class="navbar-toggler"  data-toggle="collapse" data-target="#navBarCMS">
         <span class="navbar-toggler-icon"></span>
       </button>
      <a href="index.html" class="navbar-brand">Bloger.com</a>
      
      
      
       <div class="collapse navbar-collapse" id="navBarCMS">
         <ul class="navbar-nav mr-auto">
         <li class="nav-item">
            <a href="MyProfile.php" class="nav-link"><i class="far fa-user text-success"></i>  My profile </a>
         </li>
         <li class="nav-item">
            <a href="Dashboard.php" class="nav-link">DashBoard</a>
         </li>
         <li class="nav-item">
            <a href="Posts.php" class="nav-link">Posts</a>
         </li>
         <li class="nav-item">
            <a href="Categories.php" class="nav-link">Categories</a>
         </li>
         <li class="nav-item">
            <a href="Admins.php" class="nav-link">Manage Admins</a>
         </li>
         <li class="nav-item">
            <a href="Comments.php" class="nav-link">Comments</a>
         </li>
         <li class="nav-item">
            <a href="Blogs.php?page=1" class="nav-link">Live Blogs</a>
         </li>

      </ul> 
   </div>
      <ul class="navbar-nav ml-auto">
         <li class="nav-item">
            <a href="Logout.php" class="nav-link"><i class="fas fa-sign-out-alt text-danger"></i> Logout</a>
         </li>
      </ul>
      
   </div>
   </nav>
   <div style="height: 10px; background-color: black;"></div>
    <!--Navbar End-->
<header>
   <div class="container">
      <div class="row">
        <div class="col-md-12">
            <h1><i class="fas fa-edit" style="color:#27aae1;"></i>Add New Post </h1>
        </div>

      </div>
   </div>
</header>
<!--Main area Starts-->
<section class="container py-4 mb-4">
    <div class = "row">
    <div class="col-lg-10" style="min-height:400px;">
    <?php   
        echo ErrorMessage();
        echo SuccessMessage();
   ?>
    <form class="" action = "addnewpost.php" method ="post" enctype ="multipart/form-data">
  <div class="card bg-secondary text-light mn-3">
 
<div class="card-body">
<div class="form-group">
   <lable for="title"><span class="FieldInfo"></span>Post  Title :</lable>
   <input class="form-control"type="text" name="PostTitle" id="Post" placeholder="Type title here">
   </div>
   <div class="form-group">
   <lable for="categorytitle"><span class="FieldInfo"></span>Choose Category :</lable>
   <select class="form-control" name="Category" id="Category">
   <?php

   global $ConnectingDB;
   $sql ="SELECT * FROM category"; 
   $stmt = $ConnectingDB->query($sql);
   while($DateRows = $stmt->fetch())
    {
    $Id = $DataRows["id"];
    $CategoryName = $DataRows["title"];
      
   ?>
    <option> <?php echo $CategoryName; ?> </option>
    <?php } ?>
       
   </select>
</div>
   
<div class="form-group mb-1">
   <label for="imageSelect"><span class="FieldInfo">Select Image</span></label>
<div class="custom-file"> 
   <input type="File" name="Image" id="Image" value="">
</div> 
</div>
<div class="form=group">
 <label for="Post"><span class="FieldInfo">Post: </span></label>
 <textarea class="form-control" id="Post" name="PostDescription" row="8" cols="80"></textarea>
</div>
   
<div class="row">
 <div class="col-lg-6 mb-2">
   <a href="Dashbord.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left">Back To Dashboard </i></a>
  </div>
  <div class="col-lg-6 mb-2">
    <button Type="Submit" name="Submit" class="btn btn-success btn-block">
    <i class="fas fa-check">Publish</i>
    </button>
</div>
  
</div>
 </div>
</div>


</form>
   
   </div>
   </div>
</section>

<!--End area Starts-->
    

    <footer class="navbar-light bg-light">
       <div class="container">
          <div class="row">
             <div class="col">
             <p class="lead text-center">Theme By | Bloger |  <script>document.write(new Date().getFullYear())</script> &copy; ------- All Right Reserved</p>
            </div>
          </div>
       </div>
    </footer>
    <div style="height: 10px; background-color: black;"></div>
   <script src="https://kit.fontawesome.com/85a63adfd5.js" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
  
</body>
</html>