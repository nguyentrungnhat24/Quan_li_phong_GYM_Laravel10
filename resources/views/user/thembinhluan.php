<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "databasegym");

if (!$conn) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

$iduser = $_SESSION['iduser'];
$idlt = $_POST['idlt'];
$name = $_POST['name']; // Sửa thành $_POST
$title = $_POST['title'];
$comment = $_POST['comment'];

$sql = "INSERT INTO binhluan (iduser, idlt, name, title, comment) VALUES ('$iduser', '$idlt', '$name', '$title', '$comment')"; // Sửa thành VALUES

$kq = mysqli_query($conn, $sql);

if ($kq) {
    echo "Bình luận đã được thêm thành công.";
} else {
    echo "Lỗi: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
