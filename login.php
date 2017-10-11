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

        $query = "SELECT * FROM users WHERE login='$login' AND passwd='$passwd'";
        if($result = @$connection->query($query)){

            $numb_of_users = $result->num_rows;
            if($numb_of_users>0){
                $row = $result->fetch_assoc();
                $_SESSION['is_logged']=true;
                $_SESSION['user'] = $row["login"];
                $result->free_result();
                unset($_SESSION["log_err"]);
                    header("Location: main.php");
            }else{
                $_SESSION["log_err"] = '<span style="color:red"> Będny login lub hasło</span>';
                header('Location: index.php');
            }
        }
        $connection->close();
    }





?>