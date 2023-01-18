<?php
$id = $_POST['food_id'];
$mid = $_POST['merchant_id'];
$user = $_POST['user'];
$conn = mysqli_connect("localhost",'dba','dba',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}


$delete_food = "
    DELETE FROM food
    WHERE food_id = '{$id}'
";
try{
  echo $delete_food."<br>";
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn,$delete_food);
  mysqli_commit($conn);
}
catch(Exception $e){
      mysqli_rollback($conn);
      echo ' WARNING: WRONG DATA';
      error_log(mysqli_error($conn));
      header("Location: http://127.0.0.1/merchant_page/edit_menu.php?status=1");
}
echo "<h1> 删除成功 ！</h1>";
echo
  "<form action=\"edit_menu.php?user={$user}\" method=\"post\">
    <input type=\"submit\" value=\"返回\">
    <input type='hidden' name='user' value='{$user}'>
    <input type='hidden' name='merchant_id' value='{$mid}'>
  </form>";
?>
