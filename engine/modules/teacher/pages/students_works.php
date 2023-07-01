<?php
    //======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================
    
    include("./engine/db/db_config.php");

    teacher_session();

    $stud_id = 0;
    if (isset($_GET['id'])){
        $stud_id = $_GET['id'];
    }
    $student_list = mysqli_query($link, "SELECT * FROM Users WHERE Status='student' AND UserId='".$stud_id."'" );
    $student_array = $student_list -> fetch_object();
    $student_name = $student_array -> Surname . " " . $student_array -> Firstname;
    $student_group = $student_array -> Groupname;

    $works_list = mysqli_query($link, "SELECT * FROM StudentWorks WHERE WorkOwnerId='".$stud_id."'");
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
        <title>Просмотр работ</title>
    </head>
    <body>
        <?php require("./engine/libs/core/php/dyheader.php"); ?>

        <section>
            <div class="container-fluid">
                <div class="row">
                    <?php require("./engine/modules/teacher/php/menu.php"); ?>

                    <div class="col-10">
                        <div class="row">
                            <div style="margin-top: -10px" class="col-12 return"><a
                                    href="index?page=teacher&sub=students&group=<?=$student_group?>">Вернуться
                                назад</a></div>
                            <div class="col-12 align-items-baseline">
                                <span style="padding-right: 30px" class="title-blue">Студент</span> <span class="title-black"><?=$student_name?></span>
                                <hr class="hr-blue">

                            </div>
                            <div class="container-fluid">
                                <table class="col-12 table table-hover table-blue">
                                    <tbody>
                                    <?php while($works_array = $works_list -> fetch_object()):?>
                                    <tr>
                                        <td><?=$works_array -> Date;?></td>
                                        <td><?=$works_array -> Subject;?></td>
                                        <td><?=$works_array -> Theme;?></td>
                                        <td>
                                            <?php if($works_array -> id_type == "test"):?>
                                                <a href="index?page=teacher&sub=work&id=<?=$works_array -> StudWorkId;?>" class= "btn-purple">Посмотреть</a>
                                            <?php else:?>
                                                <a href="<?=$works_array -> StudFileURL;?>" class= "btn-purple">Посмотреть</a>
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
        <script  src="./engine/modules/teacher/js/menu_selector_st.js"></script>
    </body>
    <?php require("./engine/libs/core/php/footer.php"); ?>
</html>