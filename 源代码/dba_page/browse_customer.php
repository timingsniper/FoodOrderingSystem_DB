<?php

$conn = mysqli_connect('localhost','dba','dba','waimaidb');
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}

$user=$_POST['user'];
if(isset($_GET['user']))$user = $_GET['user'];

echo "<form action='../dba_page/dba_page.php?user={$user}' method=\"post\">
  <input type=\"submit\" value=\"返回\">
  <input type=\"hidden\" name=\"user\" value=$user>
</form>
<h1> 顾客浏览 </h1>
";
?>


<?php
$customer_sql = "SELECT * FROM customer";
$customer_result = mysqli_query($conn,$customer_sql);
while($customer_row = mysqli_fetch_array($customer_result)){
  ?>
  <fieldset>
    <legend>姓名: <?=$customer_row['name']?></legend>
    顾客编号: <?=$customer_row['customer_id']?> <br>
    出生日期: <?=$customer_row['dob']?> <br>
    性别: <?=$customer_row['sex']?> <br>
    联系电话: <?=$customer_row['phone']?> <br>
    邮件: <?=$customer_row['email']?> <br>
    配送地址: <?=$customer_row['delivery_addr']?> <br>
    
    <form action="delete_customer.php" method="post">
      <input type="hidden" name="user" value="<?=$user?>">
      <input type='hidden' name='customer_id' value="<?=$customer_row['customer_id']?>">
      <input type='hidden' name='username' value="<?=$customer_row['username']?>">
      <input type="submit" value="删除顾客">
    </form>
  </fieldset>
  <?php

}
?>
