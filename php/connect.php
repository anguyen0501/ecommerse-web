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
