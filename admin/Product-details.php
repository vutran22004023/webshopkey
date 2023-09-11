<?php
require_once('../model/connect.php');

// Hàm để thêm sản phẩm vào lịch sử xem
function addToViewedProducts($productId) {
    // Kiểm tra nếu cookie lịch sử xem đã tồn tại
    if (isset($_COOKIE['viewed_products'])) {
        $viewedProducts = json_decode($_COOKIE['viewed_products'], true);

        // Kiểm tra xem sản phẩm hiện tại đã có trong mảng lịch sử xem chưa
        if (!in_array($productId, $viewedProducts)) {
            // Thêm ID sản phẩm vào đầu mảng lịch sử xem
            array_unshift($viewedProducts, $productId);

            // Giới hạn kích thước của mảng lịch sử xem (ví dụ: giữ lại 5 sản phẩm gần đây)
            $viewedProducts = array_slice($viewedProducts, 0, 5);

            // Lưu mảng lịch sử xem vào cookie
            setcookie('viewed_products', json_encode($viewedProducts), time() + 3600 * 24 * 30); // Lưu trong 30 ngày
        }
    } else {
        // Nếu cookie lịch sử xem chưa tồn tại, tạo một mảng lịch sử xem mới
        $viewedProducts = [$productId];

        // Lưu mảng lịch sử xem vào cookie
        setcookie('viewed_products', json_encode($viewedProducts), time() + 3600 * 24 * 30); // Lưu trong 30 ngày
    }
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
    <?php include('./header.php') ?>
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
                                <a style="color: #fff;text-decoration: none" href="delete-cart.php?id=0" class=""> <i class="fa-solid fa-credit-card"></i> Mua ngay</a>
                            </button>
                        </div>

                        <div class="add-cart">
                            <button>
                                <a style="color: #fff;text-decoration: none" href="addcart.php?id= <?php echo $product['id']; ?>" class=""> <i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <?php include('./footer.php') ?>
</body>

</html>