<?php

$dbHost="localhost";
$dbUser="root";
$dbPass="";
$database="ecom";

$conn= mysqli_connect($dbHost, $dbUser, $dbPass,$database);

if($conn)
{

    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $password=$_POST['upass'];


    #---------------Admin Check first-----------------------------------

        if($_POST['email']==="admin@123")
        {   
            $admin_sql="SELECT * FROM `admin_table` WHERE `Name` = '$email'";
            $admin_result=mysqli_query($conn,$admin_sql);
            $numAdmin=mysqli_num_rows($admin_result);
            if($numAdmin==1)
            {   
                $row=mysqli_fetch_assoc($admin_result);
                if(password_verify($password,$row['Password']))
                {   
                    session_start();
                    $_SESSION['admin_logged_in']=true;
                    $_SESSION['username']=$row['Name'];
                 
                    header("Location:./Admin/Index.php?Admin_login_successfully");
                    exit;
                }
                else{
                    header("Location: login.php?error=Admin row not affect");
                }

            }
        }

        
        #---------------User checking-----------------------------------
         
        $user_sql="SELECT * FROM `users` WHERE `email`='$email'";
        $user_result=mysqli_query($conn,$user_sql);
        $numUser= mysqli_num_rows($user_result);
        if($numUser>0)
        {   
            $row=mysqli_fetch_assoc($user_result);

            if(password_verify($password,$row['password']))
            {
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$row['username'];
                $_SESSION['email']=$email;
                $_SESSION['u_id']=$row['u_id'];
                
                header("Location: index.php?Login_successfully");
                exit;
            }
            else{
                echo "";
                header("Location: login.php?error=Password did not match");
            }
        }
        else{
            header("Location: login.php?error=There is no user with this name");
        }
    }



    #...................Account creation...........................


   if(isset($_POST['register']))
    {
        $username= $_POST['uname'];
        $password= $_POST['upass'];
        $cpassword= $_POST['ucpass'];
        $email= $_POST['email'];
        $address= $_POST['address'];
        $city= $_POST['city'];
        $pincode= $_POST['pincode'];
        $phone_no= $_POST['phone_no'];
        $d_o_b= $_POST['d_o_b'];
        $gender= $_POST['gender'];


       
        $sql="SELECT * FROM `users` WHERE `email` = '$email'";
        $result=mysqli_query($conn,$sql);
        $numExistUser=mysqli_num_rows($result);


        if($numExistUser>0)
        {
            header("Location: register.php?error=Email_already_exist");
            exit;
        }
        else
        {
        
            if($password==$cpassword)
            {
             
                $hash= password_hash($password,PASSWORD_DEFAULT);
                
                //Insert new user into users table 
                $sql="INSERT INTO `users` (`username`, `password`, `email`, `address`, `city`, `pincode`, `phone_no`, `d_o_b`, `gender`) VALUES ( '$username', '$hash', '$email', '$address', '$city', '$pincode', '$phone_no', '$d_o_b', '$gender')";
               
                $result=mysqli_query($conn,$sql);
                
                //If result is true
                if($result)
                {   
                    $user_sql="SELECT * FROM `users` WHERE `email`='$email'";
                    $user_result=mysqli_query($conn,$user_sql);
                    $numUser= mysqli_num_rows($user_result);
                    
                    if($numUser>0)
                    {   
                        
                        $row=mysqli_fetch_assoc($user_result);
                        $u_id=$row['u_id'];

                        $cart_create_sql="CREATE TABLE `cart$u_id` ( `cart_id` INT(40) NOT NULL AUTO_INCREMENT ,  `p_id` INT(10) NOT NULL ,  `p_name` VARCHAR(255) NOT NULL ,  `brand_id` INT(10) NOT NULL ,  `price` INT(10) NOT NULL ,  `image` VARCHAR(255) NOT NULL ,    PRIMARY KEY  (`cart_id`))";
                        
                        $cart_result=mysqli_query($conn,$cart_create_sql);
                        if($cart_result)
                        {
                          
                            $order_table_sql="CREATE TABLE `order_table$u_id` ( `order_id` INT(40) NOT NULL AUTO_INCREMENT ,  `brand_id` INT(20) NOT NULL ,  `p_name` VARCHAR(30) NOT NULL ,  `image` VARCHAR(50) NOT NULL ,  `price` INT(12) NOT NULL ,  `u_id` INT(30) NOT NULL ,  `username` VARCHAR(30) NOT NULL ,  `email` VARCHAR(50) NOT NULL ,  `phone_no` BIGINT(10) NOT NULL ,  `address` VARCHAR(80) NOT NULL ,  `time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`order_id`))";
                            $order_result=mysqli_query($conn, $order_table_sql);

                            if($order_result)
                            {
                                header("Location: login.php ?Account_created_Email=$email&&Password=$password");
                                exit;
                            }
                            else{
                                header("location: register.php?error=Order table query error");   
                            }
                        
                    
                        
                        }else{
                            header("location:register.php?error=Something wrong with cart creation");
                            exit;
                        }

                     }else{
                         header("location: register.php?error=Num user query error");
                     }
                }
                else{
                    header("Location: register.php?error=Rows not affected=$numExistUser");
                }

            }else
            {
                header("Location: register.php?error=Password did not match");
            }


        }
    }


}else{
    header("Location: register.php?Connection_not_established");
}




?>