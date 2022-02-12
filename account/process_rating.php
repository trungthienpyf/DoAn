<?php
if (isset($_POST['rating'])) {

    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    require '../admin/connect.php';
    $sql = "select * from comment_product 
    where customer_id = '$customer_id' and product_id='$product_id'";

    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) !== 1) {
        $sql = "INSERT INTO `comment_product`( `content`, `customer_id`, `product_id`, `star`) 
        VALUES ('$comment','$customer_id','$product_id','$rating')";
        mysqli_query($connect, $sql);
        mysqli_close($connect);
        echo "1";
        exit;
    } else {
        $sql = "UPDATE `comment_product` 
        SET 
        `content`='$comment',
        `star`='$rating' 
        where 
        `customer_id`='$customer_id' and `product_id`='$product_id'
        ";
        mysqli_query($connect, $sql);
        mysqli_close($connect);
        echo "1";
        exit;
    }
} else {
    echo "0";
}
