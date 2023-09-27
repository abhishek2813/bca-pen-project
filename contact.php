<?php  
require("connection.php"); 

if(isset($_POST['send']))
{
    $username=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

    $sql="INSERT INTO `feedback` (`email`, `subject`, `query`, `time`) VALUES ('$email', '$subject', '$message', current_timestamp())";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        $errorText = "Your feedback is succesfully sent";
    }
    else{
        $errorText = "Error Try Again";
    }
}

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

    <div id="top-pic-contact"></div>

    <div style="margin-top: 3em;">
        <h1 style=" margin-left: 1.5em; font-size: 3em;">Send us Feedback</h1>
    </div>
    <?php if (!empty($errorText)): ?>
            <div class="error-message">
                <?php echo $errorText; ?>
            </div>
        <?php endif; ?>
        <div class="form-container"> 
            <form method="post" action="#">

                <p><input type="text" name="name" placeholder="Name" required></p>
                <p><input type="email" name="email" placeholder="Email" required></p>
                <p><input type="text" name="subject" placeholder="Subject"></p>
                <p>
                    <textarea name="message" placeholder="Your Message" maxlength="200"></textarea>
                </p><br>
                <p>
                    <input type="submit" name="send" value="Send">
                </p>

            </form>
        </div> 
    
</main>

    <!-- Footer section -->
    <?php
        require("footer.php");
    ?>

</body>
</html>

