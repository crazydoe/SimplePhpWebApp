<?php
session_start();
if(!isset($_SESSION['is_logged'])){
    header('Location:/index.php');
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
    <li><a class="active">
            <?php
            echo "Zalogowany: ".$_SESSION['user'];
            ?>

        </a></li>
    <li><a href="logout.php">Wyloguj</a></li>

</ul>



<div class="main_container">

    <b>INFORMACJE O SYSTEMIE: </b><br/><br/>
        <?php
        echo "<span style=\"color:white\">Nazwa systemu: </span>".php_uname('s')."<br/>";
        echo "<span style=\"color:white\">Nazwa hosta: </span>".php_uname('n')."<br/>";
        echo "<span style=\"color:white\">Nazwa wydania: </span>".php_uname('r')."<br/>";
        echo "<span style=\"color:white\">Informacje o wersji: </span>".php_uname('v')."<br/>";
        echo "<span style=\"color:white\">Typ sprzętu: </span>".php_uname('m');
        ?>


</div>
</body>
</html>