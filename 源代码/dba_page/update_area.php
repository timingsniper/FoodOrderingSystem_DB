<?php
$user = $_POST['user'];
$aid = $_POST['area_id'];
$cstat = $_POST['covid_stat'];
$conn = mysqli_connect("localhost",'dba','dba',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}


$update_status = "
  UPDATE area
  SET covid_stat = '{$cstat}' WHERE area_id = '{$aid}'
";
$update_merchants= "
  UPDATE merchant INNER JOIN area ON merchant.area_id = area.area_id
  SET is_open= CASE
  WHEN covid_stat = 'YES' THEN 'NO'
  ELSE 'YES'
END
";

try{
  echo $update_status."<br>";
  echo $update_merchants."<br>";
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn,$update_status);
  mysqli_query($conn,$update_merchants);
  mysqli_commit($conn);
}
catch(Exception $e){
      mysqli_rollback($conn);
      echo ' WARNING: WRONG DATA';
      error_log(mysqli_error($conn));
      header("Location: http://127.0.0.1/dba_page/change_area_covidstat.php?status=1");
}
echo "<h1> 更新成功 </h1>";
echo
  "<form action=\"change_area_covidstat.php?user={$user}\" method=\"post\">
    <input type=\"submit\" value=\"返回\">
    <input type=\"hidden\" name=\"user\" value=$user>
  </form>";
?>
