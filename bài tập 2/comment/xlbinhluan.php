<?php


?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table tr td {
            border: 1px sloid black;
        }
    </style>
</head>

<body>

    <div class="row container-fluid">
        <h1 style="font-size: 70pt;"><i class="fas fa-comments    "></i>Tất cả bình luận</h1>
        <table class="table jumbotron">

            <tr>
                <td scope="row">Tên</td>
                <td>Email</td>
                <td>Bình luận</td>
            </tr>
            <?php
            $conn = mysqli_connect('localhost:4000', 'root', '', 'hoithao');


            $sql = "SELECT * FROM `comments`";
            $result = mysqli_query($conn, $sql);

            while ($data = mysqli_fetch_assoc($result)) {

                echo '<tr>';
                echo "<td>" . $data['name'] . "</td>";
                echo "<td>" . $data['email'] . "</td>";
                echo "<td>" . $data['comment'] . "</td>";
                echo '<tr>';
            }

            mysqli_close($conn);
            ?>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>