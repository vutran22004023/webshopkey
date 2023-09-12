<?php
// Lấy danh sách ID sản phẩm đã xem từ cookie
$viewedProducts = json_decode($_COOKIE['viewedProducts']);

// Include file kết nối CSDL
require_once('../model/connect.php');
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
            <?php
            // Duyệt qua danh sách ID sản phẩm đã xem và hiển thị thông tin sản phẩm
            foreach ($viewedProducts as $productId) {
                $query = "SELECT * FROM products WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $productId);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    $product = $result->fetch_assoc();
                    // Hiển thị thông tin sản phẩm, ví dụ:
                    echo '<div class="product-item">';
                    echo '<img src="' . htmlspecialchars($product['image']) . '" alt="' . htmlspecialchars($product['name']) . '">';
                    echo '<h2>' . htmlspecialchars($product['name']) . '</h2>';
                    // Hiển thị các thông tin khác của sản phẩm
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
    <?php include('./footer.php') ?>
</body>
</html>
