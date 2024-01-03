<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập và có vai trò là "admin" hay không
if (!isset($_SESSION['email']) || empty($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    // Nếu không phải "admin" hoặc chưa đăng nhập, chuyển hướng về trang đăng nhập
    header("Location: ../index.html");
    exit();
}

// Nếu đúng "admin" đã đăng nhập, hiển thị nội dung trang admin/index.php
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php
        $con = new mysqli("localhost", "root", "", "linkking");
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        $sql = "SELECT * FROM hanghoa";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="table table-striped table-responsive table-bordered">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">Mã hàng hóa</th>';
            echo '<th scope="col">Tên hàng hóa</th>';
            echo '<th scope="col">Đơn vị tính</th>';
            echo '<th scope="col">Đơn giá</th>';
            echo '<th scope="col">Hành động</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                $link_edit = "form_edithanghoa.php?mahh=".$row['mahh'];
                $link_delete = "deletehanghoa.php?mahh=".$row['mahh'];
                echo '<tr>';
                echo '<td>' . $row["mahh"] . '</td>';
                echo '<td>' . $row["tenhh"] . '</td>';
                echo '<td>' . $row["dvt"] . '</td>';
                echo '<td>' . $row["dongia"] . '</td>';
                echo "<td> <a class='btn btn-primary' href='".$link_edit."' >Sửa</a>
                <a class='btn btn-danger' href='".$link_delete."' >Xóa</a>    
                </td>";

                echo '</tr>';
            } 
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p class="lead">Không có kết quả</p>';
        }
        $con->close();
    ?>
    <p><a href="form_themhanghoa.php" class="btn btn-primary">Quay lại</a></p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>