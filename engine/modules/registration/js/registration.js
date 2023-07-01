//======================================================
//  Created by Team-9 Mathchecker Team
//  Copyright © Mathchecker 2020 All rights reserved. 
//======================================================

setInterval(function (){
   if (document.querySelector(".reg_result")) {
   		var error_type = $('.reg_result').attr("value");
   		if (error_type == "error1") {
   			$('.modal-body').text("Пользователь с таким логином или номером студенческого билета уже существует!");
   			$('#modal-notification').modal('show');
   		}else if (error_type == "error2") {
   			$('.modal-body').text("Пароли не совпадают!");
   			$('#modal-notification').modal('show');
   		}else if (error_type == "error3") {
            $('.modal-body').text("Регистрация в данный момент отключена!");
            $('#modal-notification').modal('show');
         }
   		$(".reg_result").attr("value", 0);
   }
   $("#modal_ok_button").click(function() {
   		location.href = "index?page=registration";
   });
   $(".close").click(function() {
   		location.href = "index?page=registration";
   });
}, 500);