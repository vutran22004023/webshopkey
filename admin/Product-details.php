<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $idk = isset($_COOKIE["viewd"]) ? unserialize($_COOKIE["viewd"]) : [];

    // Thêm phần tử mới vào mảng
    $idk[] = $id;

    // Lưu trở lại cookie
    setcookie("viewd", serialize($idk), time() + 3600);

    if (isset($_SESSION['oview'][$id])) {
        $_SESSION['oview'][$id]++;
    } else {
        $_SESSION['oview'][$id] = 1;
    }
    
    // Tiếp tục xử lý sản phẩm với ID đã chuyển đổi
    require_once('../model/connect.php');

    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit();
    }
} else {
    echo "Product ID not provided.";
    exit();
}
?>

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
    <!-- <script>
        
    var productId = <?php echo $product['id']; ?>;
    var viewedProducts = JSON.parse(localStorage.getItem('viewedProducts')) || [];

    if (viewedProducts.indexOf(productId) === -1) {
        viewedProducts.push(productId);

        localStorage.setItem('viewedProducts', JSON.stringify(viewedProducts));
    }
</script> -->
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