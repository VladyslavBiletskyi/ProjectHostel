<?php
/**
 * Created by PhpStorm.
 * User: �������
 * Date: 28.05.2016
 * Time: 14:11
 */
session_start();
//������ �� ������� �������� �� �������� ��� �����������
if(!isset($_SESSION["login"]))
{
    header("Location: welcome.php");
    exit;
}
include 'functions.php';
require_once 'header.php';
?>

<? makeFooter(); ?>
