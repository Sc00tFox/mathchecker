<?php
	//======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================
	
	include("./engine/db/db_config.php");

	$stud_id = NULL;
    if (isset($_GET['sid'])){
        $stud_id = $_GET['sid'];
    }

    $work_id = NULL;
    if (isset($_GET['wid'])){
        $work_id = $_GET['wid'];
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

    $student_list = mysqli_query($link, "SELECT * FROM Users WHERE UserId='".$session_id."'" );
    $student_array = $student_list -> fetch_object();
    $student_name = $student_array -> Surname . " " . $student_array -> Firstname;

    $work_list = mysqli_query($link, "SELECT * FROM Works WHERE WorkId='".$work_id."'");
    $work_array = $work_list -> fetch_object();

    $teacher_list = mysqli_query($link, "SELECT * FROM Users WHERE UserId='".$work_array -> TeacherId."'" );
    $teacher_array = $teacher_list -> fetch_object();

    $testitems_list = mysqli_query($link, "SELECT * FROM TestItems WHERE Testld='".$work_array -> WorkId."'" );

    // $data_ti_list = mysqli_query($link, "SELECT * FROM TestItems WHERE QuNumber='1' AND Testld='".$work_array -> WorkId."'"  );
    // $data_ti_array = $data_ti_list -> fetch_object();
    // print_r($data_ti_array);

    // print_r(date("Y-m-d"));

    $filepath = NULL;

    if(isset($_FILES['upload']) && $_FILES['upload']['error'] == 0){
		$dir = '/mathchecker/uploads/studworks/';
		$arrType = array('application/pdf');
		$arrExt = array('pdf');
		$ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		$type = $finfo -> file($_FILES['upload']['tmp_name']);
		if(in_array($type, $arrType) && in_array($ext, $arrExt)){
			$d=date("dmYhis");
			$filepath = $dir.$d.$_FILES['upload']['name'];
			$filepath = str_replace(' ', '_', $filepath);
			if(move_uploaded_file($_FILES['upload']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$filepath)){
				//echo 'ok';
			}else{
				echo 'Ошибка: файл не загружен';
			}
		}
	}

	$value1 = NULL;
	$value2 = NULL;
	$value3 = NULL;
	$value4 = NULL;
	$value5 = NULL;
	$value6 = NULL;
	$value7 = NULL;
	$value8 = NULL;
	$value9 = NULL;
	$value10 = NULL;

	$value_counter = 0;
	$current_counter = 0;

	$work_type = NULL;

	if(isset($_POST['submit']) and $_POST['submit']){

		if (isset($_POST['value1'])){
        	$value1 = $_POST['value1'];
        	$data_ti_list = mysqli_query($link, "SELECT * FROM TestItems WHERE QuNumber='1' AND Testld='".$work_array -> WorkId."'"  );
        	$data_ti_array = $data_ti_list -> fetch_object();
        	mysqli_query ($link, "INSERT INTO `AnsweredTestItems` SET QuNumber='".$data_ti_array -> QuNumber."', QuTitle='".$data_ti_array -> Data."', CurrentAnswer='".$data_ti_array -> CorrectAnswer."', Answer='".$value1."', AnsList='".$data_ti_array -> Vars."', BaseWorkId='".$work_array -> WorkId."'");
        	$value_counter++;
        	if ($value1 == $data_ti_array -> CorrectAnswer){
        		$current_counter++;
        	}
        	$work_type = "test";
    	}
    	if (isset($_POST['value2'])){
        	$value2 = $_POST['value2'];
        	$data_ti_list = mysqli_query($link, "SELECT * FROM TestItems WHERE QuNumber='2' AND Testld='".$work_array -> WorkId."'"  );
        	$data_ti_array = $data_ti_list -> fetch_object();
        	mysqli_query ($link, "INSERT INTO `AnsweredTestItems` SET QuNumber='".$data_ti_array -> QuNumber."', QuTitle='".$data_ti_array -> Data."', CurrentAnswer='".$data_ti_array -> CorrectAnswer."', Answer='".$value2."', AnsList='".$data_ti_array -> Vars."', BaseWorkId='".$work_array -> WorkId."'");
        	$value_counter++;
        	if ($value2 == $data_ti_array -> CorrectAnswer){
        		$current_counter++;
        	}
    	}
    	if (isset($_POST['value3'])){
        	$value3 = $_POST['value3'];
        	$data_ti_list = mysqli_query($link, "SELECT * FROM TestItems WHERE QuNumber='3' AND Testld='".$work_array -> WorkId."'"  );
        	$data_ti_array = $data_ti_list -> fetch_object();
        	mysqli_query ($link, "INSERT INTO `AnsweredTestItems` SET QuNumber='".$data_ti_array -> QuNumber."', QuTitle='".$data_ti_array -> Data."', CurrentAnswer='".$data_ti_array -> CorrectAnswer."', Answer='".$value3."', AnsList='".$data_ti_array -> Vars."', BaseWorkId='".$work_array -> WorkId."'");
        	$value_counter++;
        	if ($value3 == $data_ti_array -> CorrectAnswer){
        		$current_counter++;
        	}
    	}
    	if (isset($_POST['value4'])){
        	$value4 = $_POST['value4'];
        	$data_ti_list = mysqli_query($link, "SELECT * FROM TestItems WHERE QuNumber='4' AND Testld='".$work_array -> WorkId."'"  );
        	$data_ti_array = $data_ti_list -> fetch_object();
        	mysqli_query ($link, "INSERT INTO `AnsweredTestItems` SET QuNumber='".$data_ti_array -> QuNumber."', QuTitle='".$data_ti_array -> Data."', CurrentAnswer='".$data_ti_array -> CorrectAnswer."', Answer='".$value4."', AnsList='".$data_ti_array -> Vars."', BaseWorkId='".$work_array -> WorkId."'");
        	$value_counter++;
        	if ($value4 == $data_ti_array -> CorrectAnswer){
        		$current_counter++;
        	}
    	}
    	if (isset($_POST['value5'])){
        	$value5 = $_POST['value5'];
        	$data_ti_list = mysqli_query($link, "SELECT * FROM TestItems WHERE QuNumber='5' AND Testld='".$work_array -> WorkId."'"  );
        	$data_ti_array = $data_ti_list -> fetch_object();
        	mysqli_query ($link, "INSERT INTO `AnsweredTestItems` SET QuNumber='".$data_ti_array -> QuNumber."', QuTitle='".$data_ti_array -> Data."', CurrentAnswer='".$data_ti_array -> CorrectAnswer."', Answer='".$value5."', AnsList='".$data_ti_array -> Vars."', BaseWorkId='".$work_array -> WorkId."'");
        	$value_counter++;
        	if ($value5 == $data_ti_array -> CorrectAnswer){
        		$current_counter++;
        	}
    	}
    	if (isset($_POST['value6'])){
        	$value6 = $_POST['value6'];
        	$data_ti_list = mysqli_query($link, "SELECT * FROM TestItems WHERE QuNumber='6' AND Testld='".$work_array -> WorkId."'"  );
        	$data_ti_array = $data_ti_list -> fetch_object();
        	mysqli_query ($link, "INSERT INTO `AnsweredTestItems` SET QuNumber='".$data_ti_array -> QuNumber."', QuTitle='".$data_ti_array -> Data."', CurrentAnswer='".$data_ti_array -> CorrectAnswer."', Answer='".$value6."', AnsList='".$data_ti_array -> Vars."', BaseWorkId='".$work_array -> WorkId."'");
        	$value_counter++;
        	if ($value6 == $data_ti_array -> CorrectAnswer){
        		$current_counter++;
        	}
    	}
    	if (isset($_POST['value7'])){
        	$value7 = $_POST['value7'];
        	$data_ti_list = mysqli_query($link, "SELECT * FROM TestItems WHERE QuNumber='7' AND Testld='".$work_array -> WorkId."'"  );
        	$data_ti_array = $data_ti_list -> fetch_object();
        	mysqli_query ($link, "INSERT INTO `AnsweredTestItems` SET QuNumber='".$data_ti_array -> QuNumber."', QuTitle='".$data_ti_array -> Data."', CurrentAnswer='".$data_ti_array -> CorrectAnswer."', Answer='".$value7."', AnsList='".$data_ti_array -> Vars."', BaseWorkId='".$work_array -> WorkId."'");
        	$value_counter++;
        	if ($value7 == $data_ti_array -> CorrectAnswer){
        		$current_counter++;
        	}
    	}
    	if (isset($_POST['value8'])){
        	$value8 = $_POST['value8'];
        	$data_ti_list = mysqli_query($link, "SELECT * FROM TestItems WHERE QuNumber='8' AND Testld='".$work_array -> WorkId."'"  );
        	$data_ti_array = $data_ti_list -> fetch_object();
        	mysqli_query ($link, "INSERT INTO `AnsweredTestItems` SET QuNumber='".$data_ti_array -> QuNumber."', QuTitle='".$data_ti_array -> Data."', CurrentAnswer='".$data_ti_array -> CorrectAnswer."', Answer='".$value8."', AnsList='".$data_ti_array -> Vars."', BaseWorkId='".$work_array -> WorkId."'");
        	$value_counter++;
        	if ($value8 == $data_ti_array -> CorrectAnswer){
        		$current_counter++;
        	}
    	}
    	if (isset($_POST['value9'])){
        	$value9 = $_POST['value9'];
        	$data_ti_list = mysqli_query($link, "SELECT * FROM TestItems WHERE QuNumber='9' AND Testld='".$work_array -> WorkId."'"  );
        	$data_ti_array = $data_ti_list -> fetch_object();
        	mysqli_query ($link, "INSERT INTO `AnsweredTestItems` SET QuNumber='".$data_ti_array -> QuNumber."', QuTitle='".$data_ti_array -> Data."', CurrentAnswer='".$data_ti_array -> CorrectAnswer."', Answer='".$value9."', AnsList='".$data_ti_array -> Vars."', BaseWorkId='".$work_array -> WorkId."'");
        	$value_counter++;
        	if ($value9 == $data_ti_array -> CorrectAnswer){
        		$current_counter++;
        	}
    	}
    	if (isset($_POST['value10'])){
        	$value10 = $_POST['value10'];
        	$data_ti_list = mysqli_query($link, "SELECT * FROM TestItems WHERE QuNumber='10' AND Testld='".$work_array -> WorkId."'"  );
        	$data_ti_array = $data_ti_list -> fetch_object();
        	mysqli_query ($link, "INSERT INTO `AnsweredTestItems` SET QuNumber='".$data_ti_array -> QuNumber."', QuTitle='".$data_ti_array -> Data."', CurrentAnswer='".$data_ti_array -> CorrectAnswer."', Answer='".$value10."', AnsList='".$data_ti_array -> Vars."', BaseWorkId='".$work_array -> WorkId."'");
        	$value_counter++;
        	if ($value10 == $data_ti_array -> CorrectAnswer){
        		$current_counter++;
        	}
    	}

    	mysqli_query ($link, "INSERT INTO `StudentWorks` SET Date='".date("Y-m-d")."', Subject='".$work_array -> Subject."', Theme='".$work_array -> Theme."', Description='".$work_array -> Description."', StudentName='".$student_name."', StudGroup='".$student_array -> Groupname."', QuCount='".$value_counter."', CurrAnsCount='".$current_counter."', WorkOwnerId='".$session_id."', TeacherId='".$work_array -> TeacherId."', BaseWorkId='".$work_array -> WorkId."', TeacherFileURL='".$work_array -> IncludeFileURL."', StudFileURL='".$filepath."', id_type='".$work_type."'");
    	locationTo("index?page=profile&id=".$session_id, 0);
    }
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
	    <title>Выполнение работы</title>
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
		                       class="col-12 menu__box-sections_section">
		                        <span><i class="fas fa-user"></i> Личный кабинет</span>
		                    </a>
		                    <a class="col-12 menu__box-sections_section-active">
		                        <span><i class="fas fa-pencil-alt"></i> Выполнение заданий</span>
		                    </a>
		                </div>
		            </div>


		            <div class="col-10">
		                <div class="container-fluid box-tests">
		                    <div class="row white-box box-tests__box-title">
		                        <div class="col-3 title-blue"><?=$work_array -> Subject;?></div>
		                        <div class="col-8 grey-box"><?=$work_array -> Theme;?></div>

		                        <div class="col-3 title-blue">Преподаватель</div>
		                        <div class="col-9 title-black"><?=$teacher_array -> Surname . " " . $teacher_array -> Firstname;?></div>

		                        <div class="col-12"><?=$work_array -> Description;?></div>

		                        <?php if($work_array -> IncludeFileURL != NULL):?>
                                    <div class="col-12 box-file">
                                        <br>
                                        <a href="<?=$work_array -> IncludeFileURL;?>">Прикреплённое задание</a>
                                    </div>
                                <?php endif;?>
		                    </div>

		                    <form method="post" enctype="multipart/form-data">
			                    <?php if($work_array -> id_type == "test"):?>
			                    	<?php if ($testitems_list -> num_rows != 0):?>
			                    		<div class="row box-tests__box-test">
			                    			<?php while($testitems_array = $testitems_list -> fetch_object()):?>
			                    				<div class="col-12 box-tests__box-test__item">
			                    					<h3>Задание №<?=$testitems_array -> QuNumber;?></h3>
			                    					<p><?=$testitems_array -> Data;?></p>
			                    					<div class="box-tests__box-test__item_box-answer">
						                                <p>Ответы:</p>
						                                <input class="blue-field" name="value<?=$testitems_array -> QuNumber;?>">
						                                <div class="grey-box">
						                                    <p><?=$testitems_array -> Vars;?></p>
						                                </div>
			                            			</div>
			                    				</div>
			                    			<?php endwhile;?>
			                    		</div>
			                    	<?php endif;?>		        
			                    <?php endif;?>

			                    <div class="row white-box box-file box-test__box-file">
			                        <div class="col-12 white-box">
			                            <input name="upload" type="file" id="field__file-2" class="field field__file" multiple>
			                            <label class="field__file-wrapper" for="field__file-2">
			                                <div class="field__file-button"><i class="fas fa-plus"></i> Прикрепить файл</div>
			                                <div class="field__file-fake">Файл не выбран</div>
			                            </label>
			                        </div>
			                    </div>
			                    <div class="row box-test__box-btn">
			                        <input class="btn-blue" type="submit" name="submit" value="Завершить">
			                    </div>
		                    </form>
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