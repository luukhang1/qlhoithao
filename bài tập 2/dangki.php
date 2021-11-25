<?php
$conn = mysqli_connect('localhost:4000', 'root', '', 'hoithao');

if (isset($_POST['dangki'])) {

    $username  = isset($_POST['ten']) ? mysqli_escape_string($conn, $_POST['ten']) : '';
    $password  = isset($_POST['matkhau']) ? mysqli_escape_string($conn, $_POST['matkhau']) : '';
    $email  = isset($_POST['email']) ? mysqli_escape_string($conn, $_POST['email']) : '';
    $lever  = 0;
    if (!$username  || !$password || !$email) {


        echo "<script>alert('vui long nhap du thong tin')</script>";
    } else {
        $password = md5($password);
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username' "))) {
            echo "<script>alert('username da duoc su dung')</script>";
        } else {


            if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email' "))) {
                echo "<script>alert('email da duoc su dung')</script>";
            } else {
                $sql = "INSERT INTO `user` (`username`, `password`, `email`, `lever`) VALUES ('$username', '$password', '$email', '$lever')";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('them thanh cong')</script>";
                } else {
                    echo "<script>alert('da co loi')</script>";
                }
            }
        }
        mysqli_close($conn);
    }
}
