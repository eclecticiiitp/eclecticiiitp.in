$(window).ready(function () {
	$("#loader").delay(1500).fadeOut(1000);
	setTimeout(function () {
		$("body").css({ overflow: "auto" });
	}, 1500);
});

$(window).on("beforeunload", function () {
	$(window).scrollTop(0);
});

var show = document.getElementById("show");
var hide = document.getElementById("hide");
show.addEventListener("click", s);
hide.addEventListener("click", h);

window.addEventListener("resize", function () {
	if (window.innerWidth > 1132) {
		document.getElementById("show").style.display = "none";
	} else {
		document.getElementById("show").style.display = "block";
	}
});

function s() {
	nav.classList.add("nav-display");
	document.getElementById("show").style.display = "none";
}

function h() {
	nav.classList.remove("nav-display");
	setTimeout(function () {
		document.getElementById("show").style.display = "block";
	}, 400);
}

function sc() {
	document
		.getElementsByClassName("c1")[0]
		.scrollIntoView({ behavior: "smooth" });
}

$("#contact-form").submit(function (event) {
	event.preventDefault();
	$("#alert")
		.html('<div class="alert alert-warning">Sending...</div>')
		.fadeIn(0);
	$.ajax({
		url: "https://eclecticiiitp.in/contactform",
		type: "post",
		data: $("#contact-form").serialize(),
		dataType: "json",
		success: function (_response) {
			var ajaxmsg = _response.msg;
			if (ajaxmsg == "") {
				$("#alert").html(
					'<div class="alert alert-danger">Please fill all fields.</div>'
				);
			} else {
				$("#alert").html(ajaxmsg);
				$("#submit").remove();
			}
		},
		error: function (jqXhr, json, errorThrown) {
			var error = jqXhr.responseText;
			$("#alert").html(
				'<div class="alert alert-danger">' + error + "</div>"
			);
		},
	});
});

document.getElementById("scroll").addEventListener("click", sc);
