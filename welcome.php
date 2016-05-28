<?php require_once 'header.php'; ?>

<div class="container">
    <hr>
    <div class="jumbotron" id="jumb">
        <h2>Добро пожаловать в HostelSystem!</h2><br>
        <p>В данной системе Вы можете выбрать и забронировать место в общежитии.</p>
        <p>Чтобы просматривать материалы системы, авторизуйтесь или отправьте заявку на регистрацию модератору (форма ниже).</p>
        <p>После рассмотрения заявки уведомление придет Вам на указанный e-mail.</p>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <h4>Войти: </h4>
        </div>
        <div class="col-sm-9">
            <form class="form-inline" role="form" method="post" action="php/login.php">
                <div class="form-group">
                    <input type="text" class="form-control" id="login" name="login" required placeholder="Ваш логин">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Ваш пароль">
                </div>
                <button type="submit" class="btn btn-success" name="submit_btn">Авторизация</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-2">
            <h4>Заявка на регистрацию</h4>
        </div>
        <div class="col-sm-10">
            <form class="form-horizontal" role="form" method="post" action="sendRequest.php"  enctype='multipart/form-data'>
                <!--<div class="form-group">
                    <label for="login" class="col-sm-3 control-label">Ваш логин</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text"
                               required placeholder="Логин"
                               id="login" name="login">
                    </div>
                </div>-->
                <div class="form-group">
                    <label for="fio" class="col-sm-3 control-label">Вашe ФИО</label>
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
                <!--<div class="form-group">
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
                -->
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                <div class="form-group">
                    <label for="pic" class="col-sm-3 control-label">Скан квитанции</label>
                    <div class="col-sm-9">
                        <input type="file"
                               required accept="image/*"
                               id=pic" name="pic">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-success" name="sendreq"><i class="fa fa-share"></i> Отправить заявку</button>
                        <button type="reset" class="btn btn-warning"><i class="fa fa-eraser"></i> Очистить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php makeFooter(); ?>
