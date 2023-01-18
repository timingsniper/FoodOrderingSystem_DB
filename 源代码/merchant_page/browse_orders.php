<?php

$conn = mysqli_connect('localhost','merchant','merchant','waimaidb');
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$mid= $_POST['merchant_id'];
$user=$_POST['user'];
if(isset($_GET['user']))$user = $_GET['user'];

echo "<form action='../merchant_page/merchant_page.php?user={$user}' method=\"post\">
  <input type=\"submit\" value=\"返回\">
  <input type=\"hidden\" name=\"merchant_id\" value=$mid>
  <input type=\"hidden\" name=\"user\" value=$user>
</form>
<h1> 订单浏览 </h1>
";
?>


<?php
$orders_sql = "SELECT * FROM orders WHERE merchant_id = '{$mid}'";
$orders_result = mysqli_query($conn,$orders_sql);



while($orders_row = mysqli_fetch_array($orders_result)){
  ?>
  <fieldset>
    <legend>订单编号：<?=$orders_row['order_id']?></legend>
    商家编号: <?=$orders_row['merchant_id']?> <br>
    下单时间: <?=$orders_row['order_time']?> <br>
    总价: <?=$orders_row['total_price']?> <br>
    订单状态: <?=$orders_row['order_status']?> <br>
    <form action="order_details.php" method="post">
      <input type="hidden" name="user" value="<?=$user?>">
      <input type='hidden' name='order_id' value="<?=$orders_row['order_id']?>">
      <input type='hidden' name='merchant_id' value="<?=$mid?>">
      <input type="submit" value="查看详情">
    </form>
    <?php
  if ($orders_row['order_status'] == 'ORDERED') {
    echo "<form action='../merchant_page/jiedan_page.php?user={$user}' method=\"post\">
    <input type=\"submit\" value=\"接单\">
    <input type=\"hidden\" name=\"merchant_id\" value=$mid>
    <input type=\"hidden\" name=\"order_id\" value=".$orders_row['order_id'].">
    <input type=\"hidden\" name=\"user\" value=$user>
  </form>";
    
  }
    ?>
  </fieldset>
  <?php
}
?>
