// dangnhap.js

function validateLogin(obj) {
    let input = obj.parentElement.getElementsByTagName("input");

    for (let i = 0; i < input.length; i++) {
        let fieldValidity = input[i].checkValidity();
        if (input[i].value == "" || !fieldValidity) {
            input[i].style.backgroundColor = "yellow";
        } else {
            input[i].style.backgroundColor = "white";
        }
    }

    // Thêm các kiểm tra đặc biệt cho trang đăng nhập ở đây
    let email = document.getElementById("email");
    let password = document.getElementById("ma");

    if (email.value == "") {
        email.style.backgroundColor = "yellow";
    } else {
        email.style.backgroundColor = "white";
    }

    if (password.value == "") {
        password.style.backgroundColor = "yellow";
    } else {
        password.style.backgroundColor = "white";
    }
}

// Gắn sự kiện cho nút đăng nhập
document.getElementById("loginButton").addEventListener("click", function() {
    validateLogin(this);
});
