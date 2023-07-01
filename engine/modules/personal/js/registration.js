//======================================================
//  Created by Team-9 Mathchecker Team
//  Copyright © Mathchecker 2020 All rights reserved. 
//======================================================

setInterval(function (){
	var curr_address;
   	if (document.querySelector(".per_result")) {
   		var error_type = $('.per_result').attr("value");
   		if (error_type == "error1") {
   			$('.modal-body').text("Пользователь с таким логином уже существует!");
   			$('#modal-notification').modal('show');
   		}else if (error_type == "error2") {
   			$('.modal-body').text("Пароли не совпадают!");
   			$('#modal-notification').modal('show');
   		}
   		$(".per_result").attr("value", 0);
   }

   if (document.querySelector(".curr")) {
   		curr_address = $('.curr').attr("value");
   		
   }
   
   $("#modal_ok_button").click(function() {
   		location.href = curr_address;
   });
   $(".close").click(function() {
   		location.href = curr_address;
   });
}, 500);