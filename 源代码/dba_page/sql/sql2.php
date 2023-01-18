<?php
$user = $_POST['user'];
echo "<h3>查找顾客消费次数最多的商家的信息，包括商家的名称、顾客消费次数，顾客消费次数相同的按照订单总额排序</h3>";
$conn = mysqli_connect("localhost",'dba','dba',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}

$sql = "
SELECT a.merchant_name AS merchant_name, a.merchant_id AS merch, b.order_num AS order_num, b.total_amt AS total_amt
FROM (
  SELECT merchant_id, merchant_name
  FROM merchant
) AS a
NATURAL JOIN (
  SELECT merchant_id, COUNT(*) AS order_num, SUM(total_price) AS total_amt
  FROM orders WHERE order_status != 'CANCELED'
  GROUP BY merchant_id
) AS b
WHERE b.order_num = (
  SELECT MAX(order_num)
  FROM (
    SELECT COUNT(*) AS order_num
    FROM orders WHERE order_status != 'CANCELED'
    GROUP BY merchant_id
  ) AS c
)
ORDER BY order_num DESC, total_amt DESC;
";


  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result)){
    ?>
    <fieldset>
      <legend>商家名：<?=$row['merchant_name']?></legend>
      商家编号: <?=$row['merch']?><br>
      订单数量: <?=$row['order_num']?><br>
      订单总额: <?=$row['total_amt']?><br>
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
