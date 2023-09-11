<?php
 require("admin_connection.php");


if(isset($_GET['type']) && $_GET['type']!='')
{
    $type= get_safe_value($conn,$_GET['type']);
    $id=get_safe_value($conn,$_GET['id']);
    
    # For activate and deactive of brand status
    
    if($type=="status")
    {
            $operation=get_safe_value($conn,$_GET['operation']);
            $status='';

            if($operation=='active')
            {
                $status='1';
            }
            else{
                $status='0';
            }
            
            $brand_status="update brand set status = '$status' where  id='$id'";
            
            $status_result=mysqli_query($conn,$brand_status);
            if($status_result)
            {
                $product_status="UPDATE product SET `status` = '$status' WHERE `product`.`brand_id` = '$id'";
                $product_status_result=mysqli_query($conn,$product_status);
                if( $product_status_result)
                {
                header("Location: brand.php?status_update");
                exit;
                
                }else{
                    header("Location: brand.php?Product_status_not_changed");
                }
            }
        }
        
        # For delete brand 
        
        if($type=="delete")
        {   
            //To delete image from image folder we fetch image name from database
            $file_query="SELECT image from brand where id= '$id'";
            $file_result=mysqli_query($conn,$file_query);

            $brand_delete="delete from brand where id = '$id'";
            $delete_result=mysqli_query($conn,$brand_delete);
            if($delete_result)
            {
                //Fetch value of file_result object which is only image name
                $row = mysqli_fetch_array($file_result);
                $files="../brand_image/$row[0]";
                unlink($files); //Delete file

                header("Location: brand.php?Brand_deleted");
            exit;
        }
        else{
            header("Location: brand.php?Delete_query_error");
            exit;
        }
        
        }
    

    # For delete feedback
   
    if($type=="feed_delete")
    {   
        $feedback_delete="delete from feedback where f_id = '$id'";
        $delete_result=mysqli_query($conn,$feedback_delete);
        if($delete_result)
        {
        header("Location: feedback.php?Feedback_deleted");
        exit;
    }
    else{
        header("Location: feedback.php?Delete_query_Error");
        exit;
    }
    
    }
   
}
    
    
    
        
    if(isset($_GET['ptype']) && $_GET['ptype']!='')
    {
        $type= get_safe_value($conn,$_GET['ptype']);
        $id=get_safe_value($conn,$_GET['id']);
        
        # For activate and deactive of brand status / product status
        
            if($type=="status")
            {
                $operation=get_safe_value($conn,$_GET['operation']);
                $status='';
                if($operation=='active')
                {
                    $status='1';
                }
                else{
                    $status='0';
                }
                
                $brand_status="UPDATE `product` SET `status` = '$status' WHERE `product`.`p_id` = $id";
                $status_result=mysqli_query($conn,$brand_status);
                if($status_result)
                {
                    header("Location: product.php?status_update");
                    exit;
                }
            }
            
            # For delete brand 
            
            if($type=="delete")
            {   
                //To delete image from image folder we fetch image name from database
                $file_query="select image from product where p_id= '$id'";
                $file_result=mysqli_query($conn,$file_query);

                //Select product with product id to delete
                $brand_delete="delete from product where p_id = '$id'";
                $delete_result=mysqli_query($conn,$brand_delete);
                if($delete_result)
                {
                    //Fetch value of file_result object which is only image name
                    $row = mysqli_fetch_array($file_result);
                    $files="../image/$row[0]";
                    unlink($files); //Delete file

                header("Location:product.php?Product_deleted");
                exit;
                }
                else{
                header("Location: product.php?Delete_query_error");
                exit;
                }
            
            }
        
    

        }
 
                
    if(isset($_GET['utype']) && $_GET['utype']!='')
    {
        $type= get_safe_value($conn,$_GET['utype']);
        $id=get_safe_value($conn,$_GET['id']);
        
            # For delete user
            
            if($type=="delete")
            {   
                $brand_delete="delete from users where u_id = '$id'";
                $delete_result=mysqli_query($conn,$brand_delete);
                if($delete_result)
                {

                $cart_delete="DROP TABLE `cart$id`";
                $cart_delete_result=mysqli_query($conn,$cart_delete);
                    if($cart_delete_result)
                    {

                        $order_delete_sql="DROP TABLE `order_table$id`";
                        $order_delete_result=mysqli_query($conn,$order_delete_sql);
                        if($cart_delete_result)
                        {header("Location: Index.php?User_deleted");
                            exit;

                        }else{
                            header("location: Index.php?Order_table_delete_error");
                            exit;
                        }

                    
                    }else{
                        header("location: Index.php?Cart_table_delete_error");
                        exit;
                    }
                }
                else{
                header("Location: Index.php?Delete_query_error");
                exit;
                }
            
            }
        


}
    
    
    

?>



   