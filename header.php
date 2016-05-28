<?php
session_start();
require_once 'functions.php';
echo <<<_END
  <!DOCTYPE html>
    <html lang="ru">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Helper</title>
    <!-- Bootstrap -->
    <script src="js/jquery.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--    <link href="css/bootstrap-theme.css" rel="stylesheet">-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you query the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/bootstrap.js"></script>
    </head>
_END;
echo <<<_END
    <body>
    <div class="navbar navbar-inverse navbar-static-top">
        <div class="container container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                    <span class="sr-only">Открыть навигацию</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/index.php">Helper</a>
            </div>
            <div class="collapse navbar-collapse" id="responsive-menu">
                <ul class="nav navbar-nav">
                    <li><a href="about.php">О системе</a></li>
                    <li><a href="contact.php">Контакты</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
_END;

if (!isset($_SESSION['login']))
    echo "<li><a href=\"welcome.php\">Войти</a></li>";
else
    echo "<li><a href=\"index.php\">Выход</a></li>\n";

echo <<<_END
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
_END;
?>
