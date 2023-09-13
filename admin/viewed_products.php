<?php
require_once('../model/connect.php');
// Lấy danh sách ID sản phẩm đã xem từ cookie
// $viewedProducts = json_decode($_COOKIE['viewedProducts']);
// setcookie('viewedProducts', json_encode($viewedProducts), time() + 3600, '/');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./css/Product-details.css">
</head>
</head>
<body>
    <?php include('./header.php') ?>
    <div class="container">
        <h1>Lịch sử xem sản phẩm</h1>
        <div class="product-list">
            <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> Ảnh sản phẩm </th>
                                            <th> Tên sản phẩm</th>                                           
                                            <th> Giá </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $idk = isset($_COOKIE["viewd"]) ? unserialize($_COOKIE["viewd"]) : [];
                                        if (isset($idk)) {
                                            foreach ($idk as $id) {
                                                $sql = "SELECT * FROM products WHERE id = $id";
                                                $result = mysqli_query($conn, $sql);
                                                if (!$result) {
                                                    echo 'Không thể chọn!';
                                                } else {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        if ($row['image'] == null || $row['image'] == '') {
                                                            $Image = "";
                                                        } else {
                                                            $Image = $row['image'];
                                                        }
                                        ?>
                                                        <tr>
                                                            <!-- Ảnh sản phẩm -->
                                                            <td>
                                                                <center><img src="<?php echo $Image; ?>" width=" 100px;"></center>
                                                            </td>

                                                            <!-- Tên sản phẩm -->
                                                            <td><?php echo $row['name']; ?></td>

                                                            <!-- Giá của 1 sản phẩm -->
                                                            <td><?php echo number_format($row['price']); ?></td>
                                        <?php
                                                    }
                                                }
                                            }

                                        }
                                        ?>
                                    </tbody>
                                </table>
        </div>
    </div>
    <?php include('./footer.php') ?>
</body>
</html>
