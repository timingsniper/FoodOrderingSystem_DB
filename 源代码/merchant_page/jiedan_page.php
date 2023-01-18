<?php
//$id = $_POST['food_id'];
//$mid = $_POST['merchant_id'];
$mid = $_POST['merchant_id'];
$oid = $_POST['order_id'];
//$fid = $_POST['food_id'];
//$fname = $_POST['food_name'];
//$mname = $_POST['merchant_name'];
//$price = $_POST['food_price'];
$user = $_POST['user'];
//$quantity = $_POST['quantity'];
$conn = mysqli_connect("localhost",'merchant','merchant',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}


$update_status = "
  UPDATE orders
  SET order_status = 'YIJIEDAN' WHERE order_id = '{$oid}'
";
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
      header("Location: http://127.0.0.1/merchant_page/browse_orders.php?status=1");
}
echo "<h1> 接单成功 </h1>";
echo
  "<form action=\"browse_orders.php?user={$user}\" method=\"post\">
    <input type=\"submit\" value=\"返回\">
    <input type=\"hidden\" name=\"user\" value=$user>
    <input type=\"hidden\" name=\"merchant_id\" value=$mid>
  </form>";
?>
