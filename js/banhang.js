var nf = new Intl.NumberFormat();
window.onload = function () {
	let dongia = document.getElementsByClassName("dg");
	for (let i = 0; i < dongia.length; i++) {
		let dg = parseInt(dongia[i].innerText) || 0;

		dongia[i].innerText = nf.format(dg) + " ₫";
	}
};

function removeCurrencyFormat(text) {
	return text.replace(/[. ₫]+/g, "");
}

function lochh(obj) {
	let mucgia = document.getElementById("mucgia").value;
	let minValue = 0,
		maxValue = Number.MAX_VALUE;
	if (mucgia === "lt20") {
		maxValue = 20000000 - 1;
	}
	if (mucgia === "20to40") {
		minValue = 20000000;
		maxValue = 40000000;
	}
	if (mucgia === "gt40") {
		minValue = 40000000 + 1;
	}
	let dg_arr = document.getElementsByClassName("dg");
	for (let i = 0; i < dg_arr.length; ++i) {
		let dg = dg_arr[i].innerText;
		dg = Number(removeCurrencyFormat(dg));
		if (dg < minValue || dg > maxValue) {
			dg_arr[i].parentElement.style.display = "none";
		} else {
			dg_arr[i].parentElement.style.display = "flex";
		}
	}
}

function tinhtien(obj) {
	let row = obj.parentElement;
	let dg = row.children[2].innerText;
	let sl = row.children[3].children[0].value;
	dg = Number(removeCurrencyFormat(dg));
	sl = Number(sl);
	tt = dg * sl;
	row.children[4].innerText = nf.format(tt) + " ₫";

	let tongtien = document.getElementById("tongtien");
	tinhtongtien();
}

function daott(checkbox) {
	let row = checkbox.parentElement.parentElement;
	let input = row.getElementsByTagName("input")[1];
	input.disabled = !input.disabled;
	let tt = row.getElementsByClassName("tt")[0];
	tt.innerText = "";
	if (input.disabled == false) {
		tinhtien(tt);
	}
	tinhtongtien();
}

function tinhtongtien() {
	let dongia = document.getElementsByClassName("dg");
	let soluong = document.getElementsByClassName("sl");
	let tongtien = document.getElementById("tongtien");
	let tt = 0;
	for (let i = 0; i < soluong.length; i++) {
		if (soluong[i].children[0].disabled == false) {
			let dg = removeCurrencyFormat(dongia[i].innerText);
			dg = parseInt(dg) || 0;
			let sl = parseInt(soluong[i].children[0].value) || 0;
			tt += dg * sl;
		}
	}
	tongtien.innerText = nf.format(tt) + " ₫";
}

function chonhet() {
	let chonhetchk = document.getElementById("chonhet").checked;
	let checkbox = document.getElementsByClassName("chon");
	for (let i = 0; i < checkbox.length; i++) {
		if (checkbox[i].checked != chonhetchk) {
			checkbox[i].checked = chonhetchk;
			daott(checkbox[i]);
		}
	}
}

document.addEventListener("wheel", function (event) {
	if (document.activeElement.type === "number") {
		document.activeElement.blur();
	}
});
