<?php
include 'functions.php';

function CheckUserOrAdmin($login, $password) //проверяем,существует ли такой пользователь
{
    if($login == "" || $password == "") { return "empty"; }
    $result1 = queryMysql("SELECT * FROM Admin WHERE login = '$login'");
    $result2 = queryMysql("SELECT * FROM User WHERE eMail = '$login'");

    $user_data1 = mysqli_fetch_array($result1); //результат - в массив
    $user_data2 = mysqli_fetch_array($result2); //результат - в массив
    if($user_data1[0] == "" && $user_data2 == "")
    {
        return "empty";
    }
    if($user_data1 != "") {
        if ($user_data1["pass"] != $password) {
            return "empty";
        }
        return "admin";
    }
    if($user_data2 != "") {
        if ($user_data2["pass"] != $password) {
            return "empty";
        }
        return "user";
    }
    return "empty";
}

if( isset( $_POST["submit_btn"] ) )
{
    $auth_login = $_POST["login"];
    $auth_pass = $_POST["password"];
    $check = CheckUserOrAdmin($auth_login, md5($auth_pass));
    if( $check!= "empty")
    {
        if($check == "admin") {    //запоминаем пользователя и пароль
            $auth_login = $_POST["login"];
            $auth_pass = $_POST["password"];
            $_SESSION["login"] = $auth_login;
            $_SESSION["password"] = $auth_pass;

            // перенаправляем на админскую страничку
            header("Location: admin.php");
            exit;
        }
        else
        {
            $_SESSION["email"] = $auth_login;
            $_SESSION["password"] = $auth_pass;

            // перенаправляем на админскую страничку
            header("Location: index.php");
            exit;
        }

    }
    else
    {
        echo "<script type = 'text/javascript'>alert('Неверный логин или пароль!')</script>";
        //на главную
        echo "<meta http-equiv = 'refresh' content = '0; url=welcome.php' />";
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