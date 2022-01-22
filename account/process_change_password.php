<?php
$id = $_POST['id'];
$password_old = $_POST['password_old'];
$password = $_POST['password'];

require '../admin/connect.php';
$sql = "select * from customer where id = '$id' limit 1";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
if ($password_old === $each['password']) {
    if ($password === $each['password']) {
        session_start();
        $_SESSION['error'] = "Mật khẩu mới không được trùng với mật khẩu cũ";
        header('location:change_password.php');
    } else {
        $sql = "update customer
        set
        password ='$password'
        where 
        id = '$id' ";
        mysqli_query($connect, $sql);
        mysqli_close($connect);

        require '../mail.php';
        $email = $each['email'];
        $name = $each['name'];
        $title = 'Mật khẩu đã được thay đổi';
        $content = "Mật khẩu đã được thay đổi. Vui lòng kiểm tra lại tài khoản.";
        sendmail($email, $name, $title, $content);

        session_start();
        $_SESSION['noti'] = "Đổi mật khẩu thành công";
        header('location:change_password.php');
    }
} else {
    session_start();
    $_SESSION['error'] = "Mật khẩu cũ không đúng";
    header('location:change_password.php');
}
