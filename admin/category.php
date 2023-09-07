<?php
require_once('../model/connect.php');
$render = "";
    $sql = "SELECT id,image,name,price FROM products WHERE category_id=1  AND status = 0";
    $result = mysqli_query($conn, $sql);

    while ($kq = mysqli_fetch_assoc($result)) {
        $render .= '
            <div class="card" style="width: 18rem; margin-bottom:20px;">
            <img src="' . $kq['image'] . '" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">' . $kq['name'] . '</h5>
                <p class="card-text">' . $kq["price"] . '</p>
                <a href="Product-details.php?id=' . $kq['id'] . '" class="btn btn-primary">Chi Tiết</a>
                <a href="addcart.php?id=' . $kq['id'] . '" class="btn btn-primary">Thêm vào giỏ hàng</a>
            </div>
        </div>
            ';
    }
    $sql = "SELECT id,image,name,price FROM products WHERE category_id=2  AND status = 0";
    $result = mysqli_query($conn, $sql);

    while ($kq = mysqli_fetch_assoc($result)) {
        $render .= '
            <div class="card" style="width: 18rem; margin-bottom:20px;">
            <img src="' . $kq['image'] . '" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">' . $kq['name'] . '</h5>
                <p class="card-text">' . $kq["price"] . '</p>
                <a href="Product-details.php?id=' . $kq['id'] . '" class="btn btn-primary">Chi Tiết</a>
                <a href="addcart.php?id=' . $kq['id'] . '" class="btn btn-primary">Thêm vào giỏ hàng</a>
            </div>
        </div>
            ';
    } 
    $sql = "SELECT id,image,name,price FROM products WHERE category_id=3  AND status = 0";
    $result = mysqli_query($conn, $sql);

    while ($kq = mysqli_fetch_assoc($result)) {
        $render .= '
            <div class="card" style="width: 18rem; margin-bottom:20px;">
            <img src="' . $kq['image'] . '" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">' . $kq['name'] . '</h5>
                <p class="card-text">' . $kq["price"] . '</p>
                <a href="Product-details.php?id=' . $kq['id'] . '" class="btn btn-primary">Chi Tiết</a>
                <a href="addcart.php?id=' . $kq['id'] . '" class="btn btn-primary">Thêm vào giỏ hàng</a>
            </div>
        </div>
            ';
    } 
// Lấy dữ liệu từ form
$category_danhmuc = $_POST['category_danhmuc'];
$category_theloai = $_POST['category_theloai'];
$min_price = $_POST['min_price'];
$max_price = $_POST['max_price'];
$sapxep = $_POST['sapxep'];

// Xây dựng truy vấn SQL dựa trên các điều kiện lọc
$sql = "SELECT * FROM products  WHERE 1=1";

if ($category_danhmuc !== 'Tất cả') {
    $sql .= " AND danh_muc = '$category_danhmuc'";
}

if ($category_theloai !== 'Tất cả') {
    $sql .= " AND the_loai = '$category_theloai'";
}

if (!empty($min_price) && !empty($max_price)) {
    $sql .= " AND gia BETWEEN $min_price AND $max_price";
}

// Xử lý phần sắp xếp
if ($sapxep === 'Theochu') {
    $sql .= " ORDER BY ten_san_pham ASC";
} elseif ($sapxep === 'max') {
    $sql .= " ORDER BY gia ASC";
} elseif ($sapxep === 'min') {
    $sql .= " ORDER BY gia DESC";
}

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $render .= '
        <div class="card" style="width: 18rem; margin-bottom:20px;">
        <img src="' . $row['image'] . '" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">' . $row['name'] . '</h5>
            <p class="card-text">' . $row["price"] . '</p>
            <a href="Product-details.php?id=' . $row['id'] . '" class="btn btn-primary">View Details</a>
        </div>
    </div>
        ';
    }
}  

$conn->close();
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
    <link rel="stylesheet" href="./css/search.css">
</head>

<body>
    <?php include('../admin/header.php') ?>

    <div class="slider">
        <div class="contents">
            <div class="title">
                <h2>Tìm kiếm sản phẩm</h2>
            </div>
            <div class="search-bar">
                <form method="POST" action="category.php">
                    <tr>
                        <td class="tdLabel"><label for="category">Danh mục:</label></td>
                        <td>
                            <select name="category_danhmuc"> <!-- Đặt tên riêng biệt -->
                                <option value="Tất cả">Tất cả</option>
                                <option value="Window">Window</option>
                                <option value="Office">Office</option>
                                <option value="Game">Game</option>
                                <!-- Thêm các tùy chọn danh mục khác nếu cần -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdLabel"><label for="category">Thể Loại:</label></td>
                        <td>
                            <select name="category_theloai"> <!-- Đặt tên riêng biệt -->
                                <option value="Tất cả">Tất cả</option>
                                <option value="Window">Window bản quyền</option>
                                <option value="Office">Office bản quyền</option>
                                <option value="Game">Game fsdf</option>
                                <!-- Thêm các tùy chọn danh mục khác nếu cần -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="min_price">Giá từ:</label>
                            <input type="number" name="min_price">
                            <label for="max_price">đến:</label>
                            <input type="number" name="max_price">
                        </td>
                    </tr>
                    <tr>
                        <td class="tdLabel"><label for="sapxep">Sắp Xếp: </label></td>
                        <td>
                            <select name="sapxep"> <!-- Đặt tên riêng biệt -->
                                <option value="Theochu">Theo tên a-> z</option>
                                <option value="max">Theo giá tiền từ thấp -> cao</option>
                                <option value="min">Theo giá tiền từ cao -> thấp</option>
                                <!-- Thêm các tùy chọn sắp xếp khác nếu cần -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Tìm kiếm">
                        </td>
                    </tr>
                </form>
            </div>
            <div class="cards" style="width: 18rem; margin-bottom:20px;">
                <?php echo $render; ?>
            </div>
        </div>
    </div>

    <?php include('../admin/footer.php') ?>
</body>

</html>