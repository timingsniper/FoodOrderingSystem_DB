<?php
//$id = $_POST['food_id'];
$conn = mysqli_connect("localhost",'customer','customer',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$mid = $_POST['merchant_id'];
$cid = $_POST['customer_id'];
//$fid = $_POST['food_id'];
//$fname = $_POST['food_name'];
$mname = $_POST['merchant_name'];
//$price = $_POST['food_price'];
$user = $_POST['user'];
$phone = $_POST['phone'];
$total_price = $_POST['total_price'];
$delivery_addr = $_POST['delivery_addr'];

$cart_sql = "SELECT food_id,food_name,food_price,merchant_id,merchant_name,quantity FROM cart WHERE customer_id = '{$cid}'";
$sum_sql = "SELECT sum(food_price*quantity) as total FROM cart WHERE customer_id = '{$cid}'";
$copy_sql = "INSERT INTO order_menu(food_name,food_price,food_id,quantity) SELECT food_name,food_price,food_id,quantity FROM cart WHERE customer_id = '{$cid}'";
$cart_result = mysqli_query($conn,$cart_sql);
$sum_result = mysqli_query($conn,$sum_sql);
$sum_row = mysqli_fetch_array($sum_result);

$create_order_sql = "
  INSERT INTO orders (order_time,customer_id,phone,total_price,merchant_id,delivery_addr)
  VALUE (now(),'{$cid}','{$phone}','{$total_price}','{$mid}','{$delivery_addr}')
";
try{
  echo $create_order_sql."<br>";
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  $result = mysqli_query($conn,$create_order_sql);
  mysqli_commit($conn);
}
catch(Exception $e){
      mysqli_rollback($conn);
      echo ' WARNING: WRONG DATA';
      error_log(mysqli_error($conn));
      header("Location: http://127.0.0.1/customer_page/browse_cart.php?status=1");
}

$orderid_sql = "SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1;";
$get_order = mysqli_query($conn,$orderid_sql);
$order_row = mysqli_fetch_array($get_order);

$copy_sql = "INSERT INTO order_menu(food_name,food_price,food_id,quantity) SELECT food_name,food_price,food_id,quantity FROM cart WHERE customer_id = '{$cid}'
             
";
$copy_order = mysqli_query($conn,$copy_sql);
$fill_sql = "UPDATE order_menu SET order_id = '{$order_row['order_id']}' WHERE order_id IS NULL";
$fill_order = mysqli_query($conn,$fill_sql);

$inc_sql = "UPDATE food INNER JOIN cart ON food.food_id = cart.food_id SET food.ordered_count = food.ordered_count+cart.quantity WHERE customer_id = '{$cid}'";
$inc_commit = mysqli_query($conn,$inc_sql);

$clear_cart = "DELETE FROM cart WHERE customer_id = '{$cid}'";
$cart_delete = mysqli_query($conn,$clear_cart);
echo "<h1> 下单成功 ！ 订单编号为 </td><td> ".$order_row['order_id']."</h1>";

echo
"<form action=\"browse_cart.php?user={$user}\" method=\"post\">
  <input type=\"submit\" value=\"返回\">
  <input type=\"hidden\" name=\"user\" value=$user>
  <input type=\"hidden\" name=\"customer_id\" value=$cid>
</form>";
?>
