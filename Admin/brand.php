<?php

    require("admin_connection.php");
    $sql="SELECT * FROM `brand` order by brand asc";
    $show_result=mysqli_query($conn,$sql);

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
                    
                    <div class="info-header" style="display:flex; background-color:  #0094b6; ">
                        <h3>Brand Details</h3>
                        <div class="info-header-button">
                            <span>
                                <a href="manage_brand.php?addbrand=1" style="background-color:#913a1b;">Add Brand</a>
                            </span>
                        </div>
                    </div>

                    <div class="table-wrapper" >
                            
                    <table class="table-data" style="width: 100%; padding: 15px;">
                                        
                        <thead>
                                    <tr id="sticky-row">
                                        <th>S.no</th>
                                        <th>Id</th>
                                        <th>Brand Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Operation</th>
                                        <th>Update</th>
                                    </tr>
                        </thead>
                        <tbody>
                                
                                <?php
                                $i=1;
                                while($row=mysqli_fetch_assoc($show_result))
                                {?>

                                <tr>
                                    <td> <?php echo $i++; ?> </td>
                                    <td>  <?php echo $row['id']?>  </td>
                                    <td>  <?php echo $row['brand'] ?>  </td>
                                    <td > <img src="../brand_image/<?php echo $row['image'] ?>" alt="" style="width:60px;">   </td>
                                    <td >
                                    <?php
                                        if($row['status']==1)
                                        { 
                                        echo "<span class='brand-active'><a href='brand_query.php?type=status&operation=deactive&id=".$row['id']."'> Active</a></span>";
                                        }
                                        else{
                                            echo "<span class='brand-deactive'><a href='brand_query.php?type=status&operation=active&id=".$row['id']. "'>Deactivate</a></span>";
                                        }
                                    
                                       
                                        ?> 
                                            
                                    </td>
                                    <td>
                                    <?php  echo "<span class='brand-delete'><a href='brand_query.php?type=delete&id=".$row['id']."'>Delete</a></span>"; ?>
                                    </td>

                                    <td>
                                    <?php echo "<span class='brand-edit'><a href='manage_brand.php?type=edit&id=".$row['id']."'>Edit</a></span>"; ?>
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


