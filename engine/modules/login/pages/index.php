<?php
    //======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================
    
    include("./engine/db/db_config.php");

    if($_SESSION){
        locationTo("index?page=home", 0);
    }

    $email = 0;
    $password = 0;
    $result = 0;
    
    if(isset($_POST['submit']) and $_POST['submit']){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $result = logIn($email, $password);
    }
?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Сервис по проверки работ по математическим дисциплинам.">
        <meta name="keywords" content="Математика, Мат. анализ, Математический анализ, Дискретная математика, Геометрия, Чёрный кот.">
        <meta name="author" content="Team-9">
        <meta name="viewport"
              content="user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./engine/libs/bootstrap-4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="./engine/libs/core/css/index/main.css">
        <link rel="stylesheet" href="./engine/modules/login/css/style_of_login.css">
        <link rel="shortcut icon" href="./engine/images/index/favicon.ico" type="image/x-icon">
        <script src="./engine/libs/bootstrap-4.4.1/js/jquery.min.js"></script>
        <script src="./engine/libs/bootstrap-4.4.1/js/popper.min.js"></script>
        <script src="./engine/libs/bootstrap-4.4.1/js/bootstrap.min.js"></script>
        <script  src="./engine/modules/login/js/login.js"></script>
        <title>Авторизация</title>
    </head>


    <body>
       <div hidden class="login_result" value="<?=$result?>"></div>
        <?php require("./engine/libs/core/php/header.php"); ?>

        <section>
            <div class="container-grey">
                <div class="container-grey__title">
                    <h3 class="clear-fix">Добро пожаловать на страницу авторизации!</h3>
                </div>
                <div class="container-grey__box">
                    <img class="container-grey__box_icon" src="./engine/images/index/PMFI.svg" alt="PMFI">
                    <div class="container-grey__box_items clear-fix">
                        <h3>Введите свои данные:</h3>
                        <div class="container-grey__box_items_log">
                            <img src="./engine/modules/login/images/login_1.svg" alt=":)">
                            <form method="post">
                                <div class="clear-fix container-grey__box_items_input">
                                    <input required class="input" type="email" placeholder="E-Mail" autocomplete="on" name="email">
                                    <input required class="input" type="password" placeholder="Пароль" autocomplete="on" name="password">
                                    <input class="btn-blue" type="submit" name="submit" value="Войти"> 
                                </div>
                            </form>
                        </div>
                        <div class="container-grey__box_items_reg">
                            <span class="container-grey__box_items_note">Вас всё ещё нет в системе?</span>
                            <a class="btn-blue container-grey__box_items_btn-reg" href="index?page=registration">Регистрация</a>
                        </div>
                    </div>
                </div>
                <img class="" src="./engine/modules/login/images/login_2.svg" alt="pic">
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification_Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="border-radius: 15px">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel">Ошибка!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: red">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Неверно введён логин или пароль.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-blue" data-dismiss="modal" id="modal_ok_button">Окей</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php require("./engine/libs/core/php/footer.php"); ?>
</html>