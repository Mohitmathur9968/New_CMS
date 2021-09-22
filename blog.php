<?php   require_once("DB.php"); ?>
<?php   require_once("funtions.php");  ?>
<?php   require_once("Session.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
   <title>Blog.com</title>
</head>
<body>
   <div style="height: 15px; background-color: black;"></div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <button class="navbar-toggler"  data-toggle="collapse" data-target="#navBarCMS">
         <span class="navbar-toggler-icon"></span>
       </button>
      <a href="index.html" class="navbar-brand">Bloger.com</a>
      
      
      
       <div class="collapse navbar-collapse" id="navBarCMS">
         <ul class="navbar-nav mr-auto">
         
         <li class="nav-item">
            <a href="blog.php" class="nav-link">Home</a>
         </li>
         <li class="nav-item">
            <a href="#" class="nav-link">About Us</a>
         </li>
         <li class="nav-item">
            <a href="blog.php" class="nav-link">Blog</a>
         </li>
         <li class="nav-item">
            <a href="#" class="nav-link">Contact Us</a>
         </li>
         <li class="nav-item">
            <a href="blog.php" class="nav-link">Feature</a>
         </li>
      

      </ul> 
   </div>
      <ul class="navbar-nav ml-auto">
         <form  class = "form-inline" action="blog.php">
             <div class ="form-group"></div>

             <input class = "form-control mr-2" type="text" name = "Search" placeholder ="Type here" value ="" >
             <button type = "button" class = "btn btn-primary" name = "SearchButton">Go</button>

             </form>
      </ul>
      
   </div>
   </nav>
   <div style="height: 10px; background-color: black;"></div>
    <!--Navbar End-->
    <!-- Header starts -->
    <div class = "container">
        <div class = "row mt-4">
            <div class = "col-sm-8">
         <?php
         global $ConnectingDB;
         $sql = "SELECT * FROM post";
         $stmt =$ConnectingDB->query($sql);
         while($DataRows = $stmt->fetch())
          {
             $PostId = $DataRows["ID"];
             $DateTime = $DataRows["datetime"];
             $PostTitle = $DataRows["title"];
             $Category = $DataRows["category"];
             $Admin = $DataRows["author"];
             $Image = $DataRows["image"];
             $PostDescription = $DataRows["post"];   
          
          }
         
         
         ?>
         <div class = "card">
             <div class = "card-body">
                 <h4 class = "card-title"><?php echo $PostTitle ?></h4>
                 <small>Written by <?php echo $Admin ?> On <?php  echo $DateTime ?></small>
                 <hr>
               <p> <?php echo $PostDescription  ?></p>
                </div>
         </div>
            </div>
         <!-- Main area -->
         
         
            <div class = "col-sm-4">

            </div>
        </div>
    </div>


    

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