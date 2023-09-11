<?php
require("connection.php");

if(isset($_GET['task']) && $_GET['task']!='')
{
    $task= get_safe_value($conn,$_GET['task']);

    #product ki id
    $id=get_safe_value($conn,$_GET['id']);
    $u_id=$_SESSION['u_id'];
    
    # For adding items in cart  
    
    if($task=="add")
    {
 
        $sql="select * from product where p_id=$id";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num)
        {
            $row=mysqli_fetch_assoc($result);
            $p_name=$row['p_name'];
            $brand_id=$row['brand_id'];
            $price=$row['price'];
            $image=$row['image'];
          
            $new_sql="SELECT * from `cart$u_id` where `p_name`='$p_name'";
            $new_result=mysqli_query($conn,$new_sql);
            $new_num=mysqli_num_rows($new_result);

           if($new_num>0)
            {
               header("Location: index.php?Already_in_cart");
               exit;
            }
            else{

                $cart_sql="INSERT INTO `cart$u_id` (`p_id`, `p_name`, `brand_id`, `price`, `image`) VALUES ('$id', '$p_name', '$brand_id', '$price', '$image')";
                
                $cart_result=mysqli_query($conn,$cart_sql);
                if($cart_result)
                {
                    header("Location: cart.php?status_update");
                    exit;
                }

            }
            

        }

        
    }


       # For delete cart 
        
    if($task=="delete")
    {   
            $cart_id=get_safe_value($conn,$_GET['cart_id']);    
            $cart_delete="DELETE FROM `cart$u_id` WHERE `cart_id` = $cart_id";
            $delete_result=mysqli_query($conn,$cart_delete);
            if($delete_result)
            {
            header("Location: cart.php?Cart_deleted");
            exit;
            }
            else{
                header("Location: index.php?Delete_cart_query_error");
                exit;
            }   
    }

}
    

?>



   