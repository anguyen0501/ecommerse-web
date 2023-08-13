window.onload = function () {
	document.getElementById("cart").style.display = "none";
	document.getElementById("tongtien").style.display = "none";
};
function them(button) {
	var row = button.parentElement.parentElement.cloneNode(true);
	var btnXoa = row.getElementsByTagName("button")[0];
	btnXoa.innerText = "Xóa";
	btnXoa.setAttribute("onclick", "xoa(this)");
	var chkbox = row.getElementsByTagName("input")[0];
	chkbox.setAttribute("onchange", "");
	document.getElementById("cart").appendChild(row);
	document.getElementById("cart").style.display = "";
	document.getElementById("tongtien").style.display = "";

	tinhTong();
}

function xoa(button) {
	var row = button.parentElement.parentElement;
	document.getElementById("cart").removeChild(row);
	tinhTong();
}

function tinhTong() {
	var cart = document.getElementById("cart");
	var row = cart.getElementsByTagName("tr");
	var tong = 0;
	for (var i = 0; i < row.length; i++) {
		var price = row[i].children[2].innerText;
		price = parseInt(price);
		tong += price;
	}
	document.getElementById("tong").innerText = tong;
}

function daott(checkbox) {
	var row = checkbox.parentElement.parentElement;
	var btn = row.getElementsByTagName("button")[0];
	btn.disabled = !btn.disabled;
}
