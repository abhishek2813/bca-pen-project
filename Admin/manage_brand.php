<?php

require("admin_connection.php");

$brand_name='';
 
if(isset($_GET['id'])&& $_GET['id']!='')
{
    #Edit karte time brand ka name nikalne ke liye

    $id=get_safe_value($conn,$_GET['id']);
    $sql="select * from brand where id = $id";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    if($num>0)
    {
    $row=mysqli_fetch_assoc($result);
    $brand_name=$row['brand'];
    }
    else{
        header("Location: brand.php");
        exit;
    }
}


if(isset($_POST['submit'])&& $_POST['submit']!='')
{       
    #Ye edit insert karne ke liye

    $brand_name=get_safe_value($conn,$_POST['brand-name']);
    
    if(isset($_GET['id']) && $_GET['id']!='')
    {
    $update_sql="UPDATE `brand` SET `brand` = '$brand_name' WHERE `id` = $id";
    $result=mysqli_query($conn,$update_sql);
    header("Location: brand.php?Brand_update_successful");
    }
    else{

        #Ye image insert karne ke liye

        $image_name=rand(11111111,99999999).'_'.$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name,'../brand_image/'.$image_name);

        $sql="INSERT INTO `brand` (`brand`, `status`, `image`) VALUES ('$brand_name', '1', '$image_name');";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            header("Location: brand.php?Brand_inserted_successfully");
            exit;   
        }

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
                    
                    <div class="info-header" style="background-color:#e27f5b;">
                        <h3>Brand</h3>
 
                    </div>

                <div class="table-wrapper">
                    <div class="container"> 



            <?php if(isset($_GET['addbrand'])) { ?>

                        <h1 style="text-align: center; font-family:Arial, Helvetica, sans-serif">Brand Form</h1>
                        <form action="#" method="post" enctype="multipart/form-data">

                        <p>Enter Brand Name <input type="text" name="brand-name" placeholder="" required value="<?php echo $brand_name ?>"></p>
                        <p >Brand Image  <input type="file" name="image"  ></p>
                    
                        <br>
                        <input type="Submit" name="submit" value="Submit" style="background-color:#03a9f4;">
                        </form>
                            
            <?php }
            elseif(isset($_GET['type']))
                {?>

                        <h1 style="text-align: center; font-family:Arial, Helvetica, sans-serif">Brand Update Form</h1>
                        <form action="#" method="post">
                        
                        <p>Enter Brand Name <input type="text" name="brand-name" placeholder="" required value="<?php echo $brand_name ?>"></p>
                        
                        <br>
                        <input type="Submit" name="submit" value="Submit" style="background-color:#03a9f4;">
                        
                        </form>
                        <?php }?>


                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


