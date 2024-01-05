<?php
$email = $_POST['email'];
$password = password_hash($_POST['ma'], PASSWORD_BCRYPT); // Hash the password
$fullname = $_POST['hoTen'];
$gender = $_POST['gioitinh'];
$nationality = $_POST['quocTich'];
$note = $_POST['ghiChu'];

$conn = new mysqli('localhost', 'root', '', 'linkking');

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    # Check if email already exists in the database
    $stmt = $conn->prepare("SELECT * FROM AccountUser WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result()->num_rows;
    
    if ($stmt_result != 0) {
        echo "Email đã tồn tại"; // Email already exists
    } else {
        # Insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO AccountUser (Email, Pwrd, FullName, Gender, Nationality, Note) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $email, $password, $fullname, $gender, $nationality, $note);
        $execval = $stmt->execute();
        
        if ($execval) {
            echo "Đăng ký thành công"; // Registration successful
        } else {
            echo "Đăng ký thất bại"; // Registration failed
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Người Dùng Mới</title>
</head>

<body>
<div class="register-container">
            <form id="register-form" action="./addNewUser.php" method="post">
                <h1 class="register-title">ĐĂNG KÝ THÀNH VIÊN</h1><br>
                <fieldset>
                    <label for="email"><span>Email</span></label><br>
                    <input class="input_form" type="email" id="email" name="email" placeholder="Nhập địa chỉ email"
                        required>
                </fieldset>

                <fieldset>
                    <label for="ma"><span>Mật khẩu</span></label><br>
                    <input type="password" class="input_form" id="ma" name="ma" placeholder="Nhập mật khẩu" required>
                </fieldset>

                <fieldset>
                    <label for="hoTen"><span>Họ và tên</span></label><br>
                    <input class="input_form" type="text" id="hoTen" name="hoTen" placeholder="Nhập họ và tên" required>
                </fieldset>

                <fieldset>
                    <label for="gioitinh"><span>Giới tính</span></label><br>
                    <div class="input_form">
                        <label><input type="radio" class="radio" name="gioitinh" value="nam" required>&nbsp;Nam</label>
                        &nbsp;
                        <label><input type="radio" class="radio" name="gioitinh" value="nu" required>&nbsp;Nữ</label>
                    </div>
                </fieldset>

                <fieldset>
                    <label for="quocTich"><span>Quốc tịch</span></label><br>
                    <select name="quocTich" id="quocTich" required>
                        <option value="">Chọn quốc tịch</option>
                        <option value="VietNam">Việt Nam</option>
                        <option value="Lao">Lào</option>
                        <option value="Campuchia">Campuchia</option>
                        <option value="Khac">Khác</option>
                    </select>
                </fieldset>

                <fieldset>
                    <label for="ghiChu"><span>Ghi chú</span></label><br>
                    <textarea name="ghiChu" id="ghiChu" cols="40" rows="5" maxlength="199"></textarea>
                </fieldset>

                <button type="submit" onclick="validateForm(this)">Đăng ký</button>
            </form>
        </div>
</body>

</html>

