<?php

$conn = mysqli_connect('localhost','customer','customer','waimaidb');
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$id= $_POST['customer_id'];
$user=$_POST['user'];
if(isset($_GET['user']))$user = $_GET['user'];

echo "<form action='../customer_page/customer_page.php?user={$user}' method=\"post\">
  <input type=\"submit\" value=\"返回\">
  <input type=\"hidden\" name=\"customer_id\" value=$id>
  <input type=\"hidden\" name=\"user\" value=$user>
</form>
<h1> 我的购物车 </h1>
";
?>


<?php
$cart_sql = "SELECT food_id,food_name,food_price,merchant_id,merchant_name,quantity FROM cart WHERE customer_id = '{$id}'";
$sum_sql = "SELECT sum(food_price*quantity) as total FROM cart WHERE customer_id = '{$id}'";
$cart_result = mysqli_query($conn,$cart_sql);
$sum_result = mysqli_query($conn,$sum_sql);
$sum_row = mysqli_fetch_array($sum_result);
$info_sql = "SELECT * FROM customer WHERE username= '{$user}' OR customer_id='{$id}'";
$customer_info = mysqli_query($conn, $info_sql);
$customer_row = mysqli_fetch_array($customer_info);
while($cart_row = mysqli_fetch_array($cart_result)){
  $mid = $cart_row['merchant_id'];
  $mname = $cart_row['merchant_name'];
  ?>
  <fieldset>
    <legend><?=$cart_row['food_name']?></legend>
    数量: 
    <form action="update_quantity.php"method="post">
      <input type="text" name="quantity" placeholder=<?=$cart_row['quantity']?> minlength="1" required>
      <input type='hidden' name='customer_id' value="<?=$id?>">
      <input type='hidden' name='food_id' value="<?=$cart_row['food_id']?>">
      <input type="hidden" name="user" value="<?=$user?>">
      <input type="submit" value="修改">
    </form></td></tr>
    单价: <?=$cart_row['food_price']?> <br>
    商家: <?=$cart_row['merchant_name']?> <br>
    菜编号: <?=$cart_row['food_id']?> <br>
    <form action="delete_cart.php" method="post">
      <input type="hidden" name="user" value="<?=$user?>">
      <input type='hidden' name='food_id' value="<?=$cart_row['food_id']?>">
      <input type='hidden' name='merchant_id' value="<?=$cart_row['merchant_id']?>">
      <input type='hidden' name='customer_id' value="<?=$id?>">
      <input type="submit" value="删除">
    </form>
  </fieldset>
  <?php
}

$storecheck_sql = "SELECT count(distinct merchant_id) as num FROM cart WHERE customer_id = '{$id}'";
$check_result = mysqli_query($conn,$storecheck_sql);
$check_row = mysqli_fetch_array($check_result);

if(mysqli_num_rows($cart_result) != 0){ //There are menus from different shops mixed in the cart
  if($check_row['num'] != 1){
    echo "<tr><td>只能从一家商店下单！ </td><td>";
  }
  
  else{
  echo "<tr><td>总价格: </td><td>".$sum_row['total']."</td></tr>
    <form action=\"place_order.php\"method=\"post\">
      <input type='hidden' name='user' value=$user>
      <input type=\"hidden\" name=\"phone\" value=".$customer_row['phone'].">
      <input type=\"hidden\" name=\"total_price\" value=".$sum_row['total'].">
      <input type=\"hidden\" name=\"merchant_id\" value=".$mid.">
      <input type=\"hidden\" name=\"merchant_name\" value=".$mname.">
      <input type=\"hidden\" name=\"delivery_addr\" value=\"".$customer_row['delivery_addr']."\">
      <input type=\"hidden\" name=\"customer_id\" value=".$id.">
      <input type=\"submit\" value=\"下单\">
    </form></td></tr>";
  }
}
?>
