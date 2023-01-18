<?php

$conn = mysqli_connect('localhost','customer','customer','waimaidb');
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$id= $_POST['customer_id'];
$mid= $_POST['merchant_id'];
$mname= $_POST['merchant_name'];
$user=$_POST['user'];
if(isset($_GET['user']))$user = $_GET['user'];

echo "<form action='../customer_page/browse_stores.php?user={$user}' method=\"post\">
  <input type=\"submit\" value=\"返回\">
  <input type=\"hidden\" name=\"customer_id\" value=$id>
  <input type=\"hidden\" name=\"user\" value=$user>
</form>
<h1> 菜单浏览 </h1>
";
?>


<?php
$food_sql = "SELECT food_id,food_name,food_price,merchant_id FROM food WHERE merchant_id = '{$mid}'";
$menu_result = mysqli_query($conn,$food_sql);
while($menu_row = mysqli_fetch_array($menu_result)){
  ?>
  <fieldset>
    <legend><?=$menu_row['food_id']?></legend>
    菜名: <?=$menu_row['food_name']?> <br>
    单价: <?=$menu_row['food_price']?> <br>
    <form action="add_cart.php" method="post">
      <input type="hidden" name="user" value="<?=$user?>">
      <input type='hidden' name='food_id' value="<?=$menu_row['food_id']?>">
      <input type='hidden' name='food_name' value="<?=$menu_row['food_name']?>">
      <input type='hidden' name='food_price' value="<?=$menu_row['food_price']?>">
      <input type='hidden' name='merchant_id' value="<?=$menu_row['merchant_id']?>">
      <input type='hidden' name='merchant_name' value="<?=$mname?>">
      <input type='hidden' name='customer_id' value="<?=$id?>">
      <input type="submit" value="加入购物车">
    </form>
  </fieldset>
  <?php
}
?>
