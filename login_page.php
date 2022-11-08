<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <style type="text/css">
        body {
        background-color: #1A4D2E;
    }

    form {
        font-family: Lucida Console;
        color: #FAF3E3;
        margin-top: min(10%, 100px);
        margin-left: min(10%, 100px);
    }

    form h2 {

        background-color: #000000;
        width: 80px;
        padding-left: 3px;
        padding-top: 2px;
        padding-bottom: 2px;
        border-style: outset;
    }

    form a {

        text-decoration:none;
        color: #000000;
        background-color:#FF9F29;
        height: 30px;
        width: 50px;
        padding: 5px;
        border-style: outset;
        border-color: #FAF3E3;
    }

    form a:hover {
        background-color: #FAF3E3;
        color: #000000;
        height: 30px;
        width: 50px;
        padding: 5px;

    }

    input {
        font-family: Lucida Console;
        color: #000000;
        width: 250px;
    }

    button {
        font-family: Lucida Console;
        color: #000000;
        padding: 5px;
        border-style: outset;
        border-color: #FAF3E3;
        background-color: #FF9F29;
    }

    button:hover {
        background-color: #FAF3E3;
        color: #000000;
    }

    h1 {
        margin-left: 50%;
        max-width: 179px;
        font-family: Lucida Console;
        background-color: #FAF3E3;
        padding: 5px 10px;
        position: center;
        margin-top: 50px;

    }





    </style>

</head>

<body>

    <h1>Avoid the Algorithm</h1>

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

     </form>

</body>

</html>