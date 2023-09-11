<?php
  require("admin_connection.php");
?>


<html>
    <head>
        <title>Form</title>
        <link rel="stylesheet" href="Index.css">
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar -->
            <?php
            require("sidebar.php");
            ?>

            <div class="main-content">
                
                         
            <!-- admin header  -->
            <?php
                require("admin_header.php");
            ?>   

                
                <div class="info">
                    
                    <div class="info-header" style="background-color:#236b8e;">
                        <h3>Earnings</h3>
                    </div>

                    <div class="table-wrapper" style="display:flex; justify-content:space-around; flex-wrap:wrap;">
                    
                    <div class="earn-container" style="background: #ff9800;"> 
                        <div class="earn-inner">
                        
                        <h1>Total Earn</h1>
                        <?php 
                        
                        $userId_sql="SELECT u_id FROM `users`";
                        $user_result=mysqli_query($conn,$userId_sql);
                        $earn=0;

                        while($user_row=mysqli_fetch_assoc($user_result))
                        {
                            $u_id=$user_row['u_id'];
                            $sql="SELECT * from `order_table$u_id`";
                            $result=mysqli_query($conn,$sql);

                                   
                            while($row=mysqli_fetch_assoc($result)){
                                
                                $earn=$earn+$row['price'];
                            }
                        }''?>

                        <p><?php echo $earn?></p>

                        <?php ?>
                        </div>                 
                    </div>

               

                    <div class="earn-container" style="background:#0000be; "> 
                        <div class="earn-inner">
                        <h1>Brands</h1>
                        <?php 
                        $brand_sql="SELECT * FROM `brand`";
                        $brand_result=mysqli_query($conn,$brand_sql);
                        $brand_num=mysqli_num_rows($brand_result);
                        ?>

                        <p><?php echo $brand_num?></p>

                        <?php ?>
                        
                        </div>                 
                    </div>


                    <div class="earn-container" style="background: #00cd00;"> 
                        <div class="earn-inner">
                        <h1>Products</h1>
                        <?php 
                        $product_sql="SELECT * FROM `product`";
                        $product_result=mysqli_query($conn,$product_sql);
                        $product_num=mysqli_num_rows($product_result);
                        ?>

                        <p><?php echo $product_num?></p>

                        <?php ?>
                        </div>                 
                    </div>
                    
                    
                    
                <div class="earn-container" style="background:red;"> 
                        <div class="earn-inner">
                        <h1>Users</h1>
                        <?php 
                        $users_sql="SELECT * FROM `users`";
                        $users_result=mysqli_query($conn,$users_sql);
                        $users_num=mysqli_num_rows($users_result);
                        ?>

                        <p><?php echo $users_num?></p>

                        <?php ?>
                        </div>                 
                    </div>
                    
                    


                    <div class="earn-container" style="background:#03a9f4;"> 
                        <div class="earn-inner">
                        <h1>Orders</h1>
                        <?php 
                        
                        $userId_sql="SELECT u_id FROM `users`";
                        $user_result=mysqli_query($conn,$userId_sql);
                        $orders=0;
                        while($user_row=mysqli_fetch_assoc($user_result))
                        {
                            $u_id=$user_row['u_id'];
                            $sql="SELECT * from `order_table$u_id`";
                            $result=mysqli_query($conn,$sql);

                                   
                            while($row=mysqli_fetch_assoc($result)){
                                
                                $orders=$orders+1;

                            }
                        }
                        ?>

                        <p><?php echo $orders?></p>

                        <?php ?>
                        </div>                 
                    </div>

                   

                 
                    <div class="earn-container" style="background: #ff5722;"> 
                        <div class="earn-inner">
                        <h1>Feedbacks</h1>

                        <?php 
                        $feedback_sql="SELECT * FROM `feedback`";
                        $feedback_result=mysqli_query($conn,$feedback_sql);
                        $feed_num=mysqli_num_rows($feedback_result);
                        ?>

                        <p><?php echo $feed_num?></p>

                        <?php ?>

                        </div>                 
                    </div>
   

                    
                </div>

            </div>


        </div>
    </body>
</html>


