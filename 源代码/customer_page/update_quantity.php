<?php
//$id = $_POST['food_id'];
//$mid = $_POST['merchant_id'];
$cid = $_POST['customer_id'];
$fid = $_POST['food_id'];
//$fname = $_POST['food_name'];
//$mname = $_POST['merchant_name'];
//$price = $_POST['food_price'];
$user = $_POST['user'];
$quantity = $_POST['quantity'];
$conn = mysqli_connect("localhost",'customer','customer',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}


$update_quantity = "
  UPDATE cart SET quantity = '{$quantity}'
  WHERE customer_id = '{$cid}' AND food_id = '{$fid}'
";
try{
  echo $update_quantity."<br>";
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn,$update_quantity);
  mysqli_commit($conn);
}
catch(Exception $e){
      mysqli_rollback($conn);
      echo ' WARNING: WRONG DATA';
      error_log(mysqli_error($conn));
      header("Location: http://127.0.0.1/customer_page/browse_cart.php?status=1");
}
echo "<h1> 修改成功 </h1>";
echo
  "<form action=\"browse_cart.php?user={$user}\" method=\"post\">
    <input type=\"submit\" value=\"返回\">
    <input type=\"hidden\" name=\"user\" value=$user>
    <input type=\"hidden\" name=\"customer_id\" value=$cid>
  </form>";
?>
