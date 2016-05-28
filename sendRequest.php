<?php
/**
 * Created by PhpStorm.
 * User: Татьяна
 * Date: 28.05.2016
 * Time: 0:07
 */
require_once 'functions.php';
if( isset( $_POST["sendreq"] ) ) {
    $fio = $_POST["fio"];
    $email = $_POST["email"];

    $file = $_FILES['pic']['name'];
    $imgpath = "img/";
    copy($_FILES['pic']['tmp_name'], $imgpath.basename($_FILES['pic']['name']));
    $short_path = substr($imgpath, strlen($imgpath)-4, 4);
    $short_path = $short_path.$_FILES['pic']['name'];

    $mailFrom = "hostelsystemhelper@gmail.com";
    $mailTo = "project_hostel@mail.ru"; // кому
    $subject = "New request"; // тема письма
    $message = "ФИО: " . $fio . " ; E-mail: " . $email; // текст письма
    //$r = sendMailAttachment($mailTo, $mailFrom, $subject, $message, $short_path); // отправка письма c вложением
    sendMail($mailTo, $mailFrom, "New request", $message, $short_path);

}


