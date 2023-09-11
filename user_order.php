<?php
require("connection.php");
$u_id=$_SESSION['u_id'];

#-----Checkout for Cart ----#
if(isset($_POST['submit'])&& $_POST['submit']!='')
{   
    $sql="SELECT * from `cart$u_id`";
    $result=mysqli_query($conn,$sql);

    $email=get_safe_value($conn,$_POST['email']);
    $phone_no=get_safe_value($conn,$_POST['phone_no']);
    $address=get_safe_value($conn,$_POST['address']);

    while($row=mysqli_fetch_assoc($result))
    {

    $brand_id=$row['brand_id'];
    $p_name=$row['p_name'];
    $image=$row['image'];
    $price=$row['price'];
    $cart_id=$row['cart_id'];
    $p_id=$row['p_id'];
    
    $username=$_SESSION['username'];
        
        

       $product_sql="SELECT * FROM `product` WHERE p_id=$p_id";
       $product_result=mysqli_query($conn,$product_sql);
       $row=mysqli_fetch_assoc($product_result);
        if($product_result)
        {   

            #increase count of product
            $popular=0;
            $popular=$row['count'];
            $popular=$popular+1;
            $popular_sql="UPDATE `product` SET `count` = '$popular' WHERE `product`.`p_id` = $p_id";
            $popular_result=mysqli_query($conn,$popular_sql);

            if($popular_result)
            {

                #insert data from cart to order table

                $order_sql="INSERT INTO `order_table$u_id` ( `brand_id`, `p_name`, `image`, `price`,`u_id`, `username`, `email`, `phone_no`,`address`) VALUES ( '$brand_id', '$p_name', '$image', '$price','$u_id', '$username', '$email', '$phone_no', '$address')";
                $result_order=mysqli_query($conn,$order_sql);

                #delete cart items
                    
                $delete_cart="DELETE FROM `cart$u_id` WHERE `cart$u_id`.`cart_id`=$cart_id";
                $result_delete= mysqli_query($conn,$delete_cart);
            }
            else{
                header("location: index.php?Product_count_error");
            }
        }else{
            header("location: index.php?Product_query_error");
        }
        
      
 
    }




    
}


#------------------Directly buy karne ke liye order ki query

if(isset($_GET['buy_item'])&& $_GET['buy_item']!='')
{   
    $email=get_safe_value($conn,$_POST['email']);
    $phone_no=get_safe_value($conn,$_POST['phone_no']);
    $address=get_safe_value($conn,$_POST['address']);
  
  
    $p_id=$_SESSION['p_id'];
    
    $sql="select * from product where p_id=$p_id";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    
    if($row=mysqli_fetch_assoc($result))
    {

    $brand_id=$row['brand_id'];
    $p_name=$row['p_name'];
    $image=$row['image'];
    $price=$row['price'];
    $popular=$row['count'];

    $username=$_SESSION['username'];
    $u_id=$_SESSION['u_id'];
    
         

            #increase count of product
 
            $popular=$popular+1;
            $popular_sql="UPDATE `product` SET `count` = '$popular' WHERE `product`.`p_id` = $p_id";
            $popular_result=mysqli_query($conn,$popular_sql);

            if($popular_result)
            {
                $order_sql="INSERT INTO `order_table$u_id` ( `brand_id`, `p_name`, `image`, `price`,`u_id`, `username`, `email`, `phone_no`,`address`) VALUES ( '$brand_id', '$p_name', '$image', '$price','$u_id', '$username', '$email', '$phone_no', '$address')";
                $result_order=mysqli_query($conn,$order_sql);    

            }else{
                header("location: index.php?Buy_popular_query_result_error");
            } 

            
            unset($_SESSION['p_id']);
 
    }
    else{
        header("location: index.php?Do_not_try_to_be_oversmart");
    }
            
 
}






$show_sql="select * from order_table$u_id order by order_id desc";
$show_result=mysqli_query($conn,$show_sql);




?>

<html>
<head>
    <title>Main website</title>
    <link rel="stylesheet" href="Main.css">
</head>
<body>

    <!-- Header section -->
    <?php
        require("header.php");
    ?>
  

    <main>


    
    <div style="margin-top: 3em; margin-bottom: 3em;">
    <h1 style=" margin-left:3.4em; font-size: 3em; ">My Orders</h1>
    </div>

    <div id="order-outer">
   
        <?php
                                
        while($row=mysqli_fetch_assoc($show_result))
        {?>
        <div class="order-container">
            <div class="one">
                <img src="./image/<?php echo $row['image']?>" alt="">
            </div>
            <div class="two">
                <h1>Product name: <?php echo $row['p_name']?> </h1><br>
                <p>Address: <?php echo $row['address']?></p><br>
                <h2>Rs. <?php echo $row['price']?></h2><br>
                <p>Time: <?php echo $row['time']?></p><br>
                <p>Your item will be deliver within 4-5 days</p><br>
            </div>
        </div>
        <br>

        <?php }  ?>

    </div>  

    <div style="height:10em;">
    
    </div>




        
</main>

    <!-- Footer section -->
    <?php
        require("footer.php");
    ?>
</body>
</html>