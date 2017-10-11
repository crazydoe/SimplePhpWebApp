<?php
session_start();

if(isset($_SESSION['is_logged']) && $_SESSION['is_logged'] == true) {
    header("Location:/main.php");
    exit();
}

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="UTF-8" />
	<title>Simple PHP Webapp</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="stylesheet" href="styles.css" type="text/css" />

</head>

<body>

        <ul>
            <li><a class="active" href="registration.php">Rejestracja</a></li>
        </ul>



    <div class="main_container">

        <div class="login">
            <h1>Logowanie</h1>
            <form action="login.php" method="post">
                Login:
                <input class="text_input" type="text" name="login" />
                <br />
                Hasło:
                <input class="text_input" type="password" name="passwd" />
                <br />
                <input  class="login_button" type="submit" value="ZALOGUJ" />
            </form>

            <div class="err_block">
                <?php
                if(isset($_SESSION["log_err"]))
                    echo $_SESSION['log_err'];
                ?>
            </div>
        </div>
    </div>
</body>
</html>