//======================================================
//  Created by Team-9 Mathchecker Team
//  Copyright © Mathchecker 2020 All rights reserved. 
//======================================================

$(document).ready(function() {
	if (document.querySelector(".studgroup_active")) {
		var select_group = $('.studgroup_active').attr("value");
		var group=document.getElementById(select_group);
		
		if(group){
			$('#' + select_group).attr("class", "col-12 options__box-sections_section-active")
		}

	};

});