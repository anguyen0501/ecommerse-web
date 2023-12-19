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
}