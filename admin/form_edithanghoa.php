<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập và có vai trò là "admin" hay không
if (!isset($_SESSION['email']) || empty($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
  // Nếu không phải "admin" hoặc chưa đăng nhập, chuyển hướng về trang đăng nhập
  header("Location: ../dangnhap.html");
  exit();
}
// Xử lý đăng xuất
if (isset($_POST['logout'])) {
  // Hủy bỏ toàn bộ dữ liệu session
  session_unset();
  session_destroy();

  // Chuyển hướng về trang đăng nhập
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
    <title>Admin - Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="container">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand">Home</a>
                    <?php if (isset($_SESSION['email'])) { ?>
                        <div class="user-icon">
                            <i class="fas fa-user"></i>
                            <?php echo $_SESSION['email']; ?>
                            <a href="../dangnhap.html" class="btn btn-outline-danger">Logout</a>
                        </div>
                    <?php } ?>
                </div>
            </nav>

            <?php
            $mahh = $_GET['mahh'];
            $con = new mysqli("localhost", "root", "", "linkking");

            // Check connection
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            // Use a prepared statement for the SELECT query
            $sql = "SELECT * FROM hanghoa WHERE mahh=?";
            $stmt = $con->prepare($sql);

            // Bind parameter
            $stmt->bind_param("s", $mahh);

            // Execute the statement
            $stmt->execute();

            // Bind result variables
            $result = $stmt->get_result();

            // Fetch the result as an associative array
            $item = $result->fetch_assoc();

            // Close the statement
            $stmt->close();

            // Close the connectionn
            $con->close();
            ?>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <h1 class="text-center mt-3">Cập nhật hàng hóa</h1>
                    <h4 class="text-center mt-3">Nhập thông tin hàng hóa</h4>
                    <form action="edithanghoa.php" method="post">
                        <div class="mb-3">
                            <label for="mahh" class="form-label">Mã hàng hóa</label>
                            <input type="text" class="form-control" id="mahh" name="mahh" placeholder="Mã hàng hóa" value="<?php echo $item['mahh']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tenhh" class="form-label">Tên hàng hóa</label>
                            <input type="text" class="form-control" id="tenhh" name="tenhh" placeholder="Tên hàng hóa" value="<?php echo $item['tenhh']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="dvt" class="form-label">Đơn vị tính</label>
                            <input type="text" class="form-control" id="dvt" name="dvt" placeholder="Đơn vị tính" value="<?php echo $item['dvt']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="dongia" class="form-label">Đơn giá</label>
                            <input type="number" class="form-control" id="dongia" name="dongia" placeholder="Đơn giá" value="<?php echo $item['dongia']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="validateForm(this)">Cập nhật</button>
                    </form>
                    <p class="mt-3"><a href="index.php" class="btn btn-primary">Xem danh sách hàng hóa</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>