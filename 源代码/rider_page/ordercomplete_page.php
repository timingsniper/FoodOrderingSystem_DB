<?php
//$id = $_POST['food_id'];
$rid = $_POST['rider_id'];
$oid = $_POST['order_id'];
$user = $_POST['user'];
$conn = mysqli_connect("localhost",'rider','rider',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}


$change_stat = "
  UPDATE orders
  SET order_status = 'DONE', updated_at = now() WHERE order_id = '{$oid}'
";
try{
  echo $change_stat."<br>";
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn,$change_stat);
  mysqli_commit($conn);
}
catch(Exception $e){
      mysqli_rollback($conn);
      echo ' WARNING: WRONG DATA';
      error_log(mysqli_error($conn));
      header("Location: http://127.0.0.1/rider_page/browse_rider_orders.php?status=1");
}
echo "<h1> 状态更改成功 ！</h1>";
echo
  "<form action=\"browse_rider_orders.php?user={$user}\" method=\"post\">
    <input type=\"submit\" value=\"返回\">
    <input type='hidden' name='user' value='{$user}'>
    <input type='hidden' name='rider_id' value='{$rid}'>
  </form>";
?>
