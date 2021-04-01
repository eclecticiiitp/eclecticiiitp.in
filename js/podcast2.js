function play(x) {
	var p = document.getElementById("player");
	p.innerHTML =
		'<iframe src="https://open.spotify.com/embed-podcast/episode/' +
		x +
		'" width="100%" height="160px" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>';
	p.style.display = "block";
	// document.getElementsByClassName('copyright')[0].style.marginBottom = '150px';
}

var glider = new Glider(document.querySelector(".glider"), {
	slidesToShow: "auto",
	slidesToScroll: 2,
	itemWidth: 300,
	exactWidth: true,
	dots: ".dots",
	rewind: true,
	draggable: true,
	arrows: {
		prev: ".glider-prev",
		next: ".glider-next",
	},
});

$(window).resize(function () {
	glider.refresh(true);
});
