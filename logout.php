<?php
//выход
session_start();

if(isset($_POST["exit"]))
{
    //очищаем сессию,перенаправляемся на главную
    unset($_SESSION["login"]);
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    session_destroy();
    header("Location: welcome.php");
}

?>