<?php
$user = $_POST['user'];
echo "<h3>找出在30天内订单异常次数(系统中存在顾客有效订单,但是超过2小时没有到达订单完成状态)超过2次的顾客的姓名和配送员姓名</h3>";
$conn = mysqli_connect("localhost",'dba','dba',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}

$sql = "
SELECT c.name AS customer_name, r.rider_name as rider_name, COUNT(*) as cnt
FROM orders o
JOIN customer c ON c.customer_id = o.customer_id
JOIN rider r ON r.rider_id = o.rider_id
WHERE o.order_status = 'DONE'
  AND o.updated_at > DATE_SUB(NOW(), INTERVAL 30 DAY)
  AND TIMESTAMPDIFF(HOUR, o.order_time, o.updated_at) > 2
GROUP BY o.customer_id
HAVING COUNT(*) > 2;
";


  $result = mysqli_query($conn,$sql);
$flag = 0;
  while($row = mysqli_fetch_array($result)){
    $flag = 1;
    ?>
    <fieldset>
      顾客姓名: <?=$row['customer_name']?><br>
      骑手姓名: <?=$row['rider_name']?><br>
      异常订单次数: <?=$row['cnt']?><br>
    </fieldset>
    <?php
  }
  if($flag == 0){
    echo "<h3>无</h3>";
  }
try{}
catch(Exception $e){
      mysqli_rollback($conn);
      echo ' WARNING: WRONG DATA';
      error_log(mysqli_error($conn));
      header("Location: http://127.0.0.1/dba_page/dba_page.php?user={$user}&status=1");
}

echo
  "<form action='../dba_page.php?user={$user}' method=\"post\">
    <input type=\"submit\" value=\"返回\">
  </form>";
?>
