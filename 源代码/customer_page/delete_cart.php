<?php

$cid = $_POST['customer_id'];
$fid = $_POST['food_id'];
$user = $_POST['user'];
$conn = mysqli_connect("localhost",'customer','customer',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}


$delete_cart = "
  DELETE FROM cart
  WHERE customer_id = '{$cid}' AND food_id = '{$fid}'
";
try{
  echo $delete_cart."<br>";
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn,$delete_cart);
  mysqli_commit($conn);
}
catch(Exception $e){
      mysqli_rollback($conn);
      echo ' WARNING: WRONG DATA';
      error_log(mysqli_error($conn));
      header("Location: http://127.0.0.1/customer_page/browse_cart.php?status=1");
}
echo "<h1> 删除成功 </h1>";
echo
  "<form action=\"browse_cart.php?user={$user}\" method=\"post\">
    <input type=\"submit\" value=\"返回\">
    <input type=\"hidden\" name=\"user\" value=$user>
    <input type=\"hidden\" name=\"customer_id\" value=$cid>
  </form>";
?>
