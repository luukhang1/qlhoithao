<?php
$conn = mysqli_connect('localhost:4000', 'root', '', 'hoithao');
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id) {
    $sql = "DELETE FROM user WHERE id = '$id' ";
    mysqli_query($conn, $sql);
}
mysqli_close($conn);

// Trở về trang danh sách
header("location: user-management.php");
