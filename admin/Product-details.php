<?php
require_once('../model/connect.php');

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Sử dụng MySQLi với Prepared Statements để ngăn chặn SQL Injection
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $product = $result->fetch_assoc();
    } else {
        // Xử lý trường hợp không tìm thấy sản phẩm
        echo "Product not found.";
        exit();
    }
} else {
    // Xử lý trường hợp không có ID sản phẩm được truyền
    echo "Product ID not provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
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
<body>
        <?php include('./header.php')?>
        <div class="containers">
            <div class="content">
                <div class="item-left">
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" width="500" height="300" style="border-radius: 10px ;" alt="">
                </div>
                <div class="item-right">
                    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                    <div class="item-text">
                        <p>Trạng thái: còn hàng</p>
                        <p>Thể loại:...</p>
                        <p>Giá: <?php echo htmlspecialchars($product['price']); ?> đ</p>
                        <h4>Chọn gói sản phẩm</h4>
                        <div class="package">
                            <div>
                                <button>TK Thường</button>
                            </div>
                            <div>
                                <button>TK Pro</button>
                            </div>
                        </div>

                        <div class="pay">
                            <div class="buy">
                                <button>
                                    <i class="fa-solid fa-credit-card"></i> Mua ngay
                                </button>
                            </div>
                            
                            <div class="add-cart">
                                <button>
                                    <i class="fa-solid fa-cart-shopping"></i> Thêm vào Giỏ Hàng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('./footer.php')?>
</body>
</html>