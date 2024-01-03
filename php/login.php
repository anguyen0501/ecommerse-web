<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['ma'];

    $conn = new mysqli('localhost', 'root', '', 'linkking');

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } else {
        # Check if email and password match in the database
        $stmt = $conn->prepare("SELECT * FROM AccountUser WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['Pwrd'])) {
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $user['role'];
                // Check user role and redirect accordingly
                if ($user['role'] == 'admin') {
                    header("Location: ../admin/index.php");
                    exit();
                } else if ($user['role'] == 'user') {
                    header("Location: ../index.html");
                    exit();
                } else {
                    echo "Vai trò không hợp lệ";
                }
            } else {
                echo "Sai mật khẩu";
            }
        } else {
            echo "Email không tồn tại";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
