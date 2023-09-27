<?php
require("connection.php");

$id = $_GET['id'];
$sql = "select * from product where p_id=$id";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

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


    <main>

        <div class="supreme-product">

            <div class="product-container">
                <?php

                if ($num) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                        <div class="product-image">
                            <img src="./image/<?php echo $row['image']; ?>" alt="">
                        </div>

                        <div class="product-desc">


                            <h1>
                                <?php echo $row['p_name'] ?>
                            </h1>

                            <p>
                                <?php echo $row['long_desc']; ?>
                            </p>

                            <p>Availability:
                                <?php
                                $status = $row['status'];
                                if ($status == '1') {
                                    echo "In stock";
                                } else {
                                    echo "Out of stock";
                                }
                                ?>
                            </p>

                            <p>Brand:
                                <?php echo find_brand($conn, $row['brand_id']); ?>
                            </p><br>

                            <h2>Price: ₹
                                <?php echo $row['price']; ?>
                            </h2><br>
                            <p>
                                <?php
                                if (isset($_SESSION["loggedin"])) { ?>
                                    <a href="cart_query.php?task=add&id=<?php echo $row['p_id']; ?>">
                                        <input type="submit" name="" value="Add to Cart">
                                    </a>

                                    <a href="checkout.php?buy_item=1&id=<?php echo $row['p_id']; ?>">
                                        <input type="submit" name="" value="Buy">
                                    </a>
                                    <?php }else{ ?>
                                        <a href="login.php">
                                        <input type="submit" name="" value="Login For Cart">  
                                    </a>
                                <?php } ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="product-down">

                    <div class="product-down-inside">

                        <h1>Description</h1><br>
                        <p>
                            <?php echo $row['short_desc']; ?>
                        </p>

                        <h1>Specifications</h1><br>
                        <p>
                            <?php echo $row['specification']; ?>
                        </p>

                        <h1>Delivery</h1><br>
                        <p>We only provide cash on delivery on every items. Our main motive is to earn customer trust first .Our
                            project is on first phase so we could include other payment options. </p>


                    </div>


                <?php
                    }
                } else {
                    header("Location: index.php?");
                }
                ?>

        </div>

        <div class="new-item-heading">
            <h1>New Arrivals</h1>
        </div>


        <div id="main-new-item">

            <?php $check = get_rand_product($conn, 3);
            foreach ($check as $list) {
                ?>

                <div class=new-item-container>

                    <div id="new-item-image">
                        <a href="user_product.php?id=<?php echo $list['p_id']; ?>">
                            <img src="./image/<?php echo $list['image']; ?>" alt=""></a>
                    </div>
                    <div id="new-item-content">
                        <a href="user_product.php?id=<?php echo $list['p_id']; ?>">
                            <h3>
                                <?php echo $list['p_name'] ?>
                            </h3>
                            <p>
                                <?php echo $list['price'] ?> <del>
                                    <?php echo $list['mrp'] ?>
                                </del>
                            </p>
                        </a>
                    </div>

                </div>

            <?php } ?>
        </div>




    </main>

    <!-- Footer section -->
    <?php
    require("footer.php");
    ?>


</body>

</html>