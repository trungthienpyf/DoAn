<?php require '../check_super_admin_login.php';
 include '../menu_top.php';
 require '../connect.php';  

$sql="select *,LPAD(phone, 10, '0') AS phone from admin";
$result=mysqli_query($connect,$sql);



 ?>

    <h2 style="padding: 10px 10px 10px 20px; display: inline-block; color: #0c2d68;" >Nhân viên</h2>
    <br>
    <?php require '../check_error_success.php'; ?>
    <a class="create_title" href="form_insert.php">Thêm nhân viên</a>
    <table>
      <tr>
          <th>ID</th>  
          <th>Tên</th>  
          <th>Email</th>  
          <th>Điện thoại</th>  
          <th>Địa chỉ</th>  
          <th>Cấp bậc</th> 
          <th>Sửa</th> 
          <th>Xóa</th> 
      </tr> 
      <?php foreach ($result as $key => $each) { ?>
      <tr style="text-align: center;">
        <td><?php echo $key+1?></td>  
        <td><?php echo $each['name']?></td>  
        <td><?php echo $each['email']?></td>  
        <td><?php echo $each['phone']?></td>  
        <td><?php echo $each['address']?></td> 
        <td>
            <?php switch ($each['level']) {
            case '1':
                echo "Super Admin";
                break;
            case '0':
                echo "Admin";
                break;
            }?>
        </td> 
        <?php if($each['level']==1){?>
        <td>
            <span style="color:rgb(120, 120, 120);">Sửa</span>
        </td>
        <td>
            <span style="color:rgb(120, 120, 120);">Xóa</span>
        </td>
         <?php }else{?>
        <td>
            <a class="alter_style" href="form_update.php?id=<?php echo $each['id']?>">Sửa</a>
        </td>
        <td>
            <button class="delete_style" onClick="delete_product(<?php echo $each['id'];?>,'<?php echo $each['name'];?>')">Xóa</button>
        </td>
         <?php } ?>
      </tr>
    <?php } ?>
    </table>
    <script type="text/javascript">
        function delete_product(id,name){
            if(confirm("Bạn có chắc chắn muốn xóa "+name+" ?")){
                window.location.href='process_delete.php?id='+id;
               
            }
        }
    </script>
<?php include '../menu_bottom.php'; ?>
