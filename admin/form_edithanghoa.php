<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
        <div class="container">


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

    // Close the connection
    $con->close();
?>

    <h4>Nhập thông tin hàng hóa</h4>
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


    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>