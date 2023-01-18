<?php

$cid = $_POST['customer_id'];
$oid = $_POST['order_id'];
$user = $_POST['user'];
$conn = mysqli_connect("localhost",'customer','customer',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}


$update_status = "
  UPDATE orders
  SET order_status = 'CANCELED' WHERE order_id = '{$oid}'
";
$inc_sql = "UPDATE food INNER JOIN order_menu ON food.food_id = order_menu.food_id SET food.ordered_count = food.ordered_count-order_menu.quantity WHERE order_menu.order_id = '{$oid}'";
$inc_commit = mysqli_query($conn,$inc_sql); //Subtract the order count back again

try{
  echo $update_status."<br>";
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn,$update_status);
  mysqli_commit($conn);
}
catch(Exception $e){
      mysqli_rollback($conn);
      echo ' WARNING: WRONG DATA';
      error_log(mysqli_error($conn));
      header("Location: http://127.0.0.1/customer_page/browse_orders.php?status=1");
}
echo "<h1> 订单取消成功 </h1>";
echo
  "<form action=\"browse_orders.php?user={$user}\" method=\"post\">
    <input type=\"submit\" value=\"返回\">
    <input type=\"hidden\" name=\"user\" value=$user>
    <input type=\"hidden\" name=\"customer_id\" value=$cid>
  </form>";
?>
