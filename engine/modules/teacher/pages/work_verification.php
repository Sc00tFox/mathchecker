<?php
    //======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================

    include("./engine/db/db_config.php");

    teacher_session();

    $subject_name = 0;
    if (isset($_GET['subject'])){
        $subject_name = $_GET['subject'];
    }

    $subjects_list = mysqli_query($link, "SELECT * FROM Subjects" );
    $works_list = mysqli_query($link, "SELECT * FROM StudentWorks WHERE Subject='".$subject_name."'");
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
        <title>Проверка работ</title>
    </head>
    <body>
        <?php require("./engine/libs/core/php/dyheader.php"); ?>

        <section>
            <div class="container-fluid">
                <div class="row">
                    <?php require("./engine/modules/teacher/php/menu.php"); ?>

                    <div class="col-2 options">
                        <div class="row">
                            <div class="col title-blue options__title">
                                <i class="fas fa-square-root-alt"></i> Дисциплины
                                <hr class="hr-blue">
                            </div>
                        </div>

                        <div class="row options__box-sections">
                            <?php while($subjects_array = $subjects_list -> fetch_object()):?>
                            <a href="index?page=teacher&sub=work_verification&subject=<?=str_replace(' ', '_', $subjects_array -> SubjectTitle);?>" id="<?=str_replace(' ', '_', $subjects_array -> SubjectTitle);?>" class="col-12 options__box-sections_section">
                                <?=$subjects_array -> SubjectTitle;?>
                            </a>
                            <?php endwhile;?>
                        </div>
                    </div>


                    <div class="col-8">
                        <div class="container-fluid">
                            <!-- <div class="row">
                                <div class="col-12 choice_theme white-box">
                                    <div class="row">
                                        <p class="col-12 title-blue">Выберите тему</p>

                                        <div class="col-4"><a href="#" class="white-switch">Вектора</a></div>
                                        <div class="col-4"><a href="#" class="white-switch-active">Итоговый тест</a></div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12 choice_date white-box">
                                    <div class="row">
                                        <p class="col-12 title-blue">Выберите дату</p>

                                        <div class="col-2"><a href="#" class="white-switch"> 01.03.2020</a></div>
                                        <div class="col-2"><a href="#" class="white-switch-active"> 14.04.2020</a></div>
                                    </div>
                                </div>
                            </div> -->


                            <div class="row">
                                <table class="col-12 table table-hover">
                                    <thead>
                                    <tr>
                                        <th style="padding-top: 25px" >Тема</th>
                                        <th style="padding-top: 25px" >Дата загрузки</th>
                                        <th style="padding-top: 25px" >Посмотреть работу</th>
                                        <th style="padding-top: 25px" >Студент/Группа</th>
                                        <th style="padding-top: 25px" >Результат</th>
                                        <th style="padding-top: 25px" >Оценка</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    	<?php while($works_array = $works_list -> fetch_object()):?>
		                                    <tr>
		                                        <td><?=$works_array -> Theme;?></td>
		                                        <td><?=$works_array -> Date;?></td>
		                                        <td>
                                                    <?php if($works_array -> id_type == "test"):?>
                                                        <a href="index?page=teacher&sub=work&id=<?=$works_array -> StudWorkId;?>" class= "btn-purple">Посмотреть</a>
                                                    <?php else:?>
                                                        <a href="<?=$works_array -> StudFileURL;?>" class= "btn-purple">Посмотреть</a>
                                                    <?php endif;?>
		                                        </td>
		                                        <td ><?=$works_array -> StudentName;?> / <?=$works_array -> StudGroup;?></td>
                                                <td ><?=$works_array -> CurrAnsCount;?> / <?=$works_array -> QuCount;?></td>
		                                        <td ><input class="blue-field" type="number" step="1" min="1" max="5"></td>
		                                    </tr>
                                    	<?php endwhile;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="./engine/libs/bootstrap-4.4.1/js/jquery.min.js"></script>
        <script src="./engine/libs/bootstrap-4.4.1/js/popper.min.js"></script>
        <script src="./engine/libs/bootstrap-4.4.1/js/bootstrap.min.js"></script>
        <script  src="./engine/modules/teacher/js/menu_selector_wv.js"></script>
        <script  src="./engine/modules/teacher/js/subject_menu_selector.js"></script>

        <div hidden class="subject_active" value="<?=$subject_name?>"></div>
    </body>
</html>