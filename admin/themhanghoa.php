<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm hàng hóa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php
        $con = new mysqli("localhost", "root", "", "linkking");
        $mahh = $_POST['mahh'];
        $tenhh = $_POST['tenhh'];
        $dvt = $_POST['dvt'];
        $dongia = $_POST['dongia'];
        $sql = "INSERT INTO hanghoa VALUES ('" . $mahh . "', "
                . "'" . $tenhh . "', "
                . "'" . $dvt . "', "
                . "'" . $dongia . "')";
        if ($con->query($sql) === TRUE) {
            echo "Thêm hàng hóa thành công";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    ?>
    <p><a href="index.php">Xem danh sách hàng hóa</a></p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>