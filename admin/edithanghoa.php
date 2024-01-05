<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập và có vai trò là "admin" hay không
if (!isset($_SESSION['email']) || empty($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
  // Nếu không phải "admin" hoặc chưa đăng nhập, chuyển hướng về trang đăng nhập
  header("Location: ../dangnhap.html");
  exit();
}

// Nếu đúng "admin" đã đăng nhập, hiển thị nội dung trang admin/index.php
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <?php
    $con = new mysqli("localhost", "root", "", "linkking");

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mahh = $_POST['mahh'];
        $tenhh = $_POST['tenhh'];
        $dvt = $_POST['dvt'];
        $dongia = $_POST['dongia'];

        // Use a prepared statement for the UPDATE query
        $sql = "UPDATE hanghoa SET tenhh=?, dvt=?, dongia=? WHERE mahh=?";
        
        $stmt = $con->prepare($sql);

        // Bind parameters
        $stmt->bind_param("ssss", $tenhh, $dvt, $dongia, $mahh);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Cập nhật hàng hóa thành công";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $con->close();
?>

    <p><a href="index.php" class="btn btn-primary">Xem danh sách hàng hóa</a></p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>