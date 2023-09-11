<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    session_start();
    error_reporting(E_ALL ^ E_DEPRECATED);
    require_once("../model/connect.php");

    // Hủy giỏ hàng:
    if (isset($_GET["idCancel"]))
    {
        $idCancel = $_GET["idCancel"];
        if ($idCancel == 0)
        {
            unset($_SESSION["cart"]);
            header("location:home.php");
        }
    }

    if (isset($_GET["id"]))
    {
        $id = $_GET["id"];
        // id = 0 là đặt hàng
        if ($id == 0)
        {
            $infor = $_SESSION["infor"];
            $total = $_SESSION["total"];

            // Khi khách hàng đã có tài khoản click vào mua sản phẩm
            if (isset($_SESSION["username"]))
            {
                $iduser = $_SESSION["id-user"];
                // Chèn vào bảng order:
                $ins = "INSERT INTO orders (total, date_order, user_id) VALUES ($total, now(), $iduser);";
                $resOrders = mysqli_query($conn,$ins);

                $sqlUser = "SELECT * FROM users WHERE id = " . $iduser;
                $resUser = mysqli_query($conn,$sqlUser);
                while ($row = mysqli_fetch_assoc($resUser))
                {
                    $name = $row["username"];
                    $email = $row["email"];
                    $address = $row["address"];
                    $phone = $row["phone"];
                }

                $selectSP = "SELECT * FROM orders WHERE user_id = " . $iduser;
                $result = mysqli_query($conn,$selectSP);
                while ($row = mysqli_fetch_assoc($result))
                {
                    $idOrder = $row["id"];
                }
            }

            // Khi khách hàng chưa có user click vào mua sản phẩm
            if (isset($_POST["checkout_submit"]))
            {
                $fullname = $_SESSION["name_cus"];
                $email = $_SESSION["email_cus"];
                $address = $_SESSION["address"];
                $phone = $_SESSION["phone_cus"];

                // Chèn vào bảng users:
                $sql = "INSERT INTO users (username, password, fullname, email, address, phone) VALUES ('', '','$fullname','$email','$address','$phone')";
                $resCus = mysqli_query($conn,$sql);

                $sel = "SELECT id FROM users ORDER BY id";
                $result = mysqli_query($conn,$sel);
                while ($row = mysqli_fetch_assoc($result))
                {
                    $user_id = $row["id"];
                }
                // Chèn vào bảng order:
                $ins = "INSERT INTO orders (total, date_order, user_id) VALUES ($total, now(), $user_id);";
                $resOrders = mysqli_query($conn,$ins);
                $flag = true;
                if (!$resOrders) {
                    $flag = false;
                }

                $selectSP = "SELECT * FROM orders ORDER BY id DESC LIMIT 1";
                $res = mysqli_query($conn,$selectSP);
                while ($row = mysqli_fetch_assoc($res)) {
                    $idOrder = $row["id"];
                }
            }

            // Cart in header
            if (isset($_SESSION["cart"]))
            {
                foreach ($_SESSION["cart"] AS $id => $prd)
                {
                    $sql = "SELECT * FROM products WHERE id = $id";
                    $res = mysqli_query($conn,$sql);
                    if (!$res) {
                        echo "Không thể chọn!";
                    }
                    else {
                        while ($row = mysqli_fetch_assoc($res))
                        {
                            // Số lượng sản phẩm
                            $quantityProduct = $_SESSION["cart"][$row["id"]];
                            $sql = "INSERT INTO product_order (product_id, order_id, quantity) VALUES('$id', '$idOrder', '$quantityProduct');";
                            $resProductOrder = mysqli_query($conn,$sql);
                        }
                    }
                }
            }
            

            include('./email.php');
            

            // Xóa ết cart:
            unset($_SESSION["cart"]);
            unset($_SESSION["name_cus"]);
            unset($_SESSION["email_cus"]);
            unset($_SESSION["address"]);
            unset($_SESSION["phone_cus"]);
?>
            <script type="text/javascript">
                window.location = 'orderSuccess.php?idOrderDetail=<?php echo $idOrder; ?>';
            </script>
<?php
        }
        // Nếu có id sản phẩm được chọn thì xóa theo id của nó
        else
        {
            unset($_SESSION["cart"][$id]);
            header("location:view-cart.php");
        }
    }
?>