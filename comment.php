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
                            <a class="nav-link" href="admin.php">Trang chủ </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="post-management.php">Bài viết</a>
                        </li>
                        <li class="nav-item">
                            <a href="user-management.php" class="nav-link">Người dùng</a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">Phản hồi</a>
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
                    <h3 style="color: black ; ">Quản lý Phản Hồi</h3>
                    <hr>
                    <ul class="nav  flex-column mb-auto font-weight-bold">
                        <li class="nav-item">
                            <a type="button" onclick="load_ajax1()" class="nav-link" id="1" style="color: black;">
                                <i class="fas fa-comments    ">Xem Các Bình Luận</i>
                            </a>
                        </li>
                        <li>
                            <a type="button" onclick="load_ajax()" class="nav-link" id="1" style="color: black;">
                                <i class="fas fa-highlighter    ">Top Bình Luận</i>
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
                <div id="result" class="container-fluid p-4">
                    <h2 style="font-size: 70pt;">
                        <i class="fas fa-comment-slash    "></i>Trang Quản Lý Phản Hồi
                    </h2>
                </div>


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
    <script language="javascript">
        function load_ajax() {

            // Tạo một biến lưu trữ đối tượng XML HTTP. Đối tượng này
            // tùy thuộc vào trình duyệt browser ta sử dụng nên phải kiểm
            // tra như bước bên dưới
            var xmlhttp;

            // Nếu trình duyệt là  IE7+, Firefox, Chrome, Opera, Safari
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            // Nếu trình duyệt là IE6, IE5
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            // Khởi tạo một hàm gửi ajax
            xmlhttp.onreadystatechange = function() {
                // Nếu đối tượng XML HTTP trả về với hai thông số bên dưới thì mọi chuyện 
                // coi như thành công
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    // Sau khi thành công tiến hành thay đổi nội dung của thẻ div, nội dung
                    // ở đây chính là 
                    document.getElementById("result").innerHTML = xmlhttp.responseText;
                }
            };

            <?php
            echo 'xmlhttp.open("GET", "./comment/tkbinhluan.php", true);';
            ?>

            // Khai báo với phương thức GET, và url chính là file result.php






            // Cuối cùng là Gửi ajax, sau khi gọi hàm send thì function vừa tạo ở
            // trên (onreadystatechange) sẽ được chạy
            xmlhttp.send();
        }

        function load_ajax1() {

            // Tạo một biến lưu trữ đối tượng XML HTTP. Đối tượng này
            // tùy thuộc vào trình duyệt browser ta sử dụng nên phải kiểm
            // tra như bước bên dưới
            var xmlhttp;

            // Nếu trình duyệt là  IE7+, Firefox, Chrome, Opera, Safari
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            // Nếu trình duyệt là IE6, IE5
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            // Khởi tạo một hàm gửi ajax
            xmlhttp.onreadystatechange = function() {
                // Nếu đối tượng XML HTTP trả về với hai thông số bên dưới thì mọi chuyện 
                // coi như thành công
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    // Sau khi thành công tiến hành thay đổi nội dung của thẻ div, nội dung
                    // ở đây chính là 
                    document.getElementById("result").innerHTML = xmlhttp.responseText;
                }
            };

            <?php
            echo 'xmlhttp.open("GET", "./comment/xlbinhluan.php", true);';
            ?>

            // Khai báo với phương thức GET, và url chính là file result.php






            // Cuối cùng là Gửi ajax, sau khi gọi hàm send thì function vừa tạo ở
            // trên (onreadystatechange) sẽ được chạy
            xmlhttp.send();
        }
    </script>
</body>

</html>