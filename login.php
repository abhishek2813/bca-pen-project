<html>

<head>
    <title>Home page</title>
    <link rel="stylesheet" href="Main.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-color: #f2f2f2;
            color: #414d53;
        }

        .container {
            border-radius: 5px;
            position: relative;
            padding: 17vh 25vw 18vh 25vw;
        }

        form p {
            padding: 10px;
            font-size: 18px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
        }


        input[type="submit"] {
            background-color: #32cd32;
            width: 100%;
            padding: 9px;
            font-size: 18px;
            color: white;
            border: 1px solid white;
            text-align: center;
        }

        input[type="submit"]:hover {
            cursor: pointer;
            background-color: #0ccf0e;
            border: 1px solid white;
        }

        #create_acc {
            text-align: center;
        }

        a {
            color: blue;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include("header.php");
    if (isset($_GET['error'])) {
        $errorText = $_GET['error'];
    } else {
        $errorText = ""; // No error initially
    }
    ?>
    <div class="container">

        <h1 style="text-align: center; font-family:sans-serif;">Login form </h1>
        <!-- Display the error message here -->
        <?php if (!empty($errorText)): ?>
            <div class="error-message">
                <?php echo $errorText; ?>
            </div>
        <?php endif; ?>
        <form action="database.php" method="post">

            <p>Email <input type="email" name="email" required></p>
            <p>Password <input type="password" name="upass"></p>
            <br>
            <p><input type="submit" name="login" value="Login"></p>
            <p id="create_acc"> New account ? <a href="register.php"> Create new account</a> </p>

        </form>
</body>

</html>