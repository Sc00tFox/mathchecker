<?php
    //======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================

    include("./engine/db/db_config.php");

    $stud_id = NULL;
    if (isset($_GET['id'])){
        $stud_id = $_GET['id'];
    }

    if(!$_SESSION){
        locationTo("index?page=home", 0);
    }else{
        $session_id = $_SESSION['u_id'];
        $u_group = getUserGroup($session_id);
        if($stud_id != $session_id){
            locationTo("index?page=home", 0);
        }
        if($u_group == 1 or $u_group == 3){
            locationTo("index?page=teacher&sub=work_verification", 0);
        }
    }

    $student_list = mysqli_query($link, "SELECT * FROM Users WHERE UserId='".$stud_id."'" );
    $student_array = $student_list -> fetch_object();
    $student_name = $student_array -> Surname . " " . $student_array -> Firstname;

    $pullworks_list = mysqli_query($link, "SELECT * FROM Works WHERE TargetGroupName='".$student_array -> Groupname."'");
    $studentworks_list = mysqli_query($link, "SELECT * FROM StudentWorks WHERE WorkOwnerId='".$stud_id."'");
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
        <title>Личный кабинет</title>
    </head>
    <body>
        <?php require("./engine/libs/core/php/dyheader.php"); ?>

        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 menu">
                        <div class="row">
                            <div class="col menu__box-user">
                                <div class="menu__box-user_role">
                                    Студент
                                </div>
                                <div class="menu__box-user_name">
                                    <?=$student_name;?>
                                </div>
                                <hr>
                            </div>
                        </div>

                        <div class="row menu__box-sections">
                            <a href="index?page=profile&id=<?=$stud_id;?>"
                               class="col-12 menu__box-sections_section-active">
                                <span><i class="fas fa-user"></i> Личный кабинет</span>
                            </a>
                            <a class="col-12 menu__box-sections_section">
                                <span><i class="fas fa-pencil-alt"></i> Выполнение заданий</span>
                            </a>
                        </div>
                    </div>


                    <div class="col-10">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-5 white-box user">
                                    <div class="row">
                                        <div class="col-12 title-black"><?=$student_name;?></div>

                                        <div class="col-2">Группа: </div> <div class="col-10"><?=$student_array -> Groupname;?></div>
                                        <div class="col-2">Почта: </div> <div class="co-10"><?=$student_array -> Email;?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <table class="col-12 table table-hover table-transparent text-center">
                                    <thead>
                                        <tr>
                                            <th>Преподаватель</th>
                                            <th>Предмет</th>
                                            <th>Тема</th>
                                            <th>Срок сдачи</th>
                                            <th>&nbsp;</th>
                                            <th>Статус</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($pullworks_array = $pullworks_list -> fetch_object()):?>
                                            <?php
                                                $check_list = mysqli_query($link, "SELECT * FROM StudentWorks WHERE BaseWorkId='".$pullworks_array -> WorkId."'");
                                                if($check_list -> num_rows == 0):
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php
                                                            $teacher_list = mysqli_query($link, "SELECT * FROM Users WHERE UserId='".$pullworks_array -> TeacherId."'" );
                                                            $teacher_array = $teacher_list -> fetch_object();
                                                            echo $teacher_array -> Surname . " " . $teacher_array -> Firstname;
                                                        ?>
                                                    </td>
                                                    <td><?=$pullworks_array -> Subject;?></td>
                                                    <td><?=$pullworks_array -> Theme;?></td>
                                                    <td><?=date("d.m.Y", strtotime($pullworks_array -> Date));?></td>
                                                    <td>
                                                        <a href="index?page=profile&sid=<?=$stud_id;?>&sub=enter_work&wid=<?=$pullworks_array -> WorkId;?>" class= "btn-purple">Выполнить</a>
                                                    </td>
                                                    <td>Выложено</td>
                                                    <td></td>
                                                </tr>
                                            <?php else:?>
                                                 <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Активных заданий нет</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td> 
                                                </tr>  
                                            <?php endif;?>
                                        <?php endwhile;?>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Преподаватель</th>
                                            <th>Предмет</th>
                                            <th>Тема</th>
                                            <th>Дата загрузки</th>
                                            <th>&nbsp;</th>
                                            <th>Статус</th>
                                            <th>Оценка</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($studentworks_array = $studentworks_list -> fetch_object()):?>
                                            <tr>
                                                <td>
                                                    <?php
                                                        $teacher_list = mysqli_query($link, "SELECT * FROM Users WHERE UserId='".$studentworks_array -> TeacherId."'" );
                                                        $teacher_array = $teacher_list -> fetch_object();
                                                        echo $teacher_array -> Surname . " " . $teacher_array -> Firstname;
                                                    ?>
                                                </td>
                                                <td><?=$studentworks_array -> Subject;?></td>
                                                <td><?=$studentworks_array -> Theme;?></td>
                                                <td><?=date("d.m.Y", strtotime($studentworks_array -> Date));?></td>
                                                <td></td>
                                                <td>
                                                    <?php if($studentworks_array -> Value):?>
                                                        Проверено
                                                    <?php else:?>
                                                        Загружено
                                                    <?php endif;?>
                                                </td>
                                                <td>
                                                    <?php if($studentworks_array -> Value):?>
                                                        <div class="blue-field"><?=$studentworks_array -> Value;?></div>
                                                    <?php endif;?>
                                                </td>
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
    </body>
</html>