<?php
$user = $_POST['user'];
echo "<h3>找出在30天内顾客消费次数少于全部商家平均接待次数的商家姓名, 编号</h3>";
$conn = mysqli_connect("localhost",'dba','dba',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}

$sql = "
SELECT m.merchant_id, m.merchant_name, IFNULL(num_orders, 0) as num_ord
FROM merchant m
LEFT JOIN (SELECT o.merchant_id, COUNT(*) as num_orders
           FROM orders o
           WHERE o.order_time >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND o.order_status != 'CANCELED'
           GROUP BY o.merchant_id) temp ON temp.merchant_id = m.merchant_id
WHERE COALESCE(temp.num_orders, 0) < (SELECT AVG(COALESCE(temp2.num_orders, 0)) FROM
    (SELECT o.merchant_id, COUNT(*) as num_orders
     FROM orders o
     WHERE o.order_time >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND o.order_status != 'CANCELED'
     GROUP BY o.merchant_id
     UNION ALL
     SELECT m.merchant_id, 0 as num_orders
     FROM merchant m
     WHERE m.merchant_id NOT IN (SELECT o.merchant_id FROM orders o 
     WHERE o.order_time >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND o.order_status != 'CANCELED')) temp2);
";
$avg_sql = "
SELECT AVG(COALESCE(temp2.num_orders, 0)) as av FROM
    (SELECT o.merchant_id, COUNT(*) as num_orders
     FROM orders o
     WHERE o.order_time >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND o.order_status != 'CANCELED'
     GROUP BY o.merchant_id
     UNION ALL
     SELECT m.merchant_id, 0 as num_orders
     FROM merchant m
     WHERE m.merchant_id NOT IN (SELECT o.merchant_id FROM orders o 
     WHERE o.order_time >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND o.order_status != 'CANCELED')) temp2;
";


$result = mysqli_query($conn,$sql);
$avg_result = mysqli_query($conn,$avg_sql);
$avg_row = mysqli_fetch_array($avg_result);
echo "<tr><td>顾客平均消费数：</td><td>".$avg_row['av']."</td></tr>";
while($row = mysqli_fetch_array($result)){
    ?>
    <fieldset>
      商家名: <?=$row['merchant_name']?><br>
      商家编号: <?=$row['merchant_id']?><br>
      顾客消费次数: <?=$row['num_ord']?><br>
    </fieldset>
    <?php
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
