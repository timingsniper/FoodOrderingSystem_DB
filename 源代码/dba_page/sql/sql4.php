<?php
$user = $_POST['user'];
echo "<h3>找出在14天内体温高于37.3度的配送员所接触过的商家和顾客的姓名、地址</h3>";
$conn = mysqli_connect("localhost",'dba','dba',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}

$sql = "
SELECT c.name as name, c.delivery_addr as addr
FROM customer c
JOIN `orders` o ON c.customer_id = o.customer_id
JOIN rider r ON o.rider_id = r.rider_id
WHERE r.temp > 37.3 AND o.order_time >= DATE_SUB(CURDATE(), INTERVAL 14 DAY);
";


  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result)){
    ?>
    <fieldset>
      顾客姓名: <?=$row['name']?><br>
      顾客地址: <?=$row['addr']?><br>
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
