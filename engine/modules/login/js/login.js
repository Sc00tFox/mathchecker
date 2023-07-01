//======================================================
//  Created by Team-9 Mathchecker Team
//  Copyright © Mathchecker 2020 All rights reserved. 
//======================================================

setInterval(function (){
   if (document.querySelector(".login_result")) {
   		var error_type = $('.login_result').attr("value");
   		if (error_type == "error1") {
   			$('.modal-body').text("Пользователь был заблокирован!");
   			$('#modal-notification').modal('show');
   		}else if (error_type == "error2") {
   			$('#modal-notification').modal('show');
   		}else if (error_type == "error3") {
   			$('.modal-body').text("Пользователь не найден!");
   			$('#modal-notification').modal('show');
   		}
   		$(".login_result").attr("value", 0);
   }
   $("#modal_ok_button").click(function() {
   		location.href = "index?page=login";
   });
   $(".close").click(function() {
   		location.href = "index?page=login";
   });
}, 500);