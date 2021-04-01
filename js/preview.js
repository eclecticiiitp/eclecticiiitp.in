var summer_con;
$(document).ready(function () {
	$("#content").summernote({
		minHeight: 300,
		fontNames: ["Source Sans Pro", "Times"],
		placeholder: "Brew an exciting Blog",
		toolbar: [
			["cleaner", ["cleaner"]],
			["style"],
			["style", ["bold", "italic", "underline", "clear"]],
			["font", ["fontname", "superscript", "subscript"]],
			["para", ["ul", "ol", "paragraph"]],
			["insert", ["link", "video", "table"]],
			["view", ["fullscreen", "codeview", "help"]],
		],
		styleTags: [
			{ title: "Sub-Heading", tag: "h2", value: "h2" },
			"h3",
			"h4",
			"p",
			{ title: "Blockquote", tag: "blockquote", value: "blockquote" },
		],
		cleaner: {
			action: "both", // both|button|paste 'button' only cleans via toolbar button, 'paste' only clean when pasting content, both does both options.
			newline: "<br>", // Summernote's default is to use '<p><br></p>'
			notStyle: "position:absolute;top:0;left:0;right:0", // Position of Notification
			icon: '<i class="note-icon">[Clean]</i>',
			keepHtml: false, // Remove all Html formats
			keepOnlyTags: [
				"<p>",
				"<br>",
				"<ul>",
				"<li>",
				"<b>",
				"<strong>",
				"<i>",
				"<a>",
				"<span>",
			], // If keepHtml is true, remove all tags except these
			keepClasses: false, // Remove Classes
			badTags: [
				"style",
				"script",
				"applet",
				"embed",
				"noframes",
				"noscript",
				"html",
			], // Remove full tags with contents
			badAttributes: ["style", "start"], // Remove attributes from remaining tags
			limitChars: false, // 0/false|# 0/false disables option
			limitDisplay: "both", // text|html|both
			limitStop: false, // true/false
		},
		codemirror: {
			theme: "monokai",
			htmlMode: true,
			lineNumbers: true,
			mode: "text/html",
			lineWrapping: true,
		},
		callbacks: {
			onChange: function (contents) {
				summer_con = contents;
				document.getElementById("prevw").innerHTML =
					'<div class="blog_banner"><h6><span>' +
					document.getElementById("date").value +
					"</span></h6><h1>" +
					document.getElementById("title").value +
					'</h1><img src="../images/' +
					document.getElementById("thumbnail").value +
					'" alt=""></div>' +
					contents;
			},
		},
	});
});

$("#prevwform").change(function update() {
	document.getElementById("prevw").innerHTML =
		'<div class="blog_banner"><h6><span>' +
		document.getElementById("date").value +
		"</span></h6><h1>" +
		document.getElementById("title").value +
		'</h1><img src="../images/' +
		document.getElementById("thumbnail").value +
		'" alt=""></div>' +
		summer_con;
});
