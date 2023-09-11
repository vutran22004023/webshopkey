<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử xem sản phẩm</title>
</head>
<body>
    <h1>Lịch sử xem sản phẩm</h1>

    <?php
    require_once('../model/connect.php');
    // Kiểm tra xem cookie lịch sử xem đã tồn tại
    if (isset($_COOKIE['viewed_products'])) {
        $viewedProducts = json_decode($_COOKIE['viewed_products'], true);

        if (count($viewedProducts) > 0) {
            echo "<ul>";
            foreach ($viewedProducts as $productId) {
                // Lấy thông tin sản phẩm từ cơ sở dữ liệu và hiển thị
                $query = "SELECT * FROM products WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $productId);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    $product = $result->fetch_assoc();
                    echo "<li><a href='product-detail.php?id=$productId'>" . htmlspecialchars($product['name']) . "</a></li>";
                }
            }
            echo "</ul>";
        } else {
            echo "Chưa có sản phẩm nào trong lịch sử xem.";
        }
    } else {
        echo "Chưa có sản phẩm nào trong lịch sử xem.";
    }
    ?>

    <a href="index.php">Trang chủ</a>
</body>
</html>
