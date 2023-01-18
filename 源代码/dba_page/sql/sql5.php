<?php
$user = $_POST['user'];
echo "<h3>找出在7天内的所有订单中, 消费总额最少的菜品名称, 若存在多种菜品的总额相同且最少, 则都列出</h3>";
$conn = mysqli_connect("localhost",'dba','dba',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}

$sql = "SELECT f.food_name as food_name, 
SUM(CASE WHEN o.order_status != 'CANCELED' THEN om.food_price * om.quantity ELSE 0 END) as total_revenue
FROM food f
LEFT JOIN order_menu om ON f.food_name = om.food_name
LEFT JOIN orders o ON om.order_id = o.order_id AND o.order_time >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
GROUP BY f.food_name
HAVING total_revenue = (SELECT MIN(total_revenue) 
FROM (SELECT SUM(CASE WHEN o.order_status != 'CANCELED' THEN om.food_price * om.quantity ELSE 0 END) as total_revenue
FROM food f LEFT JOIN order_menu om ON f.food_name = om.food_name LEFT JOIN orders o 
ON om.order_id = o.order_id AND o.order_time >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
GROUP BY f.food_name) as min_revenue_foods);
";


try{
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result)){
    ?>
    <fieldset>
      菜名: <?=$row['food_name']?><br>
      消费总额: <?=$row['total_revenue']?><br>
    </fieldset>
    <?php
  }
}
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
