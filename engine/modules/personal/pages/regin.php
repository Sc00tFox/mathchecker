<?php
    //======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================
    
    require("./engine/modules/personal/php/functions.php");
    include("./engine/db/db_config.php");

    $key_id = NULL;
    if (isset($_GET['id'])){
        $key_id = $_GET['id'];
    }

    $key_t = NULL;
    if (isset($_GET['key'])){
        $key_t = $_GET['key'];
    }

    $curr = getCurrAddress();

    // Защита от несанкционированного прохода к странице ввода данных ключа 
    $checkkey_list = mysqli_query($link, "SELECT * FROM PersonalKeys WHERE PKeyId='".$key_id."'" );
    $checkkey_array = $checkkey_list -> fetch_object();

    if($key_t != md5($checkkey_array -> PKey)){
        locationTo("index?page=home", 0);
    }

    if($checkkey_array -> PKeyStatus == 0){
        locationTo("index?page=personal", 0);
    }

    // Регистрация пользователя
    $key_list = mysqli_query($link, "SELECT * FROM PersonalKeys WHERE PKeyId='".$key_id."'" );
    $key_array = $key_list -> fetch_object();

    $g_id = $key_array -> PUserGroup;
    $u_fname = $key_array -> PFName;
    $u_sname = $key_array -> PSName;

    $group_list = mysqli_query($link, "SELECT * FROM UserGroups WHERE UGroupld='".$g_id."'" );
    $group_array = $group_list -> fetch_object();

    $group_id = $group_array -> UGroupld;

    $result = 0;
    
    $email = 0;
    $password = 0;
    $password_v = 0;
    $u_status = 0;

    if($group_id == 1){
        $u_status = "admin";
    }elseif($group_id == 3){
        $u_status = "teacher";
    }

    if(isset($_POST['submit']) and $_POST['submit']){
        $email = $_POST['email'];
        $password = $_POST['password'] and md5($_POST['password']);
        $password_v = $_POST['password_v'] and md5($_POST['password_v']);

        $result = keyIn($key_id, $email, $u_fname, $u_sname, $password, $password_v, $group_id, $u_status);
    }
?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Сервис по проверки работ по математическим дисциплинам.">
        <meta name="keywords" content="Математика, Мат. анализ, Математический анализ, Дискретная математика, Геометрия, Чёрный кот.">
        <meta name="author" content="Team-9">
        <meta name="viewport" content=" user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./engine/libs/bootstrap-4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="./engine/libs/core/css/index/main.css">
        <link rel="stylesheet" href="./engine/modules/registration/css/style_of_registration.css">
        <link rel="shortcut icon" href="./engine/images/index/favicon.ico" type="image/x-icon">
        <script src="./engine/libs/bootstrap-4.4.1/js/jquery.min.js"></script>
        <script src="./engine/libs/bootstrap-4.4.1/js/popper.min.js"></script>
        <script src="./engine/libs/bootstrap-4.4.1/js/bootstrap.min.js"></script>
        <script  src="./engine/modules/personal/js/registration.js"></script>
        <title>Персонал</title>
    </head>

    <body>
        <div hidden class="per_result" value="<?=$result?>"></div>
        <div hidden class="curr" value="<?=$curr?>"></div>

        <?php require("./engine/libs/core/php/header.php"); ?>

        <section>
            <div class="container-grey">
                <div class="container-grey__title">
                    <h3 class="clear-fix">Никому не давайте ссылку на данную страницу!</h3>
                </div>
                <div class="container-grey__box">
                    <img class="container-grey__box_icon" src="./engine/images/index/PMFI.svg" alt="PMFI">
                    <div class="container-grey__box_items clear-fix">
                        <h3>Введите свои данные:</h3>
                        <form method="post">
                            <div class="clear-fix">
                                <input readonly class="input" type="text" placeholder="Имя" value="<?=$u_fname;?>">
                                <input readonly class="input" type="text" placeholder="Фамилия" value="<?=$u_sname;?>">
                                <input readonly class="input" type="text" placeholder="Группа пользователя" value="<?=$group_array -> UGroupName;?>">
                                <input required class="input" type="email" placeholder="E-Mail" name = "email">
                                <input required class="input" type="password" placeholder="Пароль" name = "password">
                                <input required class="input" type="password" placeholder="Повторите пароль" name = "password_v">
                            </div>
                            <input class="btn-blue container-grey__box_items_btn-reg" type="submit" name="submit" value="Применить">
                        </form>
                    </div>
                </div>
                <img class="" src="./engine/modules/registration/images/registration.svg" alt="pic">
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
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn-blue" data-dismiss="modal" id="modal_ok_button">Окей</button>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <?php require("./engine/libs/core/php/footer.php"); ?>
</html>