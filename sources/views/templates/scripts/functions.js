$(document).ready(function() {
	/*************************************************************************/
	/*						      USER ACTIONS'S 							 */
	/*************************************************************************/
	///// AJAX PROCESS
	$(".controlRender").click(function() {
		var query = getChildID($(this));
		var data = {
			"query": query,
			"adminProcess": 0 
		};
		$.ajax("./views/templates/scripts/ajax.php", {
			type: "POST",
			data: $(this).serialize() +"&"+ $.param(data),
			dataType: "text",
			success: function(html) {
				if(query == "controlFull") {
					$("#controlFull").css("background", "url('views/templates/img/buttons/tabcontrol_e.jpg')");
					$("#controlStep").css("background", "url('views/templates/img/buttons/tabcontrol_d.jpg')");				
				} else if(query == "controlStep") {
					$("#controlFull").css("background", "url('views/templates/img/buttons/tabcontrol_d.jpg')");
					$("#controlStep").css("background", "url('views/templates/img/buttons/tabcontrol_e.jpg')");
				}				
				$(".controlTraitment").html(html);
			},
			error: function(XMLHttpRequest, textStatus, errorThrows) {
				alert("Javascript error: "+ errorThrows);
			}
		});
	});
	$(".manualRender").click(function() {
		var query = getChildID($(this));
		var data = {
			"query": query,
			"adminProcess": 0
		};
		$.ajax("./views/templates/scripts/ajax.php", {
			type: "POST",
			data: $(this).serialize() +"&"+ $.param(data),
			dataType: "text",
			success: function(html) {
				if(query == "manualUtilisation") {
					$("#manualUtilisation").css("background", "url('views/templates/img/buttons/tabcontrol_e.jpg')");
				} else {
					$("#manualUtilisation").css("background", "url('views/templates/img/buttons/tabcontrol_d.jpg')");
				}
				$(".manualTraitment").html(html);
			},
			error: function(XMLHttpRequest, textStatus, errorThrows) {
				alert("Javascript error: "+ errorThrows);
			}
		});
	});
	$(".sensorRender").click(function() {
		var query = getChildID($(this));
		var data = {
			"query": query,
			"adminProcess": 0
		};
		$.ajax("./views/templates/scripts/ajax.php", {
			type: "POST",
			data: $(this).serialize() +"&"+ $.param(data),
			dataType: "text",
			success: function(html) {
				if(query == "sensorCameraT") {
					$("#sensorCameraT").css("background", "url('views/templates/img/buttons/tabcontrol_e.jpg')");
					$("#sensorCameraB").css("background", "url('views/templates/img/buttons/tabcontrol_d.jpg')");
				} else if(query == "sensorCameraB") {
					$("#sensorCameraT").css("background", "url('views/templates/img/buttons/tabcontrol_d.jpg')");
					$("#sensorCameraB").css("background", "url('views/templates/img/buttons/tabcontrol_e.jpg')");
				}
				$(".sensorTraitment").html(html);
			},
			error: function(XMLHttpRequest, textStatus, errorThrows) {
				alert("Javascript error: "+ errorThrows);
			}
		});
	});
	$(".informationRender").click(function() {
		var query = getChildID($(this));
		var data = {
			"query": query,
			"adminProcess": 0
		};
		$.ajax("./views/templates/scripts/ajax.php", {
			type: "POST",
			data: $(this).serialize() +"&"+ $.param(data),
			dataType: "text",
			success: function(html) {
				if(query == "informationNAO") {
					$("#informationNAO").css("background", "url('views/templates/img/buttons/tabcontrol_e.jpg')");
				} else {
					$("#informationNAO").css("background", "url('views/templates/img/buttons/tabcontrol_d.jpg')");
				}				
				$(".informationTraitment").html(html);
			},
			error: function(XMLHttpRequest, textStatus, errorThrows) {
				alert("Javascript error: "+ errorThrows);
			}
		});
	});
	///// OTHER IMPLEMENTS
	/*************************************************************************/
	/*						      ADMIN ACTIONS'S 							 */
	/*************************************************************************/
	///// AJAX PROCESS
	$(".adminControlRender").click(function() {
		var query = getChildID($(this));
		var data = {
			"query": query,
			"adminProcess": 1
		};
		$.ajax("../views/templates/scripts/ajax.php", {
			type: "POST",
			data: $(this).serialize() +"&"+ $.param(data),
			dataType: "text",
			success: function(html) {
				if(query == "controlList") {
					$("#controlList").css("background", "url('../views/templates/img/buttons/tabcontrol_e.jpg')");
					$("#controlAdd").css("background", "url('../views/templates/img/buttons/tabcontrol_d.jpg')");				
				} else if(query == "controlAdd") {
					$("#controlList").css("background", "url('../views/templates/img/buttons/tabcontrol_d.jpg')");
					$("#controlAdd").css("background", "url('../views/templates/img/buttons/tabcontrol_e.jpg')");
				}				
				$(".adminControlTraitment").html(html);
			},
			error: function(XMLHttpRequest, textStatus, errorThrows) {
				alert("Javascript error: "+ errorThrows);
			}
		});
	});
	$(".adminManualRender").click(function() {
		var query = getChildID($(this));
		var data = {
			"query": query,
			"adminProcess": 1
		};
		$.ajax("../views/templates/scripts/ajax.php", {
			type: "POST",
			data: $(this).serialize() +"&"+ $.param(data),
			dataType: "text",
			success: function(html) {
				if(query == "manualUtilisation") {
					$("#manualUtilisation").css("background", "url('../views/templates/img/buttons/tabcontrol_e.jpg')");
					$("#manualAdministration").css("background", "url('../views/templates/img/buttons/tabcontrol_d.jpg')");
					$("#manualInstallation").css("background", "url('../views/templates/img/buttons/tabcontrol_d.jpg')");
				} else if(query == "manualAdministration") {
					$("#manualUtilisation").css("background", "url('../views/templates/img/buttons/tabcontrol_d.jpg')");
					$("#manualAdministration").css("background", "url('../views/templates/img/buttons/tabcontrol_e.jpg')");
					$("#manualInstallation").css("background", "url('../views/templates/img/buttons/tabcontrol_d.jpg')");
				} else if(query == "manualInstallation") {
					$("#manualUtilisation").css("background", "url('../views/templates/img/buttons/tabcontrol_d.jpg')");
					$("#manualAdministration").css("background", "url('../views/templates/img/buttons/tabcontrol_d.jpg')");
					$("#manualInstallation").css("background", "url('../views/templates/img/buttons/tabcontrol_e.jpg')");
				}
				$(".adminManualTraitment").html(html);
			},
			error: function(XMLHttpRequest, textStatus, errorThrows) {
				alert("Javascript error: "+ errorThrows);
			}
		});
	});
	$(".adminPeripheralRender").click(function() {
		var query = getChildID($(this));
		var data = {
			"query": query,
			"adminProcess": 1
		};
		$.ajax("../views/templates/scripts/ajax.php", {
			type: "POST",
			data: $(this).serialize() +"&"+ $.param(data),
			dataType: "text",
			success: function(html) {
				if(query == "peripheralList") {
					$("#peripheralList").css("background", "url('../views/templates/img/buttons/tabcontrol_e.jpg')");
					$("#peripheralAdd").css("background", "url('../views/templates/img/buttons/tabcontrol_d.jpg')");
				} else if(query == "peripheralAdd") {
					$("#peripheralList").css("background", "url('../views/templates/img/buttons/tabcontrol_d.jpg')");
					$("#peripheralAdd").css("background", "url('../views/templates/img/buttons/tabcontrol_e.jpg')");
				}
				$(".adminPeripheralTraitment").html(html);
			},
			error: function(XMLHttpRequest, textStatus, errorThrows) {
				alert("Javascript error: "+ errorThrows);
			}
		});
	});
	$(".adminInformationRender").click(function() {
		var query = getChildID($(this));
		var data = {
			"query": query,
			"adminProcess": 1
		};
		$.ajax("../views/templates/scripts/ajax.php", {
			type: "POST",
			data: $(this).serialize() +"&"+ $.param(data),
			dataType: "text",
			success: function(html) {
				if(query == "informationNAO") {
					$("#informationNAO").css("background", "url('../views/templates/img/buttons/tabcontrol_e.jpg')");
					$("#informationAdmin").css("background", "url('../views/templates/img/buttons/tabcontrol_d.jpg')");
				} else if(query == "informationAdmin") {
					$("#informationNAO").css("background", "url('../views/templates/img/buttons/tabcontrol_d.jpg')");
					$("#informationAdmin").css("background", "url('../views/templates/img/buttons/tabcontrol_e.jpg')");
				}				
				$(".adminInformationTraitment").html(html);
			},
			error: function(XMLHttpRequest, textStatus, errorThrows) {
				alert("Javascript error: "+ errorThrows);
			}
		});
	});
	$(".adminSettingRender").click(function() {
		var query = getChildID($(this));
		var data = {
			"query": query,
			"adminProcess": 1
		};
		$.ajax("../views/templates/scripts/ajax.php", {
			type: "POST",
			data: $(this).serialize() +"&"+ $.param(data),
			dataType: "text",
			success: function(html) {
				if(query == "settingPassword") {
					$("#settingPassword").css("background", "url('../views/templates/img/buttons/tabcontrol_e.jpg')");
					$("#settingLevel").css("background", "url('../views/templates/img/buttons/tabcontrol_d.jpg')");
				} else if(query == "settingLevel") {
					$("#settingPassword").css("background", "url('../views/templates/img/buttons/tabcontrol_d.jpg')");
					$("#settingLevel").css("background", "url('../views/templates/img/buttons/tabcontrol_e.jpg')");
				}				
				$(".adminSettingTraitment").html(html);
			},
			error: function(XMLHttpRequest, textStatus, errorThrows) {
				alert("Javascript error: "+ errorThrows);
			}
		});
	});
	///// OTHER IMPLEMENTS
	$(document).on("click", ".adminControlRender-descAction", function() {
		var $elementDesc = getDescObject($(this));
		var $elementLine = getParentObject($(this));

		if($elementDesc.is(":visible")) {
			$elementLine.children("td"[0]).css("border-bottom","1px solid #ddd");
			$elementLine.children("td"[1]).css("border-bottom","1px solid #ddd");
			$elementLine.children("td"[2]).css("border-bottom","1px solid #ddd");
			$elementLine.children("td"[3]).css("border-bottom","1px solid #ddd");
			$elementLine.children("td"[4]).css("border-bottom","1px solid #ddd");
			$elementDesc.css("display", "none");
		} else {
			$elementLine.children("td"[0]).css("border-bottom","none");
			$elementLine.children("td"[1]).css("border-bottom","none");
			$elementLine.children("td"[2]).css("border-bottom","none");
			$elementLine.children("td"[3]).css("border-bottom","none");
			$elementLine.children("td"[4]).css("border-bottom","none");
			$elementDesc.css("display", "table-row");
		}
	});
	$(document).on("click", ".adminPeripheralRender-descAction", function() {
		var $elementDesc = getDescObject($(this));
		var $elementLine = getParentObject($(this));

		if($elementDesc.is(":visible")) {
			$elementLine.children("td"[0]).css("border-bottom","1px solid #ddd");
			$elementLine.children("td"[1]).css("border-bottom","1px solid #ddd");
			$elementLine.children("td"[2]).css("border-bottom","1px solid #ddd");
			$elementLine.children("td"[3]).css("border-bottom","1px solid #ddd");
			$elementLine.children("td"[4]).css("border-bottom","1px solid #ddd");
			$elementDesc.css("display", "none");
		} else {
			$elementLine.children("td"[0]).css("border-bottom","none");
			$elementLine.children("td"[1]).css("border-bottom","none");
			$elementLine.children("td"[2]).css("border-bottom","none");
			$elementLine.children("td"[3]).css("border-bottom","none");
			$elementLine.children("td"[4]).css("border-bottom","none");
			$elementDesc.css("display", "table-row");
		}
	});
	$(document).on("click", ".adminControlRender-delAction", function() {
		if(!confirm(
			"L'action et tous ses fichiers associés seront supprimés!")) {
			return false;
		}
	});
	$(document).on("click", ".adminPeripheralRender-delAction", function() {
		if(!confirm(
			"Ce périphérique ne pourra plus se connecter!")) {
			return false;
		}
	});
});
function getChildID(object) {
	return object.children("div").attr("id");
}
function getParentObject(object) {
	return object.parent("td").parent("tr");
}
function getDescObject(object) {
	return object.parent("td").parent("tr").next("tr");
}