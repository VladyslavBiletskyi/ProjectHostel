<?php
/**
 * Created by PhpStorm.
 * User: Татьяна
 * Date: 28.05.2016
 * Time: 14:11
 */
session_start();
//защита от попытки перехода на страницу без авторизации
if(!isset($_SESSION["login"]))
{
    header("Location: welcome.php");
    exit;
}
include 'functions.php';
require_once 'header.php';
?>

<? makeFooter(); ?>
