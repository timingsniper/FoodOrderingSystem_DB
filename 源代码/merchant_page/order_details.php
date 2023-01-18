<?php

$conn = mysqli_connect('localhost','merchant','merchant','waimaidb');
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$mid= $_POST['merchant_id'];
$user=$_POST['user'];
if(isset($_GET['user']))$user = $_GET['user'];
$oid= $_POST['order_id'];

$orderCus_sql = "SELECT customer_id FROM orders WHERE order_id = '{$oid}'";
$orderCus_result = mysqli_query($conn,$orderCus_sql);
$orderCus_row = mysqli_fetch_array($orderCus_result);

echo "<form action='../merchant_page/browse_orders.php?user={$user}' method=\"post\">
  <input type=\"submit\" value=\"返回\">
  <input type=\"hidden\" name=\"merchant_id\" value=$mid>
  <input type=\"hidden\" name=\"user\" value=$user>
</form>
<h1> 订单详情： 订单{$oid}， 点单用户编号：{$orderCus_row['customer_id']} </h1>
";
?>


<?php
$orders_sql = "SELECT * FROM order_menu WHERE order_id = '{$oid}'";
$orders_result = mysqli_query($conn,$orders_sql);


while($orders_row = mysqli_fetch_array($orders_result)){
  ?>
  <fieldset>
    <legend>菜名：<?=$orders_row['food_name']?></legend>
    菜品编号: <?=$orders_row['food_id']?> <br>
    单价: <?=$orders_row['food_price']?> <br>
    数量: <?=$orders_row['quantity']?> <br>
  </fieldset>
  <?php
}
?>
