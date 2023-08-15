var currentImg = 1;
var path = "./images/bosieutap";
function changeImg(obj) {
	var btnValue = obj.id;
	if (btnValue === "prev") {
		currentImg--;
		if (currentImg <= 0) {
			currentImg = 20;
		}
		document.getElementById("bosieutap-img").src = path + currentImg + ".webp";
		document.getElementsByClassName("card-text")[0].innerText =
			"Ảnh " + currentImg + "/20";
	} else {
		currentImg++;
		if (currentImg > 20) {
			currentImg = 1;
		}
		document.getElementById("bosieutap-img").src = path + currentImg + ".webp";
		document.getElementsByClassName("card-text")[0].innerText =
			"Ảnh " + currentImg + "/20";
	}
}
