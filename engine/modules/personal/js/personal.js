//======================================================
//  Created by Team-9 Mathchecker Team
//  Copyright © Mathchecker 2020 All rights reserved. 
//======================================================

setInterval(function (){
   if (document.querySelector(".per_result")) {
   		var error_type = $('.per_result').attr("value");
   		if (error_type == "error1") {
   			$('.modal-body').text("Введенный вами ключ не найден в системе!");
   			$('#modal-notification').modal('show');
   		}else if (error_type == "error2") {
   			$('.modal-body').text("Введенный вами ключ уже был авторизирован!");
   			$('#modal-notification').modal('show');
   		}
   		$(".reg_result").attr("value", 0);
   }
   $("#modal_ok_button").click(function() {
   		location.href = "index?page=personal";
   });
   $(".close").click(function() {
   		location.href = "index?page=personal";
   });
}, 500);