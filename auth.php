<?php
include 'functions.php';
//первым делом - запускаем сессию
session_start();
$_SESSION = array();

function CheckUser($login, $password) //проверяем,существует ли такой пользователь
{
    if($login == "" || $password == "") { return false; }
    $result1 = queryMysql("SELECT * FROM Admin WHERE login = '$login'");
    $result2 = queryMysql("SELECT * FROM User WHERE eMail = '$login'");

    $user_data1 = mysqli_fetch_array($result1); //результат - в массив
    $user_data2 = mysqli_fetch_array($result2); //результат - в массив
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
        //запоминаем пользователя и пароль
        $_SESSION["login"] = $auth_login;
        $_SESSION["password"] = $auth_pass;

        // перенаправляем на админскую страничку
        header("Location: admin.php");
        exit;

    }
    else
    {
        echo "<script type = 'text/javascript'>alert('Неверный логин или пароль!')</script>";
        //на главную
        echo "<meta http-equiv = 'refresh' content = '0; ../url=welcome.php' />";
    }


    ///////Нужно было для внесения данных в базу

    /* $login = $_POST['login'];
      $password = $_POST['password'];
      $hash = md5($password);
      queryMysql("INSERT INTO Admin(login, pass)".
          "VALUES ('$login', '$hash')");


  //возврат на страничку

      header("Location: index.php");*/
}
 ?>