<?php
session_start();
$conn = mysqli_connect('localhost:4000', 'root', '', 'hoithao');
$is_update = false;
$id = isset($_GET['id']) ? (int) $_GET['id'] : '';

$data = array();
$data['username'] = '';
$data['password'] = '';
$data['email'] = '';
$data['lever'] = 0;


if ($id) {
  $is_update = true;
  $sql = "select * from user where id='$id' ";
  $sql1 = "DELETE FROM user WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    mysqli_query($conn, $sql1);
  }
}

if (isset($_POST['them'])) {

  $username  = isset($_POST['username']) ? mysqli_escape_string($conn, $_POST['username']) : '';
  $password  = isset($_POST['password']) ? mysqli_escape_string($conn, $_POST['password']) : '';
  $email  = isset($_POST['email']) ? mysqli_escape_string($conn, $_POST['email']) : '';
  $lever  = isset($_POST['lever']) ? (int)$_POST['lever'] : '';

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


?>

<!doctype html>
<html lang="en">

<head>
  <title>Quản lí</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    table,
    tr,
    th {
      border: 1px solid white;
    }

    .nav li a:hover {
      background-color: yellow;
    }

    .navbar-nav li a:hover {
      background-color: yellow;
    }
  </style>
</head>

<body>
  <main class="container-fluid " style="background-color: ghostwhite;">
    <nav class="row ">
      <nav class="navbar navbar-expand-sm navbar-light font-weight-bold col" style="background-color: darkcyan;">
        <a class="navbar-brand" href="#">Trang quản lý</a>
        <div class="col-6">
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item ">
              <a class="nav-link" href="./admin.php">Trang chủ </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./post-management.php">Bài viết</a>
            </li>
            <li class="nav-item">
              <a href="./user-management.php" class="nav-link">Người dùng</a>
            </li>

            <li class="nav-item">
              <a href="./comment.php" class="nav-link">Phản hồi</a>
            </li>
            <li class="nav-item">
              <a href="login.php" class="nav-link">Đăng xuất</a>
            </li>

          </ul>

        </div>
      </nav>
    </nav>
    <div class="row">
      <div class="col-3  container-fluid p-4">
        <div class="d-flex flex-column jumbotron  font-weight-bold" style="width: 280px; height:100%; background-color: darkcyan; color:black;">
          <h3 style="color: black ; ">Quản lý người dùng</h3>
          <hr>
          <ul class="nav  flex-column mb-auto font-weight-bold">
            <li class="nav-item">
              <a href="./admin.php" class="nav-link" style="color: black;">
                Trang Chủ
              </a>
            </li>
            <li>
              <a href="./post-management.php" class="nav-link " style="color: black;">
                Quản lý bài đăng
              </a>
            </li>
            <li>
              <a href="./user-management.php" class="nav-link " style="color: black;">

                Quản lý người dùng
              </a>
            </li>
            <li>
              <a href="./comment.php" class="nav-link  " style="color: black;">

                Phản hồi
              </a>
            </li>

          </ul>
          <hr>
          <div>

            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong><?php echo $_SESSION['username'] ?></strong>


          </div>
        </div>
      </div>
      <div class="col-9">
        <section style="display: block;" class="row">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="management-tab" data-toggle="tab" href="#management" role="tab" aria-controls="management" aria-selected="true">Quản lí</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="Posts-tab" data-toggle="tab" href="#Posts" role="tab" aria-controls="Posts" aria-selected="false">Người dùng</a>
            </li>

          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active font-weight-bolder" id="management" role="tabpanel" aria-labelledby="management-tab">
              <form action="user-management.php" method="post">
                <div class="card jumbotron">

                  <div class="card-body">
                    <div class="row">
                      <div class="col-3">
                        <div class="border p-3">
                          <img src="img/user.jpg" alt="" class="img-fluid">

                        </div>
                      </div>
                      <div class="col-9">

                        <div class="form-group">
                          <label for="UserName">TÊN ĐĂNG NHẬP</label>
                          <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>">
                          <small class="form-text text-muted">Tên đăng nhập</small>
                        </div>
                        <div class="form-group">
                          <label for="Password">MẬT KHẨU</label>
                          <input type="password" class="form-control" name="password" value="<?php echo $data['password']; ?>">
                          <small id="helpId" class="form-text text-muted">mật khẩu</small>
                        </div>
                        <div class="form-group">
                          <label for="email">EMAIL</label>
                          <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>">
                          <small id="helpId" class="form-text text-muted">email</small>
                        </div>
                        <div>
                          <div class="form-group">
                            <label for="lever">level</label>
                            <select class="form-control" name="lever" value="0">
                              <option <?php if ($data['lever'] == '1') {
                                        echo ("selected");
                                      } ?> value="1">admin</option>
                              <option <?php if ($data['lever'] == '0') {
                                        echo ("selected");
                                      } ?> value="0">user</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer text-muted">
                    <button class="btn btn-primary" name="them"><?php if ($is_update) {
                                                                  echo 'Cập Nhật';
                                                                } else {
                                                                  echo 'Thêm Mới';
                                                                } ?></button>

                    <button class="btn btn-info" type="reset">reset</button>

                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="Posts" role="tabpanel" aria-labelledby="Posts-tab">

              <div class="container">
                <div class="row justify-content-center jumbotron">
                  <div class="col">
                    <table class="table table-striped " style="background: steelblue;color: white;">
                      <thead class="thead-inverse">
                        <tr>

                          <th scope="col">TÊN ĐĂNG NHẬP</th>
                          <th scope="col">MẬT KHẨU</th>
                          <th scope="col">EMAIL</th>
                          <th scope="col">&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $conn = mysqli_connect('localhost:4000', 'root', '', 'hoithao');
                        $sql = "SELECT * FROM `user`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                          <?php echo '<tr style="border: 1px soild white;">';
                          echo '<td style="border: 1px soild white;">' . $row['username'] . '</td>';
                          echo '<td style="border: 1px soild white;">' . $row['password'] . '</td>';
                          echo '<td style="border: 1px soild white;">' . $row['email'] . '</td>'; ?>
                          <td style="border: 1px soild white;">
                            <a href="user-management.php?id=<?php echo $row['id']; ?>" style="color: white;"><i class="fa fa-edit" style="color: white;"></i>Sửa</a>
                            <a href="deluser.php?id=<?php echo $row['id']; ?>" name="delete" style="color: white;"><i class="fa fa-trash" style="color: white;"></i>Xóa</a>
                          </td>


                        <?php }
                        mysqli_close($conn) ?>


                      </tbody>

                    </table>

                  </div>
                </div>
              </div>




            </div>
          </div>
          <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> -->

        </section>
      </div>
    </div>
    <footer class=" row justify-content-center" style="background-color: darkcyan; ">


      <a href="# "><span class="fa fa-chevron-up  " style="color: rgb(252, 134, 0);"></span> </a>

    </footer>
  </main>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>