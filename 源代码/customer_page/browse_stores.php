<?php
$conn = mysqli_connect('localhost','customer','customer','waimaidb');
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$id= $_POST['customer_id'];
$user=$_POST['user'];
if(isset($_GET['user']))$user = $_GET['user'];


echo "<form action='../customer_page/customer_page.php?user={$user}' method=\"post\">
  <input type=\"submit\" value=\"返回\">
  <input type=\"hidden\" name=\"customer_id\" value=$id>
  <input type=\"hidden\" name=\"user\" value=$user>
</form>
<h1> 商家浏览 </h1>
";
?>


<?php
$store_sql = "SELECT merchant_id,merchant_name,merchant_addr,phone,menu_id FROM merchant WHERE is_open = 'YES'";
$store_result = mysqli_query($conn,$store_sql);
while($store_row = mysqli_fetch_array($store_result)){
  ?>
  <fieldset>
    <legend><?=$store_row['merchant_name']?></legend>
    商家编号: <?=$store_row['merchant_id']?> <br>
    地址: <?=$store_row['merchant_addr']?> <br>
    电话: <?=$store_row['phone']?> <br>
    <form action="browse_menu.php" method="post">
      <input type="hidden" name="user" value="<?=$user?>">
      <input type='hidden' name='merchant_id' value="<?=$store_row['merchant_id']?>">
      <input type='hidden' name='merchant_name' value="<?=$store_row['merchant_name']?>">
      <input type='hidden' name='customer_id' value="<?=$id?>">
      <input type="submit" value="浏览菜单">
    </form>
  </fieldset>
  <?php
}
?>
