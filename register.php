<?php
include 'functions.php';

if(isset($_POST['register']))
{
    $fio = $_POST['fio'];
    $email = $_POST['email'];
    $pas = $_POST['pas'];
    $pas2 = $_POST['pas2'];

    if($pas != $pas2) {
        echo "<script type = 'text/javascript'>alert('������ ������ ���������!')</script>";
        echo "<meta http-equiv = 'refresh' content = '0; url=admin.php' />";
        return;
    }
    $password = md5($pas2);
    queryMysql("INSERT INTO `User` (`pass`, `eMail`, `fio`) VALUES ('$password', '$email', '$fio')");

    $mess = "��� ���������������� � ������� Hostel System. �����: ".$email.", ������: ".$pas2."";

    mail($email, "��� ���������������� � �������", $mess);
    echo "<script type = 'text/javascript'>alert('����������!')</script>";
    echo "<meta http-equiv = 'refresh' content = '0; url=admin.php' />";
    //header("Location: ../editing.php#add_s");
}