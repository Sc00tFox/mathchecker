<?php
    //======================================================
    //  Created by Semyon Toporov
    //  Copyright © Semyon Toporov 2020 All rights reserved. 
    //======================================================

    function keyIn($key_id, $email, $f_name, $s_name, $password, $password_v, $user_group, $user_status){
        include("./engine/db/db_config.php");
        
        if($password == $password_v){
            $email_check = mysqli_query($link, "SELECT * FROM Users WHERE Email='".$email."'" );
            if ($email_check -> num_rows == 0){
                $password = md5($password);
                mysqli_query ($link, "INSERT INTO `Users` SET Email='".$email."', Firstname='".$f_name."', Surname='".$s_name."', Password='".$password."', Groupld='".$user_group."', Status='".$user_status."'");
                mysqli_query($link, "UPDATE `PersonalKeys` SET `PKeyStatus` = '0' WHERE `PersonalKeys`.`PKeyId` = '".$key_id."'");
                locationTo("index?page=home", 0);
                exit;
            }else return "error1";  
        }else return "error2";
    }
?>