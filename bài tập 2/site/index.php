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
?>

<!doctype html>
<html lang="en">

<head>
  <title>Hội thảo khoa học</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    .navbar {
      margin-bottom: 0;
      background-color: #f4511e;
      border: 0;
      font-size: 15px;
      border-radius: 0;

    }

    .navbar-nav li a:hover,
    .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
    }
  </style>
</head>

<body id="myPage" style="background-color: rgb(243, 241, 241);">


  <nav class="row pt-4">
    <nav class="navbar navbar-expand-sm navbar-light fixed-top col " style="background-color: rgb(9, 6, 36);">
      <div class="col-7">
        <p style="color: honeydew;">xin chào <?php echo $_SESSION['username']; ?></p>

      </div>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav  font-weight-bolder">
          <li class="nav-item ">
            <a class="nav-link " href="index.php" style="color: honeydew;">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link haha" href="#gioithieu" style="color: honeydew;">Giới thiệu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link haha" href="#chuongtrinh" style="color: honeydew;">Chương trình</a>
          </li>
          <li class="nav-item">
            <a class="nav-link haha" href="#bai-viet" style="color: honeydew;">Bài Viết</a>
          </li>
          <li class="nav-item">
            <a class="nav-link haha" href="#contact" style="color: honeydew;">Liên hệ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link haha" href="../login.php" style="color: honeydew;">Đăng xuất</a>
          </li>

        </ul>

      </div>
    </nav>
  </nav>
  <div class="jumbotron text-center" style="background-color: rgb(9, 6, 36);">
    <h1 style="color: honeydew;">Hội thảo khoa học</h1>

    <form>
      <div class="input-group">
        <input type="email" class="form-control" size="50" placeholder="Địa chỉ Email" required>
        <div class="input-group-btn">
          <button type="button" class="btn btn-danger">Đăng ký</button>
        </div>
      </div>
    </form>
  </div>
  <!-- slide -->

  <div id="carouselId" class="carousel slide container-fluid pb-4 pl-4 " data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselId" data-slide-to="0" class="active"></li>
      <li data-target="#carouselId" data-slide-to="1"></li>
      <li data-target="#carouselId" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner " style="height: 400px;" role="listbox">
      <div class="carousel-item active">
        <img src="../img/slide1.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img src="../img/slide2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img src="../img/slide3.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- gioi thiệu -->
  <div class="container-fluid " id="gioithieu" style="padding-top: 40px;">


    <div class="container-fluid pt-4 pb-4" style="width: 80%;">
      <h2 class="text-center font-italic" style="color: rgb(30, 96, 158);">Giới thiệu</h2>
      <div class="row  justify-content-center">
        <div class="col-8 ">
          <p>
            Ngoài ra, nhiều nhà diễn giả, tiến sĩ, giáo sư có am hiểu cao cũng được mời đến. Khách mời thường quan tâm nhiều đến lượng kiến thức mình nhận được.

            Hội thảo khoa học không cần trang trí rườm rà, chỉ sự thoải mái, lịch sự cần có. Do đó, các trung tâm tổ chức sự kiện hay phòng hội nghị tại các trường đại học sẽ là địa điểm lý tưởng trong trường hợp này.
            Hội thảo khoa học sẽ có nhiều chủ đề khác nhau. Vậy nên, dựa nội dung buổi hội thảo để lựa chọn ra địa điểm tổ chức phù hợp nhất.
            Phòng hội thảo khoa học cho dù các chủ đề khác nhau nhưng đều có tiêu chí chung để trang trí. Đó chính là bám sát nội dung chương trình.
          </p>
        </div>
        <div class="col-4">
          <img src="../img/gt.jpg" alt="" class="img-fluid">
        </div>
        <div class="row pt-4 pl-4">
          <p>
            Hội thảo khoa học là một sự kiện được tổ chức thường niên ở những cơ sở giáo dục cao, viện nghiên cứu, trung tâm công nghệ. Và đặc biệt là tại các trường đại học lớn.
            Khách mời tham dự hội thảo khoa học chủ yếu sẽ là tầng lớp trí thức, trung lưu hoặc học sinh, sinh viên. Là thành viên trong các cơ sở đào tạo có liên quan đến chủ đề hội nghị.

            Ngoài ra, nhiều nhà diễn giả, tiến sĩ, giáo sư có am hiểu cao cũng được mời đến. Khách mời thường quan tâm nhiều đến lượng kiến thức mình nhận được.

            Hội thảo khoa học không cần trang trí rườm rà, chỉ sự thoải mái, lịch sự cần có. Do đó, các trung tâm tổ chức sự kiện hay phòng hội nghị tại các trường đại học sẽ là địa điểm lý tưởng trong trường hợp này.
            Hội thảo khoa học sẽ có nhiều chủ đề khác nhau. Vậy nên, dựa nội dung buổi hội thảo để lựa chọn ra địa điểm tổ chức phù hợp nhất.
            Phòng hội thảo khoa học cho dù các chủ đề khác nhau nhưng đều có tiêu chí chung để trang trí. Đó chính là bám sát nội dung chương trình.

            Cần thiết nhất là hình bìa nêu chủ đề cuộc hội thảo.Từ thiết kế chủ đạo này mà bạn sẽ định vị rõ được màu chủ đạo và chi tiết trang trí theo kèm là gì.
            Ví dụ, hội thảo về luật pháp thì sẽ lấy tông vàng đồng của cán cân làm chi tiết điểm nhấn. Từ đó, hoa trang trí, khăn trải bàn,… Cùng với những vật dụng khác cũng sẽ lấy màu sắc này làm gốc.

            Chi tiết trang trí trong hội thảo không quá rườm rà mà đem đến cho khách mời sự chuyên nghiệp, lịch sự.

            Đặc biệt, phong cách trang trí hội thảo khoa học cũng bị ảnh hưởng bởi đối tượng khác mời tham dự.
            Để tổ chức một hội thảo khoa học, bạn cần lên cho mình một kế hoạch chi tiết ngay từ đầu. Từ đó mới thực hiện các bước chuẩn bị thật chu đáo.
            Hội thảo khoa học là một sự kiện có tính chuyên môn cao nên nội dung chuẩn bị phải thật chính xác. Có giá trị học vấn bởi chính khách mời tham dự. Ảnh hưởng trực tiếp đến việc hội thảo có thành công hay không.

            Cần có thời gian nghỉ ngơi, giao lưu tạo không khí phấn chấn cho người nghe giảm mệt mỏi sau những giờ tranh luận khoa học.
            Hội thảo khoa học luôn thu hút sự chú ý của giới truyền thống và tầng lớp tri thức. Đây cũng là dịp mà các công ty, doanh nghiệp có thể đánh bóng tên tuổi, quảng bá thương hiệu của mình.
          </p>
        </div>
      </div>

    </div>
  </div>


  <!-- chuong trinh -->
  <div class="container-fluid" id="chuongtrinh" style="padding-bottom: 200px;padding-top:80px;">


    <div class="container-fluid  pl-30 pt-30 " style="display: block;">
      <h1 class="text-center pb-5">Chương trình hội thảo</h1>

      <div class="container-fluid jumbotron border" style="width: 80%;">
        <h3>Hội thảo khoa học 2021</h3>
        <p>Ngày 27/11/2021, Nhà Quốc hội, số 02 Độc Lập, Ba Đình, Hà Nội</p>

      </div>
      <div class="container-fluid">

        <h3 class="text-center">Diễn giả</h3>
        <div class="row  justify-content-center " style="padding: 30px;">

          <div class="card pr-4 pl-4 col-3" style="width: 18rem;">
            <img src="../img/diengia1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text font-weight-bolder">ÔNG PHAN THANH BÌNH
                CHỦ NHIỆM ỦY BAN VHGDTNTN VÀ NĐ</p>
            </div>
          </div>
          <div class="card pr-4 pl-4 col-3" style="width: 18rem;">
            <img src="../img/diengia2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text font-weight-bolder">ÔNG CHRISTOPHE LEMIERE
                QUẢN LÝ CHƯƠNG TRÌNH PHÁT TRIỂN CON NGƯỜI TẠI VP NGÂN HÀNG THẾ GIỚI TẠI VIỆT NAM</p>
            </div>
          </div>
          <div class="card pr-4 pl-4 col-3" style="width: 18rem;">
            <img src="../img/diengia3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text font-weight-bolder">ÔNG HOÀNG MINH SƠN
                THỨ TRƯỞNG BỘ GIÁO DỤC VÀ ĐÀO TẠO</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <ul class="nav nav-tabs font-weight-bolder" id="myTab" role="tablist">
            <li class="nav-item " role="presentation">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">PHIÊN KHAI MẠC</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">PHIÊN 1</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="phien-tab" data-toggle="tab" href="#phien" role="tab" aria-controls="phien" aria-selected="false">PHIÊN BẾ MẠC</a>
            </li>
          </ul>
          <div class="tab-content pl-10 pb-30" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row justify-content-center pb-30">
                <div class="col">
                  <table class="table table-striped table-inverse table-responsive border">
                    <thead class="thead-inverse">
                      <tr>
                        <th style="width: 150px;">Thời gian</th>
                        <th>Nội dung</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row"><i class="fa fa-clock-o" aria-hidden="true">07:30 - 08:00</i></td>
                        <td>ĐĂNG KÝ ĐẠI BIỂU by Ban Tổ chức</td>
                      </tr>
                      <tr>
                        <td scope="row"> <i class="fa fa-clock-o" aria-hidden="true">08:00 - 08:05</i></td>
                        <td>ĐGIỚI THIỆU ĐẠI BIỂU by Ông Tạ Văn Hạ, Uỷ viên Thường trực UB VHGDTNTN&NĐ</td>
                      </tr>
                      <tr>
                        <td scope="row"><i class="fa fa-clock-o" aria-hidden="true">08:05 - 08:20</i></td>
                        <td>PHÁT BIỂU CHỈ ĐẠO VÀ KHAI MẠC by Bà Tòng Thị Phóng, Phó Chủ tịch thường trực Quốc hội</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <table class="table table-striped table-inverse table-responsive border">
                <thead class="thead-inverse">
                  <tr>
                    <th style="width: 150px;">Thời gian</th>
                    <th>Nội dung</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row"><i class="fa fa-clock-o" aria-hidden="true">07:30 - 08:00</i></td>
                    <td>ĐĂNG KÝ ĐẠI BIỂU by Ban Tổ chức</td>
                  </tr>
                  <tr>
                    <td scope="row"> <i class="fa fa-clock-o" aria-hidden="true">08:00 - 08:05</i></td>
                    <td>ĐGIỚI THIỆU ĐẠI BIỂU by Ông Tạ Văn Hạ, Uỷ viên Thường trực UB VHGDTNTN&NĐ</td>
                  </tr>
                  <tr>
                    <td scope="row"><i class="fa fa-clock-o" aria-hidden="true">08:05 - 08:20</i></td>
                    <td>PHÁT BIỂU CHỈ ĐẠO VÀ KHAI MẠC by Bà Tòng Thị Phóng, Phó Chủ tịch thường trực Quốc hội</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="phien" role="tabpanel" aria-labelledby="phien-tab">
              <table class="table table-striped table-inverse table-responsive border">
                <thead class="thead-inverse">
                  <tr>
                    <th style="width: 150px;">Thời gian</th>
                    <th>Nội dung</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row"><i class="fa fa-clock-o" aria-hidden="true">07:30 - 08:00</i></td>
                    <td>ĐĂNG KÝ ĐẠI BIỂU by Ban Tổ chức</td>
                  </tr>
                  <tr>
                    <td scope="row"> <i class="fa fa-clock-o" aria-hidden="true">08:00 - 08:05</i></td>
                    <td>ĐGIỚI THIỆU ĐẠI BIỂU by Ông Tạ Văn Hạ, Uỷ viên Thường trực UB VHGDTNTN&NĐ</td>
                  </tr>
                  <tr>
                    <td scope="row"><i class="fa fa-clock-o" aria-hidden="true">08:05 - 08:20</i></td>
                    <td>PHÁT BIỂU CHỈ ĐẠO VÀ KHAI MẠC by Bà Tòng Thị Phóng, Phó Chủ tịch thường trực Quốc hội</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../img/ct1.JPG" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../img/ct2.JPG" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../img/ct3.JPG" class="d-block w-100" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- bài viết -->
  <div id="bai-viet" class="container-fluid pt-30 pb-30 jumbotron border" style="background-color: rgb(170, 184, 181); width: 90%;">
    <h3 class="text-center">Các Bài Viết</h3>
    <?php
    $conn = mysqli_connect('localhost:4000', 'root', '', 'hoithao');
    $sql = "select * from posts";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

      echo ' <div class="row pl-4 font-weight-bolder pt-4 pb-4 " style="width: 90%;"> ';
      echo ' <div class="col-3"> <img src="../' . $row['image'] . '" class=" img-fluid jumbotron " style="height: 200px; width: 200px;"> </div>';
      echo  '<div class="col-9">';
      echo  '<p>';
      echo $row['title'];
      echo '</p>';
      echo    '<button class="btn btn-danger">Đọc thêm</button>';


      echo  '</div> </div>';
    }
    mysqli_close($conn);
    ?>




  </div>

  <!-- contract -->
  <div id="contact" class="container-fluid bg-grey  pb-4 pt-4" style="width: 90%;">
    <h2 class="text-center">Liên Hệ Chúng Tôi</h2>
    <div class="row">
      <div class="col-5">

        <p><span class="fa fa-map-marker"></span> Viet Nam</p>
        <p><span class="fa fa-phone"></span> 0912345678</p>
        <p><span class="fa fa-envelope "></span> phamngoc@gmail.com</p>
      </div>
      <div class="col-7 slideanim">
        <form action="./index.php" method="post">
          <div class="row">
            <div class="col-6 form-group">
              <input class="form-control" id="name" name="ten" placeholder="Tên" type="text" required>
            </div>
            <div class="col-sm-6 form-group">
              <input class="form-control" id="email" name="mail" placeholder="Email" type="email" required>
            </div>
          </div>
          <textarea class="form-control" id="comments" name="comments" placeholder="Bình luận" rows="5"></textarea><br>
          <div class="row">
            <div class="col-sm-12 form-group">
              <button class="btn btn-primary pull-right" name="gui" type="submit">Gửi</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- footer -->


  <footer class=" jumbotron pt-4 text-center" style="background-color: rgb(9, 6, 36); ">

    <p style="color: honeydew; ">Bootstrap Theme Made By Pham Ngoc</p>
    <small style="color: lightgray;">Ủy ban Văn hóa, Giáo dục của Quốc hội
      Địa chỉ: 22 Hùng Vương, Ba Đình, Hà Nội</small><br>
    <a class="haha" href="#myPage " title="To Top"><span class="fa fa-chevron-up  " style="color: rgb(252, 134, 0);"></span> </a>

  </footer>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    $('#myTab a').on('click', function(event) {
      event.preventDefault()
      $(this).tab('show')
    });


    $(document).ready(function() {
      // Add smooth scrolling to all links
      $(".haha").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function() {

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    });
  </script>





</body>

</html>