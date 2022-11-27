<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <style type="text/css">
       :root {

            --blue: #1a2238;
            --purple: #9daaf2;
            --orange: #ff6a3d;
            --yellow: #f4db7d;
        }

        body {

            background-color: var(--blue);
            font-family: Lucida Console;
            color:white;
        }
        
        .boundary {

            padding-top: 5%;
            padding-bottom: 5%;
            padding-left: 20%;
            padding-right: 20%;

        }

        .title {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1 {
            text-align: center;
            background-color: var(--orange);
            border-style: outset;
            border-color: black;
            padding: 0.25% 1% 0.25%;
            color: white;
        }

        a {
            
            color: var(--purple);
        }

         a:hover {

            font-weight: bold;
            background-color: var(--orange);
            padding: 1% 2% 1%;
            text-justify: inter-word;
            border-style: outset;
            border-color: black;
            color: white;
        }

        button {
            padding: 5px;
            border-style: outset;
            border-color: black;
            background-color: white;
            font-family: Lucida Console;
        }

        button:hover {
            padding: 10px;
            background-color: var(--purple);
            color: white;
            border-color: white;
        }




    </style>

</head>

<body>

    <div class = "boundary">

       <div class = title>
            <h1> Avoid the Algorithm </h1>
        </div>

         <form action="login_backend.php" method="post">

            <h2>LOGIN</h2>

            <?php if (isset($_GET['error'])) { ?>

                <p class="error"><?php echo $_GET['error']; ?></p>

            <?php } ?>

            <label>Email:</label><br>

            <input type="text" name="email"><br>
            <br>

            <label>Password:</label><br>

            <input type="password" name="password" ><br> 
            <br>

            <button type="submit">Login</button>
            <br>

            <p>Don't have an account? <a href="user_subscription.php">Sign up now</a>.</p>

            <br>

            <p>Forgotten your login details? <a href="website/password_reset/password_reset.php">Reset password</a>.</p>


         </form>

     </div>

</body>

</html>