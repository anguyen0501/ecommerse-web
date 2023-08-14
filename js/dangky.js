function validateForm(obj) {
	let checkAnythingValid = true;

	let input = obj.parentElement.getElementsByTagName("input");
	for (let i = 0; i < input.length; i++) {
		let fieldValidity = input[i].checkValidity();
		if (input[i].value == "" || !fieldValidity) {
			input[i].style.backgroundColor = "yellow";
			checkAnythingValid = false;
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
		checkAnythingValid = false;
	} else {
		radio[0].parentElement.parentElement.style.backgroundColor = "white";
	}

	let checkbox = document.getElementsByClassName("checkbox");
	isChecked = false;
	for (let i = 0; i < checkbox.length; i++) {
		if (checkbox[i].checked) {
			isChecked = true;
			checkbox[checkbox.length - 1].required = false;
			break;
		}
	}
	if (!isChecked) {
		checkbox[0].parentElement.parentElement.style.backgroundColor = "yellow";
		checkAnythingValid = false;
	} else {
		checkbox[0].parentElement.parentElement.style.backgroundColor = "white";
	}

	let quocTich = document.getElementById("quocTich");
	if (quocTich.value == "") {
		quocTich.style.backgroundColor = "yellow";
		checkAnythingValid = false;
	} else {
		quocTich.style.backgroundColor = "white";
	}

	if (checkAnythingValid) {
		alert("Đăng ký thành công");
	}
}
