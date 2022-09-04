<?php require '../check_super_admin_login.php';
 include '../menu_top.php';
 require '../connect.php';  

$sql="select *,LPAD(phone, 10, '0') AS phone from customer";
$result=mysqli_query($connect,$sql);



 ?>

    <h2 style="padding: 10px 10px 10px 20px; display: inline-block; color: #0c2d68;" >Khách hàng</h2>
    <br>
    <?php require '../check_error_success.php'; ?>
   
    <table>
      <tr>
          <th>ID</th>  
          <th>Tên</th>  
          <th>Email</th>  
          <th>Điện thoại</th>  
          <th>Địa chỉ</th>  
          
 
      </tr> 
      <?php foreach ($result as $key => $each) { ?>
      <tr style="text-align: center;">
        <td><?php echo$each['id']?></td>  
        <td><?php echo $each['name']?></td>  
        <td><?php echo $each['email']?></td>  
        <td><?php echo $each['phone']?></td>  
        <td><?php echo $each['address']?></td> 
       
        
   
         
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
