<?php
	if($_SESSION){
		$u_id = $_SESSION['u_id'];
    	$u_list = mysqli_query($link, "SELECT * From Users where UserId='".$u_id."'" );
    	$u_array = $u_list -> fetch_object();
    	$u_name = $u_array -> Surname . " " . $u_array -> Firstname;
	}else{
		$u_name = "None";
	}
    
?>

<div class="col-2 menu">
	<div class="row">
		<div class="col menu__box-user">
		    <div class="menu__box-user_role">
		        Преподаватель
		    </div>
		    <div class="menu__box-user_name">
		        <?=$u_name;?>
		    </div>
		    <hr>
		</div>
	</div>

	<div class="row menu__box-sections">
		<a href="index?page=teacher&sub=work_verification" id="work_verification" class="col-12 menu__box-sections_section">
		    <span><i class="far fa-eye"></i> Проверка работ</span>
		</a>
		<a href="index?page=teacher&sub=students" id="students" class="col-12 menu__box-sections_section">
		    <span><i class="fas fa-user-friends"></i> Студенты</span>
		</a>
		<a href="index?page=teacher&sub=set_the_test" id="set_the_test" class="col-12 menu__box-sections_section">
		    <span><i class="fas fa-tasks"></i> Выставить задание</span>
		</a>
	</div>
</div>