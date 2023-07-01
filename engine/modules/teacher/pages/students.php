<?php
	//======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================
    
	include("./engine/db/db_config.php");

	teacher_session();

	$group_name = 0;
	if (isset($_GET['group'])){
		$group_name = $_GET['group'];
	}

	$stud_list = mysqli_query($link, "SELECT * FROM Users WHERE Status='student' AND Groupname='".$group_name."'" );

	// if ($group_name == NULL){
	// 	$stud_list = mysqli_query($link, "SELECT * From Users where Status='student'" );
	// }else{
	// 	$stud_list = mysqli_query($link, "SELECT * From Users where Status='student' AND Groupname='".$group_name."'" );
	// }
	
	$group_list = mysqli_query($link, "SELECT * FROM StudentGroup" );
?>

<!doctype html>
<html lang="ru">
	<head>
	<!--    MEta-->
	    <meta charset="UTF-8">
	    <meta name="description" content="Сервис по проверки работ по математическим дисциплинам.">
	    <meta name="keywords" content="Математика, Мат. анализ, Математический анализ, Дискретная математика, Геометрия, Чёрный кот.">
	    <meta name="author" content="Team-9">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--    Libs-->
	    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
	    <link rel="stylesheet" href="./engine/libs/bootstrap-4.4.1/css/bootstrap.min.css">
	    <link rel="stylesheet" href="./engine/libs/fontawesome-5.13.0/css/all.min.css">
	    <link rel="stylesheet" href="./engine/libs/MC-icon/MC-icon.css">
	    <link rel="stylesheet" href="./engine/libs/core/css/profile/main.css">
	    <link rel="shortcut icon" href="./engine/images/index/favicon.ico" type="image/x-icon">
	    <title>Список студентов</title>
	</head>
	<body>
		<?php require("./engine/libs/core/php/dyheader.php"); ?>

		<section>
		    <div class="container-fluid">
		        <div class="row">
		            <?php require("./engine/modules/teacher/php/menu.php"); ?>

		            <div class="col-2 options">
		                <div class="row">
		                    <div class="col  title-blue options__title">
		                        <i class="fas fa-users"></i> Группы
		                        <hr class="hr-blue">
		                    </div>
		                </div>

		                <div class="row options__box-sections">
		                	<?php while($group_array = $group_list -> fetch_object()):?>
		                		<a href="index?page=teacher&sub=students&group=<?=$group_array -> StudGroupTitle?>" id="<?=$group_array -> StudGroupTitle?>" class="col-12 options__box-sections_section"><?=$group_array -> StudGroupTitle?></a>
		                	<?php endwhile;?>
		                </div>
		            </div>


		            <div class="col-8">
		               <div class="row">
		                   <table class="col-12 table table-hover table-transparent">
		                       <thead>
		                           <tr>
		                               <th style="padding-top: 45px" >Номер</th>
		                               <th style="padding-top: 45px" >Студент</th>
		                               <th style="padding-top: 45px" >Работы студента</th>
		                           </tr>
		                       </thead>
		                       <tbody>
		                           <?php while($stud_array = $stud_list -> fetch_object()):?>
		                           <tr>
		                               <td ><?=$stud_array -> UserId;?></td>
		                               <td ><?=$stud_array -> Surname . " " . $stud_array -> Firstname;?></td>
		                               <td>
		                                   <a href="index?page=teacher&sub=students_works&id=<?=$stud_array -> UserId;?>" class= "btn-purple">Посмотреть</a>
		                               </td>
		                           </tr>
		                           <?php endwhile;?>
		                       </tbody>
		                   </table>
		               </div>
		            </div>
		        </div>
		    </div>
		</section>
		<script src="./engine/libs/bootstrap-4.4.1/js/jquery.min.js"></script>
	    <script src="./engine/libs/bootstrap-4.4.1/js/popper.min.js"></script>
	    <script src="./engine/libs/bootstrap-4.4.1/js/bootstrap.min.js"></script>
	    <script  src="./engine/modules/teacher/js/menu_selector_st.js"></script>
	    <script  src="./engine/modules/teacher/js/group_menu_selector.js"></script>

	    <div hidden class="studgroup_active" value="<?=$group_name?>"></div>
	</body>
	<?php require("./engine/libs/core/php/footer.php"); ?>
</html>