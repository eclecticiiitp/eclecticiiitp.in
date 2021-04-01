$(function () {
	"use strict";

	$(".image_container img").click(function () {
		var $src = $(this).attr("src");
		$(".show").fadeIn();
		$(".image-container img").attr("src", $src);
	});

	$("span, .overlay").click(function () {
		$(".show").fadeOut();
	});
});
