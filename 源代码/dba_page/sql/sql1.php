<?php
$user = $_POST['user'];
echo "<h3>找出2021年1月1日之后点餐次数前十的顾客, 按照点餐次数进行降序排序; 若次数相同, 则按照顾客姓名拼音次序排序 </h3>";
$conn = mysqli_connect("localhost",'dba','dba',"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$temp_sql = "
create temporary table customer_record_num as(
	select customer_id, count(*) as record_num
	from orders
	where date(order_time) >= '2021-1-1' and order_status != 'CANCELED'
	group by customer_id
);
";
$sql = "
select name, record_num
from customer natural join customer_record_num
order by record_num desc, name asc
limit 10;
";


try{
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn,$temp_sql);
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result)){
    echo "<p>".$row['name'].", Ordered: ".$row['record_num']." times</p>";
  }
  mysqli_commit($conn);

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
