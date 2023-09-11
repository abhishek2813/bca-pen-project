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

    <main>
        <div id="header-pic"></div>
    </main>
    <div class="new-item-heading">
        <h1>New Arrivals</h1>
    </div>
    <div id="main-new-item">
        <?php
        $check = get_product_limit($conn, 3);
        foreach ($check as $list) {
            ?>
            <div class=new-item-container>
                <div id="new-item-image">
                    <a href="user_product.php?id=<?php echo $list['p_id']; ?>">
                        <img src="./image/<?php echo $list['image']; ?>" alt=""></a>
                </div>
                <div id="new-item-content">
                    <a style="color:white;" href="user_product.php?id=<?php echo $list['p_id']; ?>">
                        <p>
                            <?php echo $list['p_name'] ?>
                        </p>
                        <p>₹ <del>
                                <?php echo $list['mrp'] ?>
                            </del> ₹
                            <?php echo $list['price'] ?>
                        </p>
                    </a>
                </div>
            </div>

        <?php } ?>
    </div>

    <!-- If best product is exist then show Best seller div -->
    <?php
    $check = get_best_product($conn);
    if ($check) { ?>
        <div class="new-item-heading">
            <h1>Best Seller</h1>
            <p>But I must explain to you how all this mistaken idea</p>
        </div>
        <?php
    }
    ?>


    <div id="main-new-item">

        <?php
        $check = get_best_product($conn);
        foreach ($check as $list) {
            ?>

            <div class=new-item-container>

                <div id="new-item-image">
                    <a href="user_product.php?id=<?php echo $list['p_id']; ?>">
                        <img src="./image/<?php echo $list['image']; ?>" alt=""></a>
                </div>

                <div id="new-item-content">

                    <a style="color:white;" href="user_product.php?id=<?php echo $list['p_id']; ?>">
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

    <div class="new-item-heading">
        <h1>All Luxury Pen</h1>
    </div>

    <div id="main-new-item">

        <?php $check = get_product($conn, 'latest');

        foreach ($check as $list) {

            ?>

            <div class=new-item-container>

                <div id="new-item-image">

                    <a href="user_product.php?id=<?php echo $list['p_id']; ?>">
                        <img src="./image/<?php echo $list['image']; ?>" alt=""></a>

                </div>

                <div id="new-item-content">

                    <a style="color:white;" href="user_product.php?id=<?php echo $list['p_id']; ?>">
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



    <!-- Footer section -->
    <?php
    require("footer.php");
    ?>

</body>

</html>