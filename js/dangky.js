function validateForm(obj) {
	let input = obj.parentElement.getElementsByTagName("input");
	for (let i = 0; i < input.length; i++) {
		let fieldValidity = input[i].checkValidity();
		if (input[i].value == "" || !fieldValidity) {
			input[i].style.backgroundColor = "yellow";
		} else {
			input[i].style.backgroundColor = "white";
		}
	}

	let radio = document.getElementsByClassName("radio");
	let isChecked = false;
	for (let i = 0; i < radio.length; i++) {
		if (radio[i].checked) {
			isChecked = true;
			break;
		}
	}
	if (!isChecked) {
		radio[0].parentElement.parentElement.style.backgroundColor = "yellow";
	} else {
		radio[0].parentElement.parentElement.style.backgroundColor = "white";
	}

	let quocTich = document.getElementById("quocTich");
	if (quocTich.value == "") {
		quocTich.style.backgroundColor = "yellow";
	} else {
		quocTich.style.backgroundColor = "white";
	}
}
