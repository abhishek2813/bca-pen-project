<?php
require("connection.php");
        $u_id=$_SESSION['u_id'];
        $sql="select * from cart$u_id";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        $total=0;
        $count=0;    
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="Main.css">
    </head>
<body>

    <!-- Header section -->
    <?php
        require("header.php");
    ?>
  
 <main>

    
    <div id="cart-div">
    
        <table id="cart-table">
            <thead id="cart-head">
                <tr>
                    <th class="cart-pic">Products</th>
                    <th class="cart-name">Name </th>
                    <th class="cart-quantity">Quantity</th>
                    <th class="cart-subtotal">Brand</th>
                    <th class="cart-price">Total</th>
                    <th class="cart-remove">Remove</th>
                </tr>
            </thead>
            <tbody id="cart-body">
            <?php 
            while($row=mysqli_fetch_assoc($result)){
            ?>
                <tr>   
    
                    <?php
                    $count=$count+1;
                    ?>

                    <td><img src="./image/<?php echo $row['image'];?>" alt=""></td>
                    <td><?php echo $row['p_name'] ?></td>
                    <td>1</td>
                    <td><?php echo find_brand($conn,$row['brand_id']); ?></td>
                    <td>
                        Rs. <?php
                        echo $row['price']; 
                            $total=$total+$row['price'];
                        ?> 
                     </td>
                    <td>
                        <button style="background-color:red; padding:.5rem 1rem;">
                            <a href="cart_query.php?task=delete&cart_id=<?php echo $row['cart_id'];?>">Delete</a>
                        </button>
                        </td>
                </tr>
                <?php }  
                if($total==0)
                { ?>
                    <tr>
                    <td colspan=6><h1>Nothing to show</h1></td>
                    </tr>
                <?php }?>
            
            </tbody>
        </table>
                
            <div class="cart-button">
                <span style="padding:0em 4em; ">
                <h1 style="display:inline-block;">Total Price: </h1>
                <h2 style="display:inline-block; font-weight:100;"><?php echo $total;?></h2>
                </span>
                
                <?php
                if($total!=0)
                {?>
                  <a href="checkout.php?cart=1&total=<?php echo $total;?>&count=<?php echo $count;?>">
                <input type="submit" value="Buy"> 
                </a> 
                 
                <?php
                }else{
                ?>
                
                    <a href="index.php">
                    <input type="submit" value="Buy"> 
                    </a>
          
                <?php } ?>
                
            </div>
    </div> 

 </main>


 <!-- Footer section -->
 <?php
        require("footer.php");
    ?>

    
</body>
</html>