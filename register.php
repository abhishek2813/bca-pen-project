<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" href="Main.css">
    <style>
       

        .container{
            border-radius: 5px;
            position: static;
            padding: 0vh 30vh;
        }

        form p{
            padding: 10px; 
            font-size: 18px;
        }

        select,textarea,input[type="text"],input[type="email"],input[type="password"],input[type="checkbox"],input[type="number"],input[type="date"]
        {
            width:100%;
            padding: 8px;
        }

        fieldset{
            background-color: white;
            width: 99%;
        }

       
        input[type="submit"]{
            background-color: #047bd5;
            width: 100%;
            padding: 9px;
            font-size:18px ;
            color: white;
            border: 0px solid white;
            text-align:center;
        }

        input[type="submit"]:hover{
            cursor: pointer;
            background-color:#1689e4;
            border: 0px solid white;
        }

        #create_acc{
            text-align:center;
            color:black;
        }
        a{
            color: blue;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
<?php
    include("header.php");
    if (isset($_GET['error'])) {
        $errorText = $_GET['error'];
    } else {
        $errorText = ""; // No error initially
    }
    ?>
    <div class="container"> 
        <h1 style="text-align: center; font-family:sans-serif;">Create New Account </h1>
 <!-- Display the error message here -->
 <?php if (!empty($errorText)): ?>
            <div class="error-message">
                <?php echo $errorText; ?>
            </div>
        <?php endif; ?>
    <form action="database.php" method="post">

        <p>Enter username <input type="text" name="uname" required></p>
        <p>Enter Password <input type="password" name="upass"></p>
        <p>Confirm Password <input type="password" name="ucpass"></p>
        <p>Email <input type="email" name="email" placeholder="abc@email.com" required></p>
        <p>Phone no<input type="number" name="phone_no" placeholder="9876543210" required></p>
        <fieldset>        
           Gender
           <p>
               Male:<input type="radio" name="gender" value="male" required>
               Female:<input type="radio" name="gender" value="female" required>             
            </p>
        </fieldset>
        
        <p>City <input type="text" name="city" placeholder="Delhi" required></p>
        <p>Address<textarea rows="2" cols="10" name="address"></textarea></p>    
        <p>Pincode <input type="number" name="pincode" placeholder="123456"></p>
   
        <p>Date of birth <input type="date" name="d_o_b" min="1995-01-01" max="2022-01-01" required></p>
        <br>
        <input type="submit" value="Register" name="register">


        <p id="create_acc"> Account already created ? <a href="login.php"> Login</a> </p>
    </form>

    </div> 
</body>
</html>