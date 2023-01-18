<?php

$conn = mysqli_connect('localhost','customer','customer','waimaidb');
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$cid= $_POST['customer_id'];
$user=$_POST['user'];
if(isset($_GET['user']))$user = $_GET['user'];

echo "<form action='../customer_page/customer_page.php?user={$user}' method=\"post\">
  <input type=\"submit\" value=\"返回\">
  <input type=\"hidden\" name=\"customer_id\" value=$cid>
  <input type=\"hidden\" name=\"user\" value=$user>
</form>
<h1> 订单浏览 </h1>
";
?>


<?php
$orders_sql = "SELECT * FROM orders LEFT JOIN rider
ON orders.rider_id = rider.rider_id
WHERE customer_id = '{$cid}';";
$orders_result = mysqli_query($conn,$orders_sql);

while($orders_row = mysqli_fetch_array($orders_result)){
  ?>
  <fieldset>
    <legend>订单编号：<?=$orders_row['order_id']?></legend>
    商家编号: <?=$orders_row['merchant_id']?> <br>
    下单时间: <?=$orders_row['order_time']?> <br>
    总价: <?=$orders_row['total_price']?> <br>
    接单骑手编号: <?=$orders_row['rider_id']?> <br>
    接单骑手姓名: <?=$orders_row['rider_name']?> <br>
    订单状态: <?=$orders_row['order_status']?> <br>
    <form action="order_details.php" method="post">
      <input type="hidden" name="user" value="<?=$user?>">
      <input type='hidden' name='order_id' value="<?=$orders_row['order_id']?>">
      <input type='hidden' name='customer_id' value="<?=$cid?>">
      <input type="submit" value="查看详情">
    </form>
    <?php
    if ($orders_row['order_status'] == 'ORDERED') {
      echo "<form action='../customer_page/cancelOrder_page.php?user={$user}' method=\"post\">
      <input type=\"submit\" value=\"取消订单\">
      <input type=\"hidden\" name=\"customer_id\" value=$cid>
      <input type=\"hidden\" name=\"order_id\" value=".$orders_row['order_id'].">
      <input type=\"hidden\" name=\"user\" value=$user>
    </form>";
      
    }
    ?>
  </fieldset>
  <?php
}
?>
