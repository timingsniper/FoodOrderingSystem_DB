<?php

$conn = mysqli_connect('localhost','dba','dba','waimaidb');
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}

$user=$_POST['user'];
if(isset($_GET['user']))$user = $_GET['user'];

echo "<form action='../dba_page/dba_page.php?user={$user}' method=\"post\">
  <input type=\"submit\" value=\"返回\">
  <input type=\"hidden\" name=\"user\" value=$user>
</form>
<h1> 骑手浏览 </h1>
";
?>


<?php
$rider_sql = "SELECT * FROM rider";
$rider_result = mysqli_query($conn,$rider_sql);
while($rider_row = mysqli_fetch_array($rider_result)){
  ?>
  <fieldset>
    <legend>姓名: <?=$rider_row['rider_name']?></legend>
    骑手编号: <?=$rider_row['rider_id']?> <br>
    加入日期 <?=$rider_row['joinTime']?> <br>
    体温: <?=$rider_row['temp']?> <br>
    核酸结果: <?=$rider_row['pcr']?> <br>
    核算结果上传时间: <?=$rider_row['pcr_time']?> <br>
    联系电话: <?=$rider_row['phone']?> <br>
    家庭地址: <?=$rider_row['homeAddr']?> <br>
    
    <form action="delete_rider.php" method="post">
      <input type="hidden" name="user" value="<?=$user?>">
      <input type='hidden' name='rider_id' value="<?=$rider_row['rider_id']?>">
      <input type='hidden' name='username' value="<?=$rider_row['username']?>">
      <input type="submit" value="删除骑手">
    </form>
  </fieldset>
  <?php

}
?>
