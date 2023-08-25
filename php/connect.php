<?php
$email = $_POST['email'];
$password = $_POST['ma'];
$fullname = $_POST['hoTen'];
$gender = $_POST['gioitinh'];
$nationality = $_POST['quocTich'];
$note = $_POST['ghiChu'];

$conn = new mysqli('localhost', 'root', '', 'linkking');

if ($conn->connect_error) {
  echo "$conn->connect_error";
  die("Connection Failed : " . $conn->connect_error);
} else {
  # Kiểm tra email có tồn tại trong database chưa
  $stmt = $conn->prepare("select * from AccountUser where Email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt_result = $stmt->get_result()->num_rows;
  if ($stmt_result != 0) {
    echo "Email đã tồn tại";
    $stmt->close();
    $conn->close();
  } else {
    # Thêm tài khoản vào database
    $stmt = $conn->prepare("insert into AccountUser(Email, Pwrd, FullName, Gender, Nationality, Note) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $email, $password, $fullname, $gender, $nationality, $note);
    $execval = $stmt->execute();
    echo "Đăng ký thành công";
    $stmt->close();
    $conn->close();
  }
}
?>