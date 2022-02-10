<!-- Connect start -->
<?php require '../admin/connect.php'; ?>
<!-- Connect end-->
<?php
session_start();
if (empty($_SESSION['id'])) {
    header('location:signin.php');
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
    <title>Đơn hàng</title>
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
            <div class="order">
                <div class="title">
                    <h3>Đơn hàng</h3>
                </div>
                <?php
                $sql = "select 
                orders.*,customer.name,customer.phone,customer.address from orders
                join customer on customer.id = orders.customer_id
                where customer_id = '$id'
                ORDER BY id DESC";
                $result = mysqli_query($connect, $sql);
                ?>
                <?php if (mysqli_num_rows($result) != 0) { ?>
                    <div>
                        <?php foreach ($result  as $each) { ?>
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
                                            <p class="status status_0 breadcrumb">
                                                <?php echo "Đang chuẩn bị"; ?>
                                            </p>
                                        <?php break;
                                        case '1': ?>
                                            <p class="status status_1 breadcrumb">
                                                <?php echo "Đã hoàn thành"; ?>
                                            </p>
                                        <?php break;
                                        case '2': ?>
                                            <p class="status status_2 breadcrumb">
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
                                        </div>

                                    <?php } ?>
                                </div>
                                <div class="row" style="justify-content: space-between;">
                                    <p>Tổng giá trị đơn hàng: <?php echo number_format($each_order['total_price'], 0, '', '.') ?> ₫</p>
                                    <?php if ($each['status'] == 0) { ?>
                                        <button class="delete btn-delete" data-id="<?php echo $each['id'] ?>">
                                            Huỷ đơn hàng
                                        </button>
                                    <?php } ?>
                                </div>
                                <div><a href="order_detail.php?order=<?php echo $each['id'] ?>" style="text-decoration: none;"><button>Xem chi tiết</button></a></div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div style="text-align: center;">
                        <h4>Bạn chưa có đơn hàng nào </h4>
                        <div><a href="../products.php" style="text-decoration: none;"><button>Mua sắm ngay</button></a></div>
                    </div>
                <?php } ?>
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
                        parent_order.find(".delete").remove();;
                    })
            };

        });
    });
</script>

</html>