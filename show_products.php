<?php
   require("connection.php");
    $id=$_GET['brandid'];
?>


<html>
    
    <head>
        <title>Main website</title>
        <link rel="stylesheet" href="Main.css">
    </head>
    <body>

    <!-- Header -->
    <?php
        require("header.php");
    ?>

    <div id="main-new-item"> 

        <?php $check=get_all_products($conn,$id);

        foreach($check as $list)
        {

        ?>

        <div class=new-item-container>

                <div id="new-item-image">
                
                <a href="user_product.php?id=<?php echo $list['p_id']; ?>">
                <img src="./image/<?php echo $list['image']; ?>" alt=""></a>
                    
                </div>

                <div id="new-item-content">
                
                <a style="color:white;" href="user_product.php?id=<?php echo $list['p_id']; ?>">
                <h3><?php echo $list['p_name']?></h3>
                <p><?php echo $list['price']?> <del><?php echo $list['mrp']?></del></p> </a>
                
                </div>
        </div> 

        <?php } ?>
    </div>



    <!-- Footer -->
    <?php
        require("footer.php");
    ?>



</body>
</html>