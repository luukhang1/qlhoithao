<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <h1 style="font-size: 70px;"> <i class="fas fa-highlighter    "></i> Top 5 Người Dùng Bình Luận Nhiều Nhất</h1>
        <div class="row p-4">
            <table class="table jumbotron">


                <tr>
                    <td>IDUser</td>
                    <td>Tên Dang Nhap</td>
                    <td>Gmail</td>
                    <td>Số lượt bình luận</td>
                </tr>
                <?php
                $conn = mysqli_connect('localhost:4000', 'root', '', 'hoithao');
                $sql = "SELECT A.user_id , A.ten, A.mail ,COUNT(A.user_id) AS soluong
                FROM
                (SELECT comments.id_user as user_id, user.username AS ten,user.email AS mail
                FROM comments , user 
                WHERE comments.id_user = user.id) AS A
                GROUP BY A.user_id 
                ORDER BY soluong DESC
                LIMIT 5";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {

                    echo '<tr>';
                    echo '<td>' . $row['user_id'] . '</td>';
                    echo '<td>' . $row['ten'] . '</td>';
                    echo '<td>' . $row['mail'] . '</td>';
                    echo '<td>' . $row['soluong'] . '</td>';
                    echo '</tr>';
                }
                mysqli_close($conn);

                ?>

            </table>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>