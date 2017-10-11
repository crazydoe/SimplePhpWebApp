<?php
/**
 * Created by PhpStorm.
 * User: michal
 * Date: 09.08.2017
 * Time: 13:30
 */
    session_start();
    session_unset();
    header('Location: index.php');

?>