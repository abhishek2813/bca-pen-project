<?php

   require("connection.php");
  
   $email=$_SESSION['email'];
   $sql="SELECT * FROM `users`where email='$email'";
    $show_result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="Main.css">
    </head>
<body>

    <!-- Header section -->
    <?php
    require("header.php");
    ?>
  
  
    <main>
    <?php
    $i=1;
    while($row=mysqli_fetch_assoc($show_result))
    {?>

    <div id="top-pic-profile">
        <div class="profile">
            <div class="profile-pic">
                <img src="./cards_images/profile.jpg" alt="">
            </div>
                <div class="profile-name">
                    <h1><?php echo $row['username'] ?></h1>
            </div>
        </div>
    </div>

    
    <div class="profile-container" >
       
        <div class="profile-content">
        
            <div class="line">
                <h1>Name</h1>
                <p id="line1"><?php echo $row['username'] ?> </p>
                <p id="line2"></p>
            </div>

            <div class="line">
                <h1>E-mail</h1>
                <p id="line1"> <?php echo $row['email'] ?> </p>
                <p id="line2"></p>
            </div>

            <div class="line">
                <h1>Mobile</h1>
                <p id="line1"> <?php echo $row['phone_no'] ?></p>
                <p id="line2"></p>
            </div>


            <div class="line">
                <h1>Date of birth</h1>
                <p id="line1"><?php echo $row['d_o_b'] ?>  </p>
                <p id="line2"></p>
            </div>

            
            <div class="line">
                <h1>Address</h1>
                <p id="line1"> <?php echo $row['address'] ?> </p>
                <p id="line2"></p>
            </div>
            
            <div class="line">
                <h1>Language</h1>
                <p id="line1">English</p>
                <p id="line2"></p>
            </div>
            
            <div class="line">
                <h1>Gender</h1>
                <p id="line1"><?php echo $row['gender'] ?></p>
                <p id="line2"></p>
            </div>

            <div class="line">
                <h1>City</h1>
                <p id="line1"><?php echo $row['city'] ?></p>
                <p id="line2"></p>
            </div>


            <div class="line">
                <h1>Pincode</h1>
                <p id="line1"><?php echo $row['pincode'] ?></p>
                <p id="line2"></p>
            </div>



            <?php }  ?> 

        </div>
    </div>  

 </main>

    <!-- Footer section -->
    <?php
        require("footer.php");
    ?>
    
</body>
</html>