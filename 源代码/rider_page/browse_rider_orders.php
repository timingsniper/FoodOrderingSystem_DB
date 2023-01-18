<?php

$conn = mysqli_connect('localhost','rider','rider','waimaidb');
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$rid= $_POST['rider_id'];
$user=$_POST['user'];
if(isset($_GET['user']))$user = $_GET['user'];

echo "<form action='../rider_page/rider_page.php?user={$user}' method=\"post\">
  <input type=\"submit\" value=\"返回\">
  <input type=\"hidden\" name=\"rider_id\" value=$rid>
  <input type=\"hidden\" name=\"user\" value=$user>
</form>
<h1> 我的订单浏览-骑手 </h1>
";
?>


<?php
$orders_sql = "SELECT * FROM orders WHERE rider_id = '{$rid}'";
$orders_result = mysqli_query($conn,$orders_sql);



while($orders_row = mysqli_fetch_array($orders_result)){
  ?>
  <fieldset>
    <legend>订单编号：<?=$orders_row['order_id']?></legend>
    商家编号: <?=$orders_row['rider_id']?> <br>
    下单时间: <?=$orders_row['order_time']?> <br>
    总价: <?=$orders_row['total_price']?> <br>
    订单状态: <?=$orders_row['order_status']?> <br>
    <form action="order_details.php" method="post">
      <input type="hidden" name="user" value="<?=$user?>">
      <input type='hidden' name='order_id' value="<?=$orders_row['order_id']?>">
      <input type='hidden' name='rider_id' value="<?=$rid?>">
      <input type="submit" value="查看详情">
    </form>
    <?php
  if ($orders_row['order_status'] == 'QISHOUDAODIAN') {
    echo "<form action='../rider_page/peisongstart_page.php?user={$user}' method=\"post\">
    <input type=\"submit\" value=\"已取到餐, 改订单状态为配送中\">
    <input type=\"hidden\" name=\"rider_id\" value=$rid>
    <input type=\"hidden\" name=\"order_id\" value=" . $orders_row['order_id'] . ">
    <input type=\"hidden\" name=\"user\" value=$user>
  </form>";
  }
  else if ($orders_row['order_status'] == 'PEISONGZHONG') {
    echo "<form action='../rider_page/ordercomplete_page.php?user={$user}' method=\"post\">
    <input type=\"submit\" value=\"配送已完成, 改订单状态为已完成\">
    <input type=\"hidden\" name=\"rider_id\" value=$rid>
    <input type=\"hidden\" name=\"order_id\" value=".$orders_row['order_id'].">
    <input type=\"hidden\" name=\"user\" value=$user>
  </form>";
    
  }
    ?>
  </fieldset>
  <?php
}
?>
