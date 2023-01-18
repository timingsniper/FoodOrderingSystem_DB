<?php

$conn = mysqli_connect('localhost','customer','customer','waimaidb');
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$cid= $_POST['customer_id'];
$user=$_POST['user'];
if(isset($_GET['user']))$user = $_GET['user'];
$oid= $_POST['order_id'];

echo "<form action='../customer_page/browse_orders.php?user={$user}' method=\"post\">
  <input type=\"submit\" value=\"返回\">
  <input type=\"hidden\" name=\"customer_id\" value=$cid>
  <input type=\"hidden\" name=\"user\" value=$user>
</form>
<h1> 订单详情： 订单{$oid} </h1>
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
