<?php
include 'functions.php';
//������ ����� - ��������� ������
session_start();
$_SESSION = array();

function CheckUser($login, $password) //���������,���������� �� ����� ������������
{
    if($login == "" || $password == "") { return false; }
    $result1 = queryMysql("SELECT * FROM Admin WHERE login = '$login'");
    $result2 = queryMysql("SELECT * FROM User WHERE eMail = '$login'");

    $user_data1 = mysqli_fetch_array($result1); //��������� - � ������
    $user_data2 = mysqli_fetch_array($result2); //��������� - � ������
    if($user_data1[0] == "" && $user_data2 == "")
    {
        return false;
    }
    if($user_data1 != "") {
        if ($user_data1["pass"] != $password) {
            return false;
        }
        return true;
    }
    if($user_data2 != "") {
        if ($user_data2["pass"] != $password) {
            return false;
        }
        return true;
    }
}

if( isset( $_POST["submit_btn"] ) )
{
    $auth_login = $_POST["login"];
    $auth_pass = $_POST["password"];

    if(CheckUser($auth_login, md5($auth_pass)) == true)
    {
        //���������� ������������ � ������
        $_SESSION["login"] = $auth_login;
        $_SESSION["password"] = $auth_pass;

        // �������������� �� ��������� ���������
        header("Location: index.php");
        exit;

    }
    else
    {
        echo "<script type = 'text/javascript'>alert('�������� ����� ��� ������!')</script>";
        //�� �������
        echo "<meta http-equiv = 'refresh' content = '0; ../url=admin.php' />";
    }


    ///////����� ���� ��� �������� ������ � ����

    /* $login = $_POST['login'];
      $password = $_POST['password'];
      $hash = md5($password);
      queryMysql("INSERT INTO Admin(login, pass)".
          "VALUES ('$login', '$hash')");


  //������� �� ���������

      header("Location: index.php");*/
}
 ?>