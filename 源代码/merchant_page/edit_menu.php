<?php

$conn = mysqli_connect('localhost','merchant','merchant','waimaidb');
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$id= $_POST['merchant_id'];
$user='';
if(isset($_GET['user']))$user = $_GET['user'];


echo "<form action='../merchant_page/merchant_page.php?user={$user}' method=\"post\">
  <input type=\"submit\" value=\"返回\">
</form>";
?>

<form action="add_menu.php" method="post">
  <fieldset>
    <legend>Add Menu</legend>
    <input type="text" name="food_name" placeholder="菜名">
    <input type="text" name="food_price" placeholder="单价">
    <input type="hidden" name="user" value="<?=$user?>">
    <input type='hidden' name='merchant_id' value="<?=$id?>">
    <input type='submit' value='提交'>
  </fieldset>
</form>
<?php
if(isset($_GET['status']) && $_GET['status'] == 1)
  echo "ADD MENU FAILED";
$food_sql = "SELECT food_id,food_name,food_price,merchant_id, ordered_count FROM food WHERE merchant_id = '{$id}'";
$dept_result = mysqli_query($conn,$food_sql);
while($dept_row = mysqli_fetch_array($dept_result)){
  ?>
  <fieldset>
    <legend><?=$dept_row['food_id']?></legend>
    菜名: <?=$dept_row['food_name']?> <br>
    单价: <?=$dept_row['food_price']?> <br>
    被点次数: <?=$dept_row['ordered_count']?> <br>
    <form action="delete_menu.php" method="post">
      <input type="hidden" name="user" value="<?=$user?>">
      <input type='hidden' name='food_id' value="<?=$dept_row['food_id']?>">
      <input type='hidden' name='merchant_id' value="<?=$dept_row['merchant_id']?>">
      <input type="submit" value="删除">
    </form>
  </fieldset>
  <?php
}
?>
