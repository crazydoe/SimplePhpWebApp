<?php
/**
 * Created by PhpStorm.
 * User: michal
 * Date: 09.08.2017
 * Time: 12:21
 */

session_start();

require_once  "connection.php";
$connection = @new mysqli($host, $db_user, $db_passwd, $db_name, $db_port);

if($connection->connect_errno!=0){
    echo "Error: ".$connection->connect_errno;
}else{

    $login = $_POST['login'];
    $passwd = $_POST['passwd'];
    $passwd_conf = $_POST['passwd_conf'];

    $query = "SELECT * FROM users WHERE login='$login'";
    if($result = @$connection->query($query)){

        $numb_of_users = $result->num_rows;
        if($numb_of_users>0 && $login!=""){
            $_SESSION['reg_err'] = '<span style="color:red">Login zajęty</span>';
            $result->free_result();
            header("Location: registration.php");
        }else{
            if($passwd == $passwd_conf && $passwd!="" && $login!=""){
                $query = "INSERT INTO `users` SET login='$login', passwd='$passwd'";
                if($result = @$connection->query($query)) {
                    unset($_SESSION['reg_err']);
                    $_SESSION['log_err'] = '<span style="color:white">ZAREJESTROWANO !</span>';
                    header("Location: index.php");
                }else{
                    $_SESSION['reg_err'] = '<span style="color:red">Błąd rejestracji</span>';
                    header("Location: registration.php");
                }
            }else{
                $_SESSION['reg_err'] = '<span style="color:red">Różne hasła lub puste pola</span>';
                header("Location: registration.php");
            }
        }
    }
    $connection->close();
}

