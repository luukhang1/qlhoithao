<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
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
                <div class="collapse navbar-collapse " id="collapsibleNavId">
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
                        <li class="nav-item" style="padding-right: 2px;">
                            <a href="login.php" class="nav-link">Đăng xuất</a>
                        </li>

                    </ul>

                </div>

            </nav>
        </nav>
        <div class="row">
            <div class="col-3  container-fluid p-4">
                <div class="d-flex flex-column jumbotron  font-weight-bold" style="width: 280px; height:100%; background-color: darkcyan; color:black;">
                    <h3 style="color: black ; ">Trang quản trị</h3>
                    <hr>
                    <ul class="nav  flex-column mb-auto font-weight-bold">
                        <li class="nav-item">
                            <a href="admin.php" class="nav-link" style="color: black;">
                                Trang Chủ
                            </a>
                        </li>
                        <li>
                            <a href="post-management.php" class="nav-link " style="color: black;">
                                Quản lý bài đăng
                            </a>
                        </li>
                        <li>
                            <a href="user-management.php" class="nav-link " style="color: black;">

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
                <div class="container-fluid">
                    <h2 style="font-size: 60px;"><i class="fas fa-info-circle    "></i>Thông tin về trang quản lí hội thảo</h2>
                    <h4>Nội dung..</h4>
                    <p>Sứ mệnh..</p>
                    <button class="btn btn-default btn-lg" style="border: 1pt solid black;">Liên lạc</button>
                </div>

                <div class="container-fluid bg-grey">

                    <h4><strong>MISSION:</strong> Sứ mệnh của chúng tôi ..</h4>
                    <p><strong>VISION:</strong> Tầm nhìn của chúng tôi ..
                </div>
            </div>
        </div>

        <footer class=" row justify-content-center jumbotron" style="background-color: darkcyan; ">


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