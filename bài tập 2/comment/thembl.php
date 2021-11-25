<?php


session_start();
$conn = mysqli_connect('localhost:4000', 'root', '', 'hoithao');
$data = array();
$sql = "select * from user where username = '{$_SESSION['username']}'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);


if (isset($_POST['gui'])) {

    $id = (!empty($data['id'])) ? (int)$data['id'] : '';
    $name = isset($_POST['ten']) ? mysqli_escape_string($conn, $_POST['ten']) : '';
    $email = isset($_POST['mail']) ? mysqli_escape_string($conn, $_POST['mail']) : '';
    $comment = isset($_POST['comments']) ? mysqli_escape_string($conn, $_POST['comments']) : '';
    if (!$id) {
        echo "<script> alert('ban chua dang nhap')</script>";
    } else if (!$name || !$email || !$comment) {


        echo "<script> alert('vui long nhap du thong tin')</script>";
    } else {
        echo $name . "   h" . $email . ' ' . $comment . ' ' . $id;
        $sql = "INSERT INTO `comments` ( `id_user`, `name`, `email`, `comment`) VALUES ( '$id', '$name', '$email', '$comment')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script> alert('thanh cong')</script>";
        } else {
            echo "<script> alert('da co loi')</script>";
        }
    }
}
mysqli_close($conn);
