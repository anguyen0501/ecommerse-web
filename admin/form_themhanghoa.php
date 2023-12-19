<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form thêm hàng hóa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
  </head>
  <body>
    <h4>Nhập thông tin hàng hóa</h4>
    <div class="container-sm">
    <form action="themhanghoa.php" method="post">
        <div class="mb-3">
            <label for="mahh" class="form-label">Mã hàng hóa</label>
            <input type="text" class="form-control" id="mahh" name="mahh" placeholder="Mã hàng hóa" required>
        </div>
        <div class="mb-3">
            <label for="tenhh" class="form-label">Tên hàng hóa</label>
            <input type="text" class="form-control" id="tenhh" name="tenhh" placeholder="Tên hàng hóa" required>
        </div>
        <div class="mb-3">
            <label for="dvt" class="form-label">Đơn vị tính</label>
            <input type="text" class="form-control" id="dvt" name="dvt" placeholder="Đơn vị tính" required>
        </div>
        <div class="mb-3">
            <label for="dongia" class="form-label">Đơn giá</label>
            <input type="number" class="form-control" id="dongia" name="dongia" placeholder="Đơn giá" required>
        </div>
        <button type="submit" class="btn btn-primary" onclick="validateForm(this)">Thêm</button>
    </form>
    </div>
    <script src="../js/themhanghoa.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>