<!-- Connect start -->
<?php require '../admin/connect.php'; ?>
<!-- Connect end-->
<?php
session_start();
if (empty($_SESSION['id'])) {
    header('location:signin.php');
}
$id_product = $_GET['product'];
$id_order = $_GET['order'];
$sql = "select * FROM detail_orders where orders_id = '$id_order' and product_id= '$id_product'";
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
    <link rel="stylesheet" href="../assets/css/rating.css">
    <title>Đánh giá</title>
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
                    <h3>Đánh giá</h3>
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
                                        where orders_id = '$order_id' and product_id = '$id_product' 
                                        limit 1";
                        $result_order = mysqli_query($connect, $sql);
                        $each_order = mysqli_fetch_array($result_order);
                        ?>

                        <div class="header_order">
                            <div class="row">
                                <div style="width: 25%;">
                                    <img class="img_rating" src="../admin/product/photos/<?php echo $each_order['img'] ?>">
                                </div>
                                <div style="width: 75%;">
                                    <?php echo $each_order['name'] ?>
                                    <?php
                                    if ($each_order['size']) {
                                        echo "Size: " . ($each_order['size']);
                                    }
                                    ?>
                                    <?php
                                    $id = $_SESSION['id'];
                                    $sql = "select * from comment_product
                                    where customer_id = $id and product_id = $id_product
                                    limit 1";
                                    $result = mysqli_query($connect, $sql);
                                    $each = mysqli_fetch_array($result);
                                    if (mysqli_num_rows($result) == 1) {
                                        switch ($each['star']) {
                                            case '1':
                                                $checked_1 = "checked";
                                                $checked_2 = "";
                                                $checked_3 = "";
                                                $checked_4 = "";
                                                $checked_5 = "";
                                                break;
                                            case '2':
                                                $checked_1 = "";
                                                $checked_2 = "checked";
                                                $checked_3 = "";
                                                $checked_4 = "";
                                                $checked_5 = "";
                                                break;
                                            case '3':
                                                $checked_1 = "";
                                                $checked_2 = "";
                                                $checked_3 = "checked";
                                                $checked_4 = "";
                                                $checked_5 = "";
                                                break;
                                            case '4':
                                                $checked_1 = "";
                                                $checked_2 = "";
                                                $checked_3 = "";
                                                $checked_4 = "checked";
                                                $checked_5 = "";
                                                break;
                                            case '5':
                                                $checked_1 = "";
                                                $checked_2 = "";
                                                $checked_3 = "";
                                                $checked_4 = "";
                                                $checked_5 = "checked";
                                                break;
                                            default:
                                                break;
                                        }
                                        $comment = $each['content'];
                                    } else {
                                        $checked_1 = "";
                                        $checked_2 = "";
                                        $checked_3 = "";
                                        $checked_4 = "";
                                        $checked_5 = "";
                                        $comment = "";
                                    }
                                    ?>
                                    <form id="form-rating">
                                        <fieldset>
                                            <input type="hidden" name="product_id" id="product_id" value=" <?php echo $each_order['product_id'] ?> ">
                                            <input type="hidden" name="customer_id" id="customer_id" value=" <?php echo $id ?> ">
                                            <span class="star-cb-group">
                                                <input <?php echo $checked_5 ?> type="radio" id="rating-5" name="rating" value="5" /><label for="rating-5">5</label>
                                                <input <?php echo $checked_4 ?> type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
                                                <input <?php echo $checked_3 ?> type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
                                                <input <?php echo $checked_2 ?> type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
                                                <input <?php echo $checked_1 ?> type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
                                            </span>
                                        </fieldset>
                                        <textarea style="resize: none;padding: 5px;" name="comment" id="comment" cols="50" rows="7"><?php echo  $comment ?></textarea>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button id="btn-rating" disabled class="disable_button"> Đánh giá </button>
                        </div>
                    </div>
                    <a href="order_detail.php?order=<?php echo $id_order ?>">
                        << Quay lại đơn hàng</a>
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

        <?php
        $sql = "select * from comment_product
        where customer_id = '$id' and product_id='$id_product'";
        $result = mysqli_query($connect, $sql);
        $each_rating = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) == 1) {
        ?>
            $("#comment").val("<?php echo $each_rating['content'] ?>");
            switch (<?php echo $each_rating['star'] ?>) {
                case 1:
                    $("#form-rating input[name='rating'][value='1']").prop("checked", true);
                    break;
                case 2:
                    $("#form-rating input[name='rating'][value='2']").prop("checked", true);
                    break;
                case 3:
                    $("#form-rating input[name='rating'][value='3']").prop("checked", true);
                    break;
                case 4:
                    $("#form-rating input[name='rating'][value='4']").prop("checked", true);
                    break;
                case 5:
                    $("#form-rating input[name='rating'][value='5']").prop("checked", true);
                    break;
                default:
                    break;
            }
        <?php
        }
        ?>

        $("#form-rating input[name='rating']").change(function() {
            $("#btn-rating").removeAttr("disabled");
            $("#btn-rating").removeClass("disable_button");
        });

        $('#btn-rating').click(function(e) {
            console.log("1");
            $.ajax({
                    type: "POST",
                    url: "process_rating.php",
                    data: $("#form-rating").serializeArray(),
                    dataType: "html",
                })
                .done(function(response) {
                    console.log("2");
                    if (response === '1') {
                        alert("Cảm ơn đánh giá của bạn!")
                    }
                });

        });

    });
</script>

</html>