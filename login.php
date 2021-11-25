<?php
session_start();
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
                    echo "<script>alert('dang ki thanh cong')</script>";
                } else {
                    echo "<script>alert('da co loi')</script>";
                }
            }
        }
        mysqli_close($conn);
    }
}

if (isset($_POST['dangnhap'])) {
    $username  = isset($_POST['usename']) ? mysqli_escape_string($conn, $_POST['usename']) : '';
    $password  = isset($_POST['password']) ? mysqli_escape_string($conn, $_POST['password']) : '';
    if (!$username  || !$password) {


        echo "<script>alert('vui long nhap du thong tin')</script>";
    } else {
        $password = md5($password);
        $data = array();
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username' ")) == 0) {
            echo "<script>alert('sai ten dang nhap')</script>";
        } else {
            $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username' "));

            if ($data['password'] != $password) {
                echo "<script>alert('mat khau khong dung')</script>";
            } else {
                $_SESSION['username'] = $data['username'];
                $is_user = false;
                if ($data['lever'] == 0) {
                    $is_user = true;
                }
                if ($is_user) {
                    header("location: ./site/index.php");
                } else {
                    header("location: admin.php");
                }
            }
        }
        mysqli_close($conn);
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="jumbotron">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-7">
                <div class="p-4 card " style="background-color: #a3d5ae;">
                    <form class="border-primary p-4 bg-gray" action="login.php" method="post">
                        <div class="form-group">
                            <label for="usename" style="font-weight: bold;">Tên đăng nhập</label>
                            <input type="text" name="usename" id="usename" class="form-control">
                            <small id="helpId" class="text-muted">Tên</small>
                        </div>
                        <div class="form-group ">
                            <label for="password" style="font-weight: bold;">Mật Khẩu</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Mật Khẩu</small>
                        </div>
                        <div>
                            <input type="submit" class="form-control btn-primary " name="dangnhap" value="đăng nhập">
                        </div>

                    </form>

                    <div class="border-primary p-4 row">
                        <p class="pr-4">Không có tài khoản?</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">đăng ký</button>
                    </div>

                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="login.php" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Đăng kí</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label for="ten">Tên đăng nhập</label>
                                        <input type="text" name="ten" id="ten" class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <label for="matkhau">Mật Khẩu</label>
                                        <input type="password" class="form-control" name="matkhau">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email">

                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">đóng</button>
                                <button type="submit" class="btn btn-primary" name="dangki">đăng kí</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>