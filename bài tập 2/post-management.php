<?php
session_start();
$conn = mysqli_connect('localhost:4000', 'root', '', 'hoithao');
$is_update = false;
$id = isset($_GET['id']) ? (int) $_GET['id'] : '';

$data = array();
$data['id'] = '';
$data['title'] = '';
$data['image'] = '';
$data['description'] = '';



if ($id) {
  $is_update = true;
  $sql = "select * from posts where id='$id' ";
  $sql1 = "DELETE FROM posts WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    mysqli_query($conn, $sql1);
  }
}

if (isset($_POST['them'])) {

  $id  = isset($_POST['id']) ? mysqli_escape_string($conn, (int) $_POST['id']) : '';
  $title  = isset($_POST['title']) ? mysqli_escape_string($conn, $_POST['title']) : '';
  $image  = isset($_POST['image']) ? mysqli_escape_string($conn, $_POST['image']) : '';
  $description  = isset($_POST['description']) ? mysqli_escape_string($conn, $_POST['description']) : '';

  if (!$id  || !$title || !$image || !$description) {


    echo "<script>alert('vui long nhap du thong tin')</script>";
  } else {





    $sql = "INSERT INTO `posts` (`id`, `title`, `image`, `description`) VALUES ('$id', '$title', '$image', '$description')";
    if (mysqli_query($conn, $sql)) {
      echo "<script>alert('them thanh cong')</script>";
    } else {
      echo "<script>alert('da co loi')</script>";
    }


    mysqli_close($conn);
  }
}


?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    .nav li a:hover {
      background-color: yellow;

    }

    .navbar-nav li a:hover {
      background-color: yellow;
    }

    table tr td {
      border: 1px solid white;
    }
  </style>
</head>

<body>
  <main class="container-fluid" style="background-color: ghostwhite;">

    <nav class="row ">
      <nav class="navbar navbar-expand-sm navbar-light font-weight-bold col" style="background-color: darkcyan;">
        <a class="navbar-brand" href="#">Trang qu???n l??</a>
        <div class="col-6">
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item ">
              <a class="nav-link" href="./admin.php">Trang ch??? </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./post-management.php">B??i vi???t</a>
            </li>
            <li class="nav-item">
              <a href="./user-management.php" class="nav-link">Ng?????i d??ng</a>
            </li>

            <li class="nav-item">
              <a href="./comment.php" class="nav-link">Ph???n h???i</a>
            </li>
            <li class="nav-item">
              <a href="login.php" class="nav-link">????ng xu???t</a>
            </li>

          </ul>

        </div>
      </nav>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-3  container-fluid p-4">
          <div class="d-flex flex-column jumbotron  font-weight-bold" style="width: 280px; height:100%; background-color: darkcyan; color:black;">
            <h3 style="color: black ; ">Qu???n l?? ng?????i d??ng</h3>
            <hr>
            <ul class="nav  flex-column mb-auto font-weight-bold">
              <li class="nav-item">
                <a href="./admin.php" class="nav-link" style="color: black;">
                  Trang Ch???
                </a>
              </li>
              <li>
                <a href="./post-management.php" class="nav-link " style="color: black;">
                  Qu???n l?? b??i ????ng
                </a>
              </li>
              <li>
                <a href="./user-management.php" class="nav-link " style="color: black;">

                  Qu???n l?? ng?????i d??ng
                </a>
              </li>
              <li>
                <a href="./comment.php" class="nav-link  " style="color: black;">

                  Ph???n h???i
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
          <section style="display: block;" class="row ">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="management-tab" data-toggle="tab" href="#management" role="tab" aria-controls="management" aria-selected="true">Qu???n l??</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="Posts-tab" data-toggle="tab" href="#Posts" role="tab" aria-controls="Posts" aria-selected="false">B??i ????ng</a>
              </li>

            </ul>
            <div class="tab-content " id="myTabContent">
              <div class="tab-pane fade show active font-weight-bolder " id="management" role="tabpanel" aria-labelledby="management-tab">
                <form action="post-management.php" method="POST">
                  <div class="card jumbotron">

                    <div class="card-body">
                      <div class="row">
                        <div class="col-3">
                          <div class="border p-3">
                            <img src="img/gioithieu.jpg" alt="" class="img-fluid">
                          </div>
                        </div>
                        <div class="col-9">
                          <div class="form-group">
                            <label for="YoutubeID">ID</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $data['id'] ?>">
                            <small id="helpId" class="form-text text-muted">id</small>
                          </div>
                          <div class="form-group">
                            <label for="titleID">Ti??u ?????</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $data['title'] ?>">
                            <small id="helpId" class="form-text text-muted">Ti??u ?????</small>
                          </div>
                          <div class="form-group">
                            <label for="ImageId">???nh</label>
                            <input type="text" class="form-control" name="image" value="<?php echo $data['image'] ?>">
                            <small id="helpId" class="form-text text-muted">Li??n k???t</small>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label for="description">N???i dung</label>
                        <div class="col">
                          <textarea name="description" cols="30" rows="10" class="form-control"><?php echo $data['description'] ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-muted">
                      <button class="btn btn-primary" name="them"><?php if ($is_update) {
                                                                    echo 'C???p Nh???t';
                                                                  } else {
                                                                    echo 'Th??m m???i';
                                                                  } ?></button>

                      <button class="btn btn-info" type="reset">reset</button>

                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade" id="Posts" role="tabpanel" aria-labelledby="Posts-tab">

                <table class="table table-striped " style="background: steelblue;color: white;">
                  <thead class="thead-inverse col-12">
                    <tr style="text-align: center;">
                      <th>id</th>
                      <th>Ti??u ?????</th>
                      <th>???nh</th>
                      <th>N???i dung</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $conn = mysqli_connect('localhost:4000', 'root', '', 'hoithao');
                    $sql = "SELECT * FROM `posts`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                      <?php echo '<tr>';
                      echo '<td>' . $row['id'] . '</td>';
                      echo '<td>' . $row['title'] . '</td>'; ?>
                      <td><img src="<?php echo $row['image']; ?>" class="img-fluid"></td>
                      <?php echo '<td>' . $row['description'] . '</td>' ?>

                      <td>
                        <a href="post-management.php?id=<?php echo $row['id']; ?>" style="color: white;"><i style="color: white;" class="fa fa-edit"></i>S???a</a>
                        <a href="delpost.php?id=<?php echo $row['id']; ?>" name="delete" id="delete" style="color: white;"><i style="color: white;" class="fa fa-trash"></i>X??a</a>
                      </td>


                    <?php }
                    mysqli_close($conn) ?>


                  </tbody>

                </table>


              </div>
            </div>
            <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> -->

          </section>
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
  <script>
    $('#myTab a').on('click', function(event) {
      event.preventDefault()
      $(this).tab('show')
    })
  </script>
  <script type="text/javascript">
    $("#delete").click(function() {
      $.ajax({
        method: "POST", // ph????ng th???c d??? li???u ???????c truy???n ??i
        url: "delpost.php", // g???i ?????n file server show_data.php ????? x??? l??
        data: $("#fr_form").serialize(), //l???y to??n th??ng tin c??c fields trong form b???ng h??m serialize c???a jquery
        success: function(response) { //k???t qu??? tr??? v??? t??? server n???u g???i th??nh c??ng
          console.log(response);
        }
      });
    });
  </script>
</body>

</html>