<header class="flex-container">

<div class="flex-item"  id="flex-item-1">
    <img id="logo" src="./cards_images/logo1.png" alt="" width="50%">

</div>

<nav class="flex-item"  id="flex-item-2">
    <?php 
    if(isset($_SESSION["loggedin"])){  ?>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="user_brand.php">Brand</a></li>
    <li><a href="cart.php">Cart</a></li>
    <li><a href="user_order.php">Orders</a></li>
    <li><a href="user_profile.php">Profile</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="logout.php">Logout</a></li>
    </ul>
   <?php }else{ ?>
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="user_brand.php">Brand</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="register.php">Register</a></li>
    </ul>
   <?php } ?>
</nav>

<div class="flex-item" id="flex-item-3"></div>

</header>