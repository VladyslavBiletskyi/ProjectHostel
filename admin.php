<?php
/**
 * Created by PhpStorm.
 * User: Татьяна
 * Date: 28.05.2016
 * Time: 14:11
 */
require_once 'header.php';
//защита от попытки перехода на страницу без авторизации
if (!isset($_SESSION["login"])) {
    //header("Location: welcome.php");
    echo "<meta http-equiv='Refresh' content='0; URL=welcome.php'>";
    exit;
} else {
    echo <<<_ADMIN
<div class="container">
    <hr>
    <div class="jumbotron">
        <h2>Добро пожаловать, admin!</h2><br>
    </div>
    <hr>
    <div class="tabs">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab"> Регистрация</a></li>
            
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1">
                <br><br>
                <form class="form-horizontal" role="form" method="post" action="register.php"  enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="fio" class="col-sm-3 control-label">ФИО</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text"
                                   required placeholder="Фамильева Имя Отчествовна"
                                   id="fio" name="fio">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-3 control-label">E-mail</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="email"
                                   required placeholder="E-mail"
                                   id="email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pas" class="col-sm-3 control-label">Пароль</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="password"
                                   required placeholder="Пароль"
                                   id="pas" name="pas">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pas2" class="col-sm-3 control-label">Повторите</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="password"
                                   required placeholder="Пароль еще раз"
                                   id="pas2" name="pas2">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success" name="register"><i class="fa fa-share"></i> Зарегистрировать</button>
                            <button type="reset" class="btn btn-warning"><i class="fa fa-eraser"></i> Очистить</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="tab2">

            </div>
        </div>
    </div>
_ADMIN;
    makeFooter();
}
?>
