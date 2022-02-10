<!-- Connect start -->
<?php require '../admin/connect.php'; ?>
<!-- Connect end-->
<?php
session_start();
if (empty($_SESSION['id'])) {
    header('location:signin.php');
}
$id_order = $_GET['order'];
$sql = "select * FROM orders where id = '$id_order'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) == 0) {
    header('location:../404.html');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/account.css">
    <link rel="stylesheet" href="../assets/css/order_acc.css">
    <title>Đơn hàng #<?php echo $id_order ?></title>
</head>

<body>
    <!-- Header start -->
    <?php require 'header.php' ?>
    <!-- Header end -->

    <!-- Main start -->
    <?php
    $id = $_SESSION['id'];
    $sql = "select * from customer where id = '$id' limit 1";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    ?>
    <div class="main_account">
        <div class="menu_left">
            <ul>
                <li>
                    <div class="account">
                        <i class="fas fa-user"></i>
                        <div>
                            <p>Tài khoản của</p>
                            <h6><?php echo $each['name'] ?></h6>
                        </div>

                    </div>
                </li>
                <li><a href="index.php">Thông tin cá nhân</a></li>
                <li><a href="order.php" class="active">Đơn hàng</a></li>
                <li><a href="change_password.php">Đổi mật khẩu</a></li>
            </ul>
        </div>
        <div class="content_right">
            <?php
            $sql = "select * from detail_orders
                join product on product.id = detail_orders.product_id
                join orders on orders.id = detail_orders.orders_id
                where orders_id = '$id_order'";
            $result = mysqli_query($connect, $sql);
            $each = mysqli_fetch_array($result);
            ?>

            <div class="order">
                <div class="title">
                    <h3>Đơn hàng</h3>
                </div>
                <div>
                    <div class="order_each">
                        <div class="row header_order">
                            <p class="breadcrumb">Đơn hàng #<?php echo $each['id'] ?></p>
                            <p class="breadcrumb">Đặt ngày
                                <?php
                                $d = strtotime($each['time']);
                                echo date("d-m-Y", $d);
                                ?>
                            </p>
                            <?php switch ($each['status']) {
                                case '0': ?>
                                    <p class="status status_0 ">
                                        <?php echo "Đang chuẩn bị"; ?>
                                    </p>
                                <?php break;
                                case '1': ?>
                                    <p class="status status_1">
                                        <?php echo "Đã hoàn thành"; ?>
                                    </p>
                                <?php break;
                                case '2': ?>
                                    <p class="status status_2">
                                        <?php echo "Đã huỷ"; ?>
                                    </p>
                            <?php break;
                                default:
                                    break;
                            } ?>
                        </div>
                        <?php
                        $order_id = $each['id'];
                        $sql = "select * from detail_orders
                                        join product on product.id = detail_orders.product_id
                                        join orders on orders.id = detail_orders.orders_id
                                        where orders_id = '$order_id'";
                        $result_order = mysqli_query($connect, $sql);
                        ?>
                        <div class="header_order">
                            <?php foreach ($result_order  as $each_order) { ?>
                                <div class="row">
                                    <div class="image item_flex">
                                        <img src="../admin/product/photos/<?php echo $each_order['img'] ?>">
                                    </div>
                                    <div class="name ">
                                        <?php echo $each_order['name'] ?>
                                    </div>
                                    <div class="price item_flex">
                                        ₫ <?php echo number_format($each_order['price'], 0, '', '.'); ?>
                                    </div>
                                    <div class="quantity item_flex">
                                        Qty: <?php echo $each_order['quantity'] ?>
                                    </div>
                                    <div class="quantity item_flex">
                                        <?php
                                        if ($each_order['size']) {
                                            echo "Size: " . ($each_order['size']);
                                        }
                                        ?>
                                    </div>
                                    <div class="quantity item_flex" style="width: 160px;">
                                        <?php
                                        if ($each_order['status'] == 1) { ?>
                                            <div><a href="rating.php?order=<?php echo $id_order ?>&product=<?php echo $each_order['product_id'] ?>" style="text-decoration: none;"><button>Viết đánh giá</button></a></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="header_order">
                            <div class="row" style="justify-content: space-between;">
                                <div class="info">
                                    <p>Tên người nhận: <?php echo $each['name_receive'] ?></p>
                                    <p>Số điện thoại người nhận: <?php echo $each['phone_receive'] ?></p>
                                    <p>Địa chỉ người nhận: <?php echo $each['address_receive'] ?></p>
                                </div>
                                <div class="info">
                                    <div style="border-bottom: .5px #a8dadc solid;">
                                        <h6>Tổng cộng</h6>
                                        <p>Tổng tiền <?php echo mysqli_num_rows($result_order) ?> sản phẩm <span style="float: right;font-weight: 500;"><?php echo number_format($each_order['total_price'], 0, '', '.') ?> ₫</span></p>
                                        <p>Phí vận chuyển <span style="float: right;font-weight: 500;">0 ₫</span></p>
                                        <p>Giảm giá <span style="float: right;font-weight: 500;">0 ₫</span></p>
                                    </div>
                                    <p>Tổng cộng <span style="float: right;font-weight: 500;"><?php echo number_format($each_order['total_price'], 0, '', '.') ?> ₫</span></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($each_order['status'] == 0) { ?>
                            <div>
                                <button class="btn-delete" data-id="<?php echo $each['id'] ?>">
                                    Huỷ đơn hàng
                                </button>
                            </div>
                        <?php } ?>
                    </div>
                    <a href="order.php ">
                        << Quay lại </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Main end -->


    <!-- Footer start -->
    <?php require 'footer.php' ?>
    <!-- Footer end -->

</body>
<script src="../assets/js/account.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".btn-delete").click(function() {
            let btn = $(this);
            if (confirm("Bạn chắc chắn muốn huỷ đơn hàng ?")) {
                let id = btn.data('id');
                $.ajax({
                        type: "POST",
                        url: "cancel.php",
                        data: {
                            id
                        }
                    })
                    .done(function() {
                        let parent_order = btn.parents('.order_each');
                        parent_order.find(".status").removeClass("status_0");
                        parent_order.find(".status").addClass("status_2");
                        parent_order.find(".status").text("Đã huỷ");
                        parent_order.find(".btn-delete").remove();;
                    })
            };

        });
    });
</script>

</html>