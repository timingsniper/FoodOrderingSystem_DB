<?php

$mid = $_POST['merchant_id'];
$name = $_POST['food_name'];
$price = $_POST['food_price'];
$user = $_POST['user'];

$conn = mysqli_connect("localhost",'merchant','merchant',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}


$add_food = "
  INSERT INTO food (merchant_id,food_name,food_price)
  VALUE ('{$mid}','{$name}','{$price}')
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
      header("Location: http://127.0.0.1/merchant_page/edit_menu.php?status=1");
}
echo "<h1> 增加成功 ！</h1>";
echo
  "<form action=\"edit_menu.php?user={$user}\" method=\"post\">
    <input type=\"submit\" value=\"返回\">
    <input type='hidden' name='user' value='{$user}'>
    <input type='hidden' name='merchant_id' value='{$mid}'>
  </form>";
?>
