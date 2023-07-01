<?php
    //======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================
    
    include("./engine/db/db_config.php");

    if($_SESSION){
        locationTo("index?page=home", 0);
    }

    $group_list = mysqli_query($link, "SELECT * FROM StudentGroup" );

    $email = 0;
    $f_name = 0;
    $s_name = 0;
    $group = 0;
    $stud_id = 0;
    $password = 0;
    $password_v = 0;

    $result = 0;
        
    if(isset($_POST['submit']) and $_POST['submit']){
    	$value = getSetting("registration_module_status");
		if($value == 1){
			$email = $_POST['email'];
        	$f_name = $_POST['f_name'];
        	$s_name = $_POST['s_name'];
        	$group = $_POST['group'];
        	$stud_id = $_POST['stud_id'];
        	$password = $_POST['password'] and md5($_POST['password']);
        	$password_v = $_POST['password_v'] and md5($_POST['password_v']);
        	$result = regIn($email, $f_name, $s_name, $group, $stud_id, $password, $password_v, 2, 'student');
		}else{
			$result = "error3";
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
        <script  src="./engine/modules/registration/js/registration.js"></script>
        <title>Регистрация</title>
    </head>

    <body>
        <div hidden class="reg_result" value="<?=$result?>"></div>
        <?php require("./engine/libs/core/php/header.php"); ?>

        <section>
            <div class="container-grey">
                <div class="container-grey__title">
                    <h3 class="clear-fix">Пройдите простую регистрацию для работы с системой!</h3>
                </div>
                <div class="container-grey__box">
                    <img class="container-grey__box_icon" src="./engine/images/index/PMFI.svg" alt="PMFI">
                    <div class="container-grey__box_items clear-fix">
                        <h3>Введите свои данные:</h3>
                        <form method="post">
                            <div class="clear-fix">
                                <input required class="input" type="text" placeholder="Имя" name = "f_name">
                                <input required class="input" type="text" placeholder="Фамилия" name = "s_name">
                                <select required class="form-control input select" name="group">
                                    <option class="option" selected disabled value = "">Группа</option>
                                    <?php while($group_array = $group_list -> fetch_object()):?>
                                        <option class="option" value="<?=$group_array -> StudGroupTitle;?>"><?=$group_array -> StudGroupTitle;?></option>
                                    <?php endwhile;?>
                                </select>
                                <input required class="input" type="text" placeholder="Номер студ. билета" name = "stud_id">
                                <input required class="input" type="email" placeholder="E-Mail" name = "email">
                                <input required class="input" type="password" placeholder="Пароль" name = "password">
                                <input required class="input" type="password" placeholder="Повторите пароль" name = "password_v">
                            </div>
                            <input class="btn-blue container-grey__box_items_btn-reg" type="submit" name="submit" value="Регистрация">
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