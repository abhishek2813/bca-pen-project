<?php

   require("connection.php");

?>


<html>

    <head>
        <title>Main website</title>
        <link rel="stylesheet" href="Main.css">
    </head>

<body>

    <!-- Header section -->
    <?php
        require("header.php");
    ?>

    <div id="brand-item"> 
        
        <?php  
        $check=get_brand($conn);
        foreach($check as $list)
        {
        ?>
        <div class=brand-item-container>
        
            <div id="brand-item-image">
                <a href="show_products.php?brandid=<?php echo $list['id']; ?>">
                    <img src="./brand_image/<?php echo $list['image']; ?>" alt="Brand list">
                </a>
            </div>

            <div id="brand-item-content">    
            <h3><?php echo $list['brand']?> </h3>
            </div>
        </div> 
    
        <?php  } ?>

    </div>




 <!-- Footer section -->
 <?php
        require("footer.php");
    ?>

</body>
</html>