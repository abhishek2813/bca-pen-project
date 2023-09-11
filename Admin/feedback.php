<?php

    require("admin_connection.php");
    $sql="SELECT * FROM `feedback` order by f_id desc";
    $show_result=mysqli_query($conn,$sql);

?>

<html>
    <head>
            <title>Feedback</title>
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
                    
                    <div class="info-header" style="display:flex; background-color: #673ab7">
                        <h3>Feedback queries</h3>
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
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Query</th>
                                                <th>Time</th>
                                                <th>Erase</th>
                                            </tr>
                        </thead>
                            <tbody id="f-data">
                                
                                <?php
                                $i=1;
                                while($row=mysqli_fetch_assoc($show_result))
                                {?>

                                <tr>
                                    <td> <?php echo $i++; ?> </td>
                                    <td>  <?php echo $row['f_id']?>  </td>
                                    <td>  <?php echo $row['email'] ?>  </td>
                                    <td>  <?php echo $row['subject'] ?>  </td>
                                    <td>  <?php echo $row['query'] ?>  </td>
                                    <td>  <?php echo $row['time'] ?>  </td>
                                    
                                    <td>
                                    <?php  echo "<span class='feedback-delete'><a href='brand_query.php?type=feed_delete&id=".$row['f_id']."'>Delete</a></span>"; ?>
                                    </td>

                                    
                                </tr>
                                    
                                <?php } ?> 
                                
                                            
                            </tbody>
                        </table>
                            
                            
               
                    </div> 

                </div>
            </div>
        </div>
    </body>
</html>
