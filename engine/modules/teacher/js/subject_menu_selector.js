//======================================================
//  Created by Team-9 Mathchecker Team
//  Copyright © Mathchecker 2020 All rights reserved. 
//======================================================

$(document).ready(function() {
	if (document.querySelector(".subject_active")) {
		var select_subject = $('.subject_active').attr("value");
		var subject=document.getElementById(select_subject);
		
		if(subject){
			$('#' + select_subject).attr("class", "col-12 options__box-sections_section-active")
		}

	};

});