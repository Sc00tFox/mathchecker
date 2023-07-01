<?php
    //======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================

    include("./engine/db/db_config.php");

    teacher_session();

    $work_id = 0;
    if (isset($_GET['id'])){
        $work_id = $_GET['id'];
    }

    $work_list = mysqli_query($link, "SELECT * FROM StudentWorks WHERE StudWorkId='".$work_id."'");
    $answer_items_list = mysqli_query($link, "SELECT * FROM AnsweredTestItems WHERE BaseWorkId='".$work_id."'");
    $work_array = $work_list -> fetch_object();
?>

<!doctype html>
<html lang="ru">
    <head>
        <!--    MEta-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--    Libs-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./engine/libs/bootstrap-4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="./engine/libs/fontawesome-5.13.0/css/all.min.css"> 
        <link rel="stylesheet" href="./engine/libs/MC-icon/MC-icon.css">
        <link rel="stylesheet" href="./engine/libs/core/css/profile/main.css">
        <link rel="shortcut icon" href="./engine/images/index/favicon.ico" type="image/x-icon">
        <title>Просмотр работы</title>
    </head>
    <body>
        <?php require("./engine/libs/core/php/dyheader.php"); ?>

        <section>
            <div class="container-fluid">
                <div class="row">
                    <?php require("./engine/modules/teacher/php/menu.php"); ?>

                    <div class="col-10">
                        <div class="container-fluid box-tests">
                            <div class="row white-box box-tests__box-title">
                                <div class="col-3 title-blue"><?=$work_array -> Subject;?></div>
                                <div class="col-8 grey-box"><?=$work_array -> Theme;?></div>

                                <div class="col-3 title-blue">Студент</div>
                                <div class="col-9 title-black"><?=$work_array -> StudentName;?></div>

                                <div class="col-12"><?=$work_array -> Description;?></div>

                                <?php if($work_array -> TeacherFileURL != NULL):?>
                                    <div class="col-12 box-file">
                                        <br>
                                        <a href="<?=$work_array -> TeacherFileURL;?>">Прикреплённое задание</a>
                                    </div>
                                <?php endif;?>
                            </div>

                            <?php if($work_array -> id_type == "test"):?>
                                <div class="row box-tests__box-test">
                                    <?php while($answer_items_array = $answer_items_list -> fetch_object()):?>
                                        <div class="col-12 box-tests__box-test__item">
                                            <br>
                                            <h3>Задание №<?=$answer_items_array -> QuNumber;?></h3>
                                            <p><?=$answer_items_array -> QuTitle;?></p>
                                            <div class="box-tests__box-test__item_box-answer">
                                                <p>Ответ:</p>
                                                <?php if($answer_items_array -> Answer == $answer_items_array -> CurrentAnswer):?>
                                                    <div class="blue-field text-success"><?=$answer_items_array -> Answer;?></div>
                                                <?php else:?>
                                                    <div class="blue-field text-danger"><?=$answer_items_array -> Answer;?></div>
                                                <?php endif;?>
                                                <div class="grey-box">
                                                    <p><?=$answer_items_array -> AnsList;?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;?>
                                </div>

                                <div class="row box-test__box-result">
                                    <span class="blue-box">
                                        <span>Результат теста: </span>
                                        <span><?=$work_array -> CurrAnsCount;?>/<?=$work_array -> QuCount;?></span>
                                    </span>
                                </div>
                            <?php endif;?>

                            <?php if($work_array -> StudFileURL != NULL):?>
                                <div class="row white-box box-file box-test__box-file">
                                    <a href="<?=$work_array -> StudFileURL;?>">Прикреплённое задание</a>
                                </div>
                            <?php endif;?>
                            <div class="row box-test__box-btn">
                                <a href="index?page=teacher&sub=work_verification&subject=<?=str_replace(' ', '_', $work_array -> Subject);?>" class="btn-blue">Вернуться назад</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="./engine/libs/bootstrap-4.4.1/js/jquery.min.js"></script>
        <script src="./engine/libs/bootstrap-4.4.1/js/popper.min.js"></script>
        <script src="./engine/libs/bootstrap-4.4.1/js/bootstrap.min.js"></script>
        <script src="./engine/modules/teacher/js/menu_selector_wv.js"></script>
    </body>
    <?php require("./engine/libs/core/php/footer.php"); ?>
</html>