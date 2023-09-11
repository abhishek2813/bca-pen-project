<?php
require("connection.php");
    $count=1;
    $total=''; 

    #-------------directly buy

    if(isset($_GET['buy_item']))
    { 

        $p_id=$_GET['id'];
        $sql="select * from product where p_id=$p_id";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        
        $_SESSION['p_id']=get_safe_value($conn,$_GET['id']);
    
        if($num)
        {
            $row=mysqli_fetch_assoc($result);
            $total=$row['price'];
           
        }else{
            header("location: index.php?checkout_query_not_working");
            exit;
        }

    }


    #-----------------cart se aane waali query ka checkout

    if(isset($_GET['cart']))
    {
        $total=$_GET['total'];
        $count=$_GET['count'];
    }

    $username=$_SESSION['username'];
    $u_id=$_SESSION['u_id'];


  #-----------users ki details nikalna form me daalne ke liye

    $sql="SELECT * FROM users where u_id=$u_id";
    $show_result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($show_result);

    $address=$row['address'];
    $email=$row['email'];
    $phone_no=$row['phone_no']; 
    $city=$row['city']; 
    $pincode=$row['pincode']; 


?>
<html>
    <head>
        <title>Main website</title>
        <link rel="stylesheet" href="Main.css">
    </head>

    <style>
 
        .checkout-container{
            background-color: #f2f2f2;
            border: 0px solid black;
            padding: 1em;
            margin-top:0em;
            margin-bottom:4em;
   
        }

        .checkout-container form p{
            padding: 10px; 
            font-size: 18px;
        }

        .checkout-container form h2{
            padding: 10px;   
        }

        .checkout-container input[type="text"],input[type="email"],input[type="number"]
        {
            width:100%;
            padding: 8px;
            font-size: 20px;
            height: 50px;
        }

        .checkout-container textarea
        {
            width:100%;
            padding: 8px;
            font-size: 25px;
        }
        
        .checkout-container input[type="submit"]{
            background-color: #05c984;
            color: white;
            border: 0px solid grey;
            margin-left: 0;
            background: #ff5e00 none repeat scroll 0 0; 
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: 400;
            text-transform: capitalize;
            transition: all 0.3s ease 0s;
            padding: 1em 4em;
        }

        .checkout-container input[type="submit"]:hover{
            cursor: pointer;
            background-color:rgb(23, 142, 193);
            border: 0px solid grey;
        }
         
        .checkout-container textarea{
            min-height: 5em;
        }

    </style>
<body>

<?php
    require("header.php");
?>

    
<div style="text-align: center; padding: 1em; font-size: 2em;">
    <h1>Shipping Details</h1>
    </div>


    <div class="checkout-container"> 

        <?php if(isset($_GET['buy_item'])){ ?>
            <form method="post" action="user_order.php?buy_item=1">

        <?php }else {?>

            <form method="post" action="user_order.php">  

        <?php } ?>
            
            
        <p><input type="text" name="name" placeholder="Name" value="<?php echo $username ?>" required></p>
        <p><input type="email" name="email" placeholder="Email" value="<?php echo $email ?>" required></p>
        <p><input type="number" name="phone_no" placeholder="Phone no" value="<?php echo $phone_no ?>" required></p>
        
        <p>
            <textarea name="address" placeholder="Address" ><?php echo $address ?></textarea>
        </p>
        <p><input type="text" name="city" placeholder="City" value="<?php echo $city ?>"></p>
        <p><input type="number" name="pincode" placeholder="Pincode" value="<?php echo $pincode ?>"></p><br>
       
        <p>
                 
        <?php if(isset($_GET['buy_item'])){ ?>
            <input type="submit" name="submit_me" value="Proceed to Continue">
            <?php }else {?>
            <input type="submit" name="submit" value="Proceed to Continue">
            <?php } ?>
          
        </p>

        <p>
        <h2>Total Items : 
            <span style="font-weight:200;"><?php echo $count; ?></span>
        </h2>
        <h2>Total Price : <span style="font-weight:200;"><?php echo $total; ?></span></h2>
        </p>
    
        </form>
    </div> 



  <?php
    require("footer.php");
  ?>

</body>
</html>