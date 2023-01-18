<?php

$rid = $_POST['rider_id'];
$user = $_POST['user'];
$id = $_POST['username'];

$conn = mysqli_connect("localhost",'dba','dba',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}


$delete_rider = "
    DELETE FROM rider
    WHERE rider_id = '{$rid}'
";
$delete_login_rider = "
    DELETE FROM login
    WHERE username = '{$id}'
";
try{
  echo $delete_rider."<br>";
  echo $delete_login_rider."<br>";
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn,$delete_rider);
  mysqli_query($conn,$delete_login_rider);
  mysqli_commit($conn);
}
catch(Exception $e){
      mysqli_rollback($conn);
      echo ' WARNING: WRONG DATA';
      error_log(mysqli_error($conn));
      header("Location: http://127.0.0.1/dba_page/browse_rider.php?status=1");
}
echo "<h1> 删除骑手成功 ！</h1>";
echo
  "<form action=\"browse_rider.php?user={$user}\" method=\"post\">
    <input type=\"submit\" value=\"返回\">
    <input type='hidden' name='user' value='{$user}'>
  </form>";
?>
