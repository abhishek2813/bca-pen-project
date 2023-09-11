<?php

    require("admin_connection.php");
    $sql="SELECT * FROM `users`order by username asc";
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
           require("./sidebar.php");
           ?>

           <div class="main-content">
                    
            <!-- admin header  -->
            <?php
                require("./admin_header.php");
            ?>   

            <div class="info">
                    
                <div class="info-header" style="display:flex; background-color:#2196f3;">
                    <h3>User Table</h3>
                        <div class="info-header-button">
                                <span></span>
                        </div>
                </div>

                <div class="table-wrapper" >
                        
                        <table class="table-data" style="width: 100%; padding: 15px;">
                                        
                            <thead>
                                <tr id="sticky-row">
                                    <th>S.no</th>
                                    <th>Id</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone no</th>
                                    <th>D_o_b</th>
                                    <th>Erase</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                $i=1;
                                while($row=mysqli_fetch_assoc($show_result))
                                {?>

                                    <tr>
                                        <td> <?php echo $i++; ?> </td>
                                        <td>  <?php echo $row['u_id']?>  </td>
                                        <td>  <?php echo $row['username'] ?>  </td>
                                        <td>  <?php echo $row['email'] ?>  </td>
                                        <td>  <?php echo $row['address'] ?>  </td>
                                        <td>  <?php echo $row['phone_no'] ?>  </td>
                                        <td>  <?php echo $row['d_o_b'] ?>  </td>
                                        <td>
                                    <?php  echo "<span class='brand-delete'><a href='brand_query.php?utype=delete&id=".$row['u_id']."'>Delete</a></span>"; ?>
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


