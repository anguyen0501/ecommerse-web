function validateForm(obj) { // Function to validate form
    let input = obj.parentElement.getElementsByTagName("input");
    for (let i = 0; i < input.length; i++) { // Loop through inputs
        let fieldValidity = input[i].checkValidity();
        if (input[i].value == "" || !fieldValidity) { // If empty or invalid
            input[i].style.backgroundColor = "yellow"; // Yellow background
        } else {
            input[i].style.backgroundColor = "white"; // White background
        }
    }

    let radio = document.getElementsByClassName("radio");
    let isChecked = false;
    for (let i = 0; i < radio.length; i++) { // Loop through radio buttons
        if (radio[i].checked) { // If checked
            isChecked = true;
            break;
        }
    }
    if (!isChecked) { // If none checked
        radio[0].parentElement.parentElement.style.backgroundColor = "yellow"; // Yellow background
    } else {
        radio[0].parentElement.parentElement.style.backgroundColor = "white"; // White background
    }

    let quocTich = document.getElementById("quocTich");
    if (quocTich.value == "") { // If empty
        quocTich.style.backgroundColor = "yellow"; // Yellow background
    } else {
        quocTich.style.backgroundColor = "white"; // White background
    }
}