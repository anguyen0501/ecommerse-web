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
  <title>Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container-fluid">
    <div class="container">
      <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand">VU-AN</a>
          <form class="d-flex" role="search" method="GET" action="">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <select class="form-select" name="search_by">
              <option value="Email">Email</option>
              <option value="FullNme">Tên</option>
            </select> 
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <?php if (isset($_SESSION['email'])) { ?>
            <div class="user-icon">
              <i class="fas fa-user"></i>
              <?php echo $_SESSION['email']; ?>
              <a href="../../dangnhap.html" class="btn btn-outline-danger">Logout</a>
            </div>
          <?php } ?>
        </div>
      </nav>
      <?php
      $con = new mysqli("localhost", "root", "", "linkking");
      if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }
      $sql = "SELECT * FROM accountuser";
      $result = $con->query($sql);
      
      if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];
        $searchBy = $_GET['search_by'];
      
        $sql = "SELECT * FROM accountuser WHERE $searchBy LIKE '%$searchTerm%'";
      } else {
        $sql = "SELECT * FROM accountuser";
      }
      $result = $con->query($sql);
      if ($result->num_rows > 0) {
        echo '<table class=" my-3 table table-striped table-responsive table-bordered">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Email</th>';
        echo '<th scope="col">Họ và tên</th>';
        echo '<th scope="col">Giới tính</th>';
        echo '<th scope="col">Quốc tịch</th>';
        echo '<th scope="col">Role</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row["Email"] . '</td>';
          echo '<td>' . $row["FullName"] . '</td>';
          echo '<td>' . $row["Gender"] . '</td>';
          echo '<td>' . $row["Nationality"] . '</td>';
          echo '<td>' . $row["role"] . '</td>';

          echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
      } else {
        echo '<p class="lead">Không có kết quả</p>';
      }
      $con->close();
      ?>
      <p><a href="../index.php" class="btn btn-primary">Quay lại</a></p>
    </div>
    
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      
</body>

</html>