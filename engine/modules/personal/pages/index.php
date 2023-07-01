<?php
    //======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================
    
    include("./engine/db/db_config.php");

    $p_key = 0;
    $result = 0;

    // Базовая проверка ключа    
    if(isset($_POST['submit']) and $_POST['submit']){
        $p_key = $_POST['p_key'];

        $key_list = mysqli_query($link, "SELECT * FROM PersonalKeys WHERE PKey='".$p_key."'" );

        if ($key_list -> num_rows != 0){
            $key_array = $key_list -> fetch_object();

            if($key_array -> PKeyStatus != 0){
                $key_address = md5($p_key);
                locationTo("index?page=personal&sub=regin&id=".$key_array -> PKeyId. "&key=".$key_address, 0);
            }else{
                $result = "error2";
            }
        }else{
            $result = "error1";
        }
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
        <script  src="./engine/modules/personal/js/personal.js"></script>
        <title>Персонал</title>
    </head>

    <body>
        <div hidden class="per_result" value="<?=$result?>"></div>
        <?php require("./engine/libs/core/php/header.php"); ?>

        <section>
            <div class="container-grey">
                <div class="container-grey__title">
                    <h3 class="clear-fix">Вы преподаватель или член команды Mathchecker?
                    Пройдите проверку персольного ключа и получите доступ для работы с системой!</h3>
                </div>
                <div class="container-grey__box">
                    <img class="container-grey__box_icon" src="./engine/images/index/PMFI.svg" alt="PMFI">
                    <div class="container-grey__box_items clear-fix">
                        <h3>Введите свой ключ:</h3>
                        <form method="post">
                            <div class="clear-fix">
                                <input required class="input" type="text" placeholder="Ключ" name = "p_key">
                            </div>
                            <input class="btn-blue container-grey__box_items_btn-reg" type="submit" name="submit" value="Проверка">
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