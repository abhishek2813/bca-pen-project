<?php

    require("admin_connection.php");
    $sql="SELECT product.*,brand.brand FROM `product`,`brand`
    where product.brand_id=brand.id ";
    $result=mysqli_query($conn,$sql);

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
                    
                    <div class="info-header" style="display:flex; background-color: #f44336;">
                        <h3>Product Details</h3>
                        <div class="info-header-button">
                        <span>
                        <a href="add_product.php" >Add Product</a>
                        </span>
                        </div>
                    </div>

                    <div class="table-wrapper" >
                     
                    <table class="table-data" style="width: 100%; padding: 15px;">
                                        
                        <thead>
                                            <tr id="sticky-row">
                                                <th>S.no</th>
                                                <th>Id</th>
                                                <th>Product name</th>
                                                <th>Brand Name</th>
                                                <th>Mrp</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Erase</th>
                                            </tr>
                        </thead>
                                <tbody>
                                                <?php
                                                $i=1;
                                                while($row=mysqli_fetch_assoc($result)){
                                                ?>

                                                <tr>
                                                    <td> <?php echo $i++; ?> </td>
                                                    <td>  <?php echo $row['p_id']?>  </td>
                                                    <td>  <?php echo $row['p_name']?>  </td>
                                                    <td>  <?php echo $row['brand'] ?>  </td>
                                                    <td>  <?php echo $row['mrp'] ?>  </td>
                                                    <td>  <?php echo $row['price'] ?>  </td>
                                                    <td><img style="width: 80px; height: 60px;" src="../image/<?php echo $row['image'] ?>" alt="" >   </td>
                                                    <td >
                                                <?php
                                                if($row['status']==1)
                                                { 
                                                echo "<span class='brand-active'><a href='brand_query.php?ptype=status&operation=deactive&id=".$row['p_id']."'> Active</a></span>";
                                                }
                                                else{
                                                echo "<span class='brand-deactive'><a href='brand_query.php?ptype=status&operation=active&id=".$row['p_id']. "'>Deactivate</a></span>";
                                                }
                                                    
                                                    
                                                ?></td>

                                                <td>
                                                <?php  echo "<span class='brand-delete'><a href='brand_query.php?ptype=delete&id=".$row['p_id']."'>Delete</a></span>"; ?>
                                                </td>

                                                    
                                                </tr>
                                                    
                                            <?php }  ?> 
                                                
                                            
                                </tbody>
                        </table>
               
               
               
                        </div> 
                     


                </div>
            </div>
        </div>
    </body>
</html>


