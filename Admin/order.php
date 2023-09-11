<?php

    require("admin_connection.php");

    $userId_sql="SELECT u_id FROM `users`";
    $user_result=mysqli_query($conn,$userId_sql);

?>

<html>
<head>
        <title>Index</title>
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
                    
                    <div class="info-header" style="display:flex; background-color: #099600;">
                        <h3>Order Details</h3>
                        <div class="info-header-button">
                        <span>
                        
                        </span>
                        </div>
                    </div>

                    <div class="table-wrapper" >
                     
                    <table class="table-data" style="width: 100%; padding: 15px;">
                                        
                        <thead>
                                            <tr id="sticky-row">
                                                <th>S.no</th>
                                                <th>Brand id</th>
                                                <th>Order id</th>
                                                <th>User id</th>
                                                <th>username</th>
                                                <th>Product name</th>
                                                <th>Email</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                
                                            </tr>
                        </thead>
                        <tbody>
                        <?php

                            $i=1;

                            while($user_row=mysqli_fetch_assoc($user_result))
                            {
                                $u_id=$user_row['u_id'];
                                $sql="SELECT * from `order_table$u_id`";
                                $result=mysqli_query($conn,$sql);

                                while($row=mysqli_fetch_assoc($result)){
                                ?>

                                <tr>
                                    <td> <?php echo $i++; ?> </td>
                                    <td>  <?php echo $row['brand_id'] ?>  </td>
                                    <td>  <?php echo $row['order_id']?>  </td>
                                    <td>  <?php echo $row['u_id'] ?>  </td>
                                    <td>  <?php echo $row['username'] ?>  </td>
                                    <td>  <?php echo $row['p_name']?>  </td>
                                    <td>  <?php echo $row['email'] ?>  </td>
                                    <td>  <?php echo $row['price'] ?>  </td>
                                    <td>
                                        <img style="width: 80px; height: 60px;" src="../image/<?php echo $row['image'] ?>" alt="" >   
                                    </td>
                                    
   
                                </tr>
                                    
                                <?php } 

                            }
                            ?> 
      
                        </tbody>
                        </table>
                            

                        </div> 
                     


                </div>
            </div>
        </div>
    </body>
</html>


