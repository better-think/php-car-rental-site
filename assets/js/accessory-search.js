$(document).ready(function () {
	$("#accessory-year").click(function() {
		$("#accessory-make").addClass("disabled");
		$("#accessory-model").addClass("disabled");
		$("#accessory-trim").addClass("disabled");
	});
	$("#accessory-make").click(function() {
		$("#accessory-model").addClass("disabled");
		$("#accessory-trim").addClass("disabled");
	});
	$("#accessory-model").click(function() {
		$("#accessory-trim").addClass("disabled");
	});
})

function getMakeForAccesories(yearId) {
	$.ajax({
		method: "post",
		url: "model.php",
		data: "action=getMakesByYearId&yearId=" + yearId,
		success : function (makes) {
		if(makes = JSON.parse(makes)) {
			var strHtml = "";
			makes.map(function (dt, index) {
			strHtml += `<button class="btn btn-outline-info waves-effect" onclick="getModelsForAccesories(${yearId}, ${dt.id})">${dt.name}</button>`
			})
			$("#panel84").html(strHtml);
			$("#panel84").addClass("active show in");
			$("#panel83").removeClass("active show in");
			$("#accessory-year").removeClass("active");
			$("#accessory-make").addClass("active");

			$("#accessory-make").removeClass("disabled");
		} else {
			return false;
		}
		},
		error: function (){
		alert("Warnning")
		}
	})
}
function getModelsForAccesories(yearId, makeId) {
	$.ajax({
	method: "post",
	url: "model.php",
	data: "action=getModelsByMakeId&yearId=" + yearId + "&makeId=" + makeId,
	success : function (models) {
		if(models = JSON.parse(models)) {
		var strHtml = "";
		models.map(function (dt, index) {
			strHtml += `<button class="btn btn-outline-info waves-effect" onclick="getTrimsForAccessrories(${yearId}, ${makeId}, ${dt.id})">${dt.name}</button>`
		})
		$("#panel85").html(strHtml);
		$("#panel85").addClass("active show in");
		$("#panel84").removeClass("active show in");
		$("#accessory-make").removeClass("active");
		$("#accessory-model").addClass("active");
		$("#accessory-make").removeClass("disabled");
		$("#accessory-model").removeClass("disabled");
		} else {
		return false;
		}
	},
	error: function (){
		alert("Warnning")
	}
	})
}
function getTrimsForAccessrories(yearId, makeId, modelId) {
	$.ajax({
	method: "post",
	url: "model.php",
	data: "action=getTrimsForAccesories&yearId=" + yearId + "&makeId=" + makeId + "&modelId=" + modelId,
	success : function (models) {
		if(models = JSON.parse(models)) {
		var strHtml = "";
		models.map(function (dt, index) {
			strHtml += `<a class="btn btn-outline-info waves-effect" href="accessories-search.php?year=${yearId}&make=${makeId}&model=${modelId}&trim=${dt.id}">${dt.name}</a>`
		});
		$("#panel86").html(strHtml);
		$("#panel86").addClass("active show in");
		$("#panel85").removeClass("active show in");
		$("#accessory-model").removeClass("active");
		$("#accessory-trim").addClass("active");
		$("#accessory-trim").removeClass("disabled");

		} else {
		return false;
		}
	},
	error: function (){
		alert("Warnning")
	}
	})
}
// KGS
function getMakeForAccesory(yearId) {
	$("#accessory-model").click(function() {
		$("#accessory-model").addClass("active");
		
		$("#accessory-trim").removeClass("active");
		$("#panel85").addClass("show active in");
		$("#panel86").removeClass("show active in");

	});

	$("#accessory-make").click(function() {
		$("#accessory-make").addClass("active");
		$("#accessory-model").removeClass("show active in");
		$("#accessory-trim").removeClass("show active in");
		$("#panel84").addClass("show active in");
		$("#panel85").removeClass("show active in");
		$("#panel86").removeClass("show active in");
	});
	$("#accessory-year").click(function() {
		$("#accessory-year").addClass("active");
		$("#accessory-make").removeClass("active");
		$("#panel84").removeClass("show active in");
		$("#panel83").addClass("show active in");
		$("#accessory-model").removeClass("show active in");
		$("#panel85").removeClass("show active in");
		$("#panel86").removeClass("show active in");
	});
	$.ajax({
	method: "post",
	url: "../model.php",
	data: "action=getMakesByYearId&yearId=" + yearId,
	success : function (makes) {
		if(makes = JSON.parse(makes)) {
		var strHtml = "";
		makes.map(function (dt, index) {
			strHtml += `<button class="btn btn-outline-info waves-effect" onclick="getModelsForAccesory(${yearId}, ${dt.id})" value = "${dt.id}">${dt.name}</button>`
		});
		$("#panel84").html(strHtml);
		$("#panel84").addClass("active show in");
		$("#panel83").removeClass("active show in");
		$("#accessory-year").removeClass("active");
		$("#accessory-make").addClass("active");
		$("#accessory-make").removeClass("disabled");
		} else {
			return false;
		}
	},
	error: function (){
		alert("Warnning")
	}
	})
}
function getModelsForAccesory(yearId, makeId) {
	$.ajax({
	method: "post",
	url: "../model.php",
	data: "action=getModelsByMakeId&yearId=" + yearId + "&makeId=" + makeId,
	success : function (models) {
		if(models = JSON.parse(models)) {
		var strHtml = "";
		models.map(function (dt, index) {
			strHtml += `<button class="btn btn-outline-info waves-effect" onclick="getTrimsForAccessrory(${yearId}, ${makeId}, ${dt.id})" value = "${dt.id}">${dt.name}</button>`
		})
		$("#panel85").html(strHtml);
		$("#panel85").addClass("active show in");
		$("#panel84").removeClass("active show in");
		$("#accessory-make").removeClass("active");
		$("#accessory-model").addClass("active");
		$("#accessory-make").removeClass("disabled");
		$("#accessory-model").removeClass("disabled");
		} else {
		return false;
		}
	},
	error: function (){
		alert("Warnning")
	}
	})
}
function getTrimsForAccessrory(yearId, makeId, modelId) {
	$.ajax({
		method: "post",
		url: "../model.php",
		data: "action=getTrimsForAccesories&yearId=" + yearId + "&makeId=" + makeId + "&modelId=" + modelId,
		success : function (models) {
		if(models = JSON.parse(models)) {
			var strHtml = "";
			models.map(function (dt, index) {
				strHtml += `<a class="btn btn-outline-info waves-effect" onclick="show_Accessory(${yearId},${makeId},${modelId},${dt.id})" value = "${dt.id}">${dt.name}</a>`
			});
			$("#panel86").html(strHtml);
			$("#panel86").addClass("active show in");
			$("#panel85").removeClass("active show in");
			$("#accessory-model").removeClass("active");
			$("#accessory-trim").addClass("active");
			$("#accessory-trim").removeClass("disabled");
		} else {
			return false;
		}
		},
		error: function (){
		alert("Warnning")
		}
	})
}