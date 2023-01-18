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
<h1> 商家浏览 </h1>
";
?>


<?php
$store_sql = "SELECT merchant_id,merchant_name,merchant_addr,phone,menu_id,is_open,username FROM merchant";
$store_result = mysqli_query($conn,$store_sql);
while($store_row = mysqli_fetch_array($store_result)){
  ?>
  <fieldset>
    <legend><?=$store_row['merchant_name']?></legend>
    商家编号: <?=$store_row['merchant_id']?> <br>
    地址: <?=$store_row['merchant_addr']?> <br>
    电话: <?=$store_row['phone']?> <br>
    是否正在营业: <?=$store_row['is_open']?> <br>
    <form action="edit_menu.php" method="post">
      <input type="hidden" name="user" value="<?=$user?>">
      <input type='hidden' name='merchant_id' value="<?=$store_row['merchant_id']?>">
      <input type='hidden' name='merchant_name' value="<?=$store_row['merchant_name']?>">
      <input type="submit" value="浏览/编辑菜单">
    </form>
    <form action="delete_store.php" method="post">
      <input type="hidden" name="user" value="<?=$user?>">
      <input type='hidden' name='merchant_id' value="<?=$store_row['merchant_id']?>">
      <input type='hidden' name='username' value="<?=$store_row['username']?>">
      <input type="submit" value="删除商家">
    </form>
  </fieldset>
  <?php

}
?>
