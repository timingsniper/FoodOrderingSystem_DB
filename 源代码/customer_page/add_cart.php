<?php

$mid = $_POST['merchant_id'];
$cid = $_POST['customer_id'];
$fid = $_POST['food_id'];
$fname = $_POST['food_name'];
$mname = $_POST['merchant_name'];
$price = $_POST['food_price'];
$user = $_POST['user'];

$conn = mysqli_connect("localhost",'customer','customer',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}


$add_food = "
  INSERT IGNORE INTO cart (customer_id,food_id,food_name,food_price,merchant_id,merchant_name)
  VALUE ('{$cid}','{$fid}','{$fname}','{$price}','{$mid}','{$mname}')
";
try{
  echo $add_food."<br>";
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn,$add_food);
  mysqli_commit($conn);
}
catch(Exception $e){
      mysqli_rollback($conn);
      echo ' WARNING: WRONG DATA';
      error_log(mysqli_error($conn));
      header("Location: http://127.0.0.1/customer_page/browse_menu.php?status=1");
}
echo "<h1> 增加成功! </h1>";
echo
  "<form action=\"browse_menu.php?user={$user}\" method=\"post\">
    <input type=\"submit\" value=\"返回\">
    <input type='hidden' name='user' value='{$user}'>
    <input type='hidden' name='merchant_id' value='{$mid}'>
    <input type='hidden' name='customer_id' value='{$cid}'>
    <input type='hidden' name='merchant_name' value='{$mname}'>
  </form>";
?>
