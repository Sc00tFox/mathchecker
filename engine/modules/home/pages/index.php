<?php
    //======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================
    
    $profile_address = NULL;
    $u_group = NULL;

    if ($_SESSION){
        $u_group = getUserGroup($_SESSION['u_id']);
        if($u_group == 1){
            $profile_address = "";
        }elseif($u_group == 2){
            $profile_address = "index?page=profile&id=" .$_SESSION['u_id'];
        }elseif($u_group == 3){
            $profile_address = "index?page=teacher&sub=work_verification";
        }
    }else{
        $profile_address = "index?page=login";
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
        <link rel="stylesheet" href="./engine/libs/core/css/index/main.css">
        <link rel="stylesheet" href="./engine/modules/home/css/style_of_index.css">
        <link rel="shortcut icon" href="./engine/images/index/favicon.ico" type="image/x-icon">
        <title>Mathchecker</title>
    </head>


    <body>
        <section class="slide-main">
            <?php require("./engine/libs/core/php/header.php"); ?>
            <br>
            <div class="slide-main__container">
                <div class="slide-main__container__box-welcome">
                    <div class="slide-main__container__box-welcome_title">
                        Система проверки работ студентов по математическим дисциплинам
                    </div>
                    <div class="slide-main__container__box-welcome_text">
                        Загрузите свою математическую работу и получите результаты уже сейчас!
                    </div>
                    <a class="btn-blue" href="<?=$profile_address;?>">Проверить</a>
                </div>
                <div class="slide-main__container__box-PMFI">
                    <img src="./engine/images/index/PMFI.svg" alt="PMFI logo">
                    <div class="slide-main__container__box-PMFI_description">
                        Эксклюзивно для кафедры
                    </div>
                </div>
            </div>
        </section>
        <hr class="slide__line">

        <section class="slide-1-bg clear-fix">
            <div class="slide slide-1">
                <div class="slide__box-text slide-1__box-text">
                    <h2 class="slide__box-text_title slide-1__box-text_title">
                        Проверять работы по математическим дисциплинам стало удобней!
                    </h2>
                    <div class="slide__box-text_text slide-1__box-text_text">
                        Наш сервис, разработанный специально для кафедры ПМиФИ ОмГТУ командой студентов, предоставляет доступ к загрузке работ студентов первого курса и получению моментальных результатов.
                    </div>
                </div>
                <img class="slide__img" src="./engine/modules/home/images/index_1.svg" alt="index_1">
            </div>
        </section>
        <hr class="slide__line">

        <section class="slide-2-bg clear-fix">
            <div class="slide slide-2">
                <div class="slide-2__box-subjects">
                    <h1>
                        Наш сервис работает с тремя дисциплинами
                    </h1>
                    <div class="slide-2__box-subjects_items">
                        <span class="slide-2__box-subjects_items_subject">Алгебра</span>
                        <span class="slide-2__box-subjects_items_subject">Дискретная математика</span>
                        <span class="slide-2__box-subjects_items_subject">Геометрия</span>
                    </div>
                </div>
                <div class="slide__box-text slide-2__box-text">
                    <h2 class="slide__box-text_title slide-2__box-text_title">
                        Незаменимый инструмент для преподавателя!
                    </h2>
                    <div class="slide__box-text_text slide-2__box-text_text">
                        Можно забыть про рутинный труд проверки однотипных математических работ. Вместе с Mathchecker Вы можете контролировать поток работ, быстро загружать задания для студентов, а также выставлять объективные оценки и баллы каждому студенту.
                    </div>
                </div>
                <img class="slide__img" src="./engine/modules/home/images/index_2.svg" alt="index_2">
            </div>
        </section>
        <hr class="slide__line">


        <section class="slide-3-bg">
            <div class="size-fix slide slide-3">
                <div class="slide-3__box-text">
                    <h2 class="slide__box-text_title slide-3__box-text_title">
                        Mathchecker больше, чем просто система, вот наши возможности
                    </h2>
                    <div class="slide__box-text_text slide-3__box-text_text">
                        <img class="slide-3__box-text_text_pic" src="./engine/modules/home/images/index_3.svg" alt="index_3">
                        <ul>
                            <li class="slide-3__box-text_text_items">Загрузка работ любой сложности</li>
                            <li class="slide-3__box-text_text_items">Решение тестов и контрольных</li>
                            <li class="slide-3__box-text_text_items">Только объективные оценки!</li>
                            <li class="slide-3__box-text_text_items-MC">Mathchecker проверит всё в считанные секунды и выставит результаты, предоставив всю информацию преподавателю!</li>
                        </ul>
                    </div>
                </div>
                <div class="clear-fix slide-3__box-fast-start">
                    <div class="slide-3__box-fast-start_items">
                        <div class="slide-3__box-fast-start_items_title">
                            Загрузите свою работу прямо сейчас!
                        </div>
                        <a href="<?=$profile_address;?>" class="btn-blue">Начать</a>
                    </div>
                </div>
            </div>
        </section>
        <?php require("./engine/libs/core/php/footer.php"); ?>
    </body>
</html>