<?php

require("admin_connection.php");


if(isset($_POST['submit'])&& $_POST['submit']!='')
{   
    $p_name=get_safe_value($conn,$_POST['p_name']);
    $brand=get_safe_value($conn,$_POST['brand']);
    $mrp=get_safe_value($conn,$_POST['mrp']);
    $price=get_safe_value($conn,$_POST['price']);
    $qty=get_safe_value($conn,$_POST['qty']);
    $image=get_safe_value($conn,$_POST['image']);
    $s_desc=get_safe_value($conn,$_POST['s_desc']);
    $l_desc=get_safe_value($conn,$_POST['l_desc']);
    $specifation=get_safe_value($conn,$_POST['specification']);
    $features=get_safe_value($conn,$_POST['features']);
   
    $image_name=rand(11111111,99999999).'_'.$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    
    move_uploaded_file($tmp_name,'../image/'.$image_name);


    $sql="INSERT INTO `product` (`brand_id`, `p_name`, `mrp`, `price`, `qty`, `image`, `status`, `short_desc`, `long_desc`, `specification`, `features`) VALUES ( '$brand', '$p_name', '$mrp', '$price', '$qty', '$image_name', '1', '$s_desc', '$l_desc', '$specifation', '$features')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        header("Location: product.php?Product_inserted_successfully");
        exit;   
    }
    else{
        header("location: product.php?Product_already_exist");
    }

   
}

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
                    
                    <div class="info-header" style="background-color:#ce4444;">
                        <h3>Add Product</h3>
                    </div>

                    <div class="table-wrapper">
                        <div class="container"> 
                            <h1 style="text-align: center; font-family:Arial, Helvetica, sans-serif"></h1>
                            <form method="post" action="#" enctype="multipart/form-data">
                            <p>Product Name <input type="text" name="p_name"  required></p>
                            
                            <p>Brand name
                                
                                <select name="brand">
                                    <option  value="5131">Select card type</option>
                                    <?php
                                    $sql="SELECT id,brand FROM `brand`";
                                    $result=mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        echo "<option  value=".$row['id'].">".$row['brand']."</option>";

                                    }
                                    ?>     
                            </select>
                            
                            </p>

                            <p>Mrp<input type="text" name="mrp" placeholder="" required></p>
                            <p>Selling Price <input type="text" name="price" ></p>
                            
                            <p>Quantity <input type="text" name="qty" ></p>
                            
                            <p>Short Description <textarea  name="s_desc" cols="30" rows="6">
                            </textarea>
                            </p>
                            
                            <p>Long Description <textarea name="l_desc" cols="30" rows="6"></textarea>
                            
                            
                            </p>
                            
                            <p>Specifications <textarea name="specification" cols="30" rows="6"> </textarea></p>
                           
                            <p>Features<textarea name="features" cols="30" rows="6"></textarea></p>
                            
                            <p>Product Image <br><br> <input type="file" name="image"  ></p><br>
                                
                            <input type="submit" name="submit" value="Submit">
   
                            </form>
                        
                            </div>
                        </div>
                    </div>
                </div>

    </div>
    </body>
</html>

