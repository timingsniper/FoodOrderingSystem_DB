<?php

$conn = mysqli_connect("localhost","merchant","merchant","waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$id='';
$user='';
if(isset($_GET['user']))$user = $_GET['user'];
if(isset($_GET['merchant_id']))$id = $_GET['merchant_id'];
if(!empty($_POST['merchant_id'])) $id = $_POST['merchant_id'];
$info_sql = "SELECT * FROM merchant WHERE username= '{$user}' OR merchant_id='{$id}'";
$result = mysqli_query($conn, $info_sql);
if($result === false){
    echo '// WARNING: WRONG DATA';
    error_log(mysqli_error($conn));
}
else {
  if($row = mysqli_fetch_array($result)){
    echo "
      <form action=\"/../index.php\" method=\"post\">
        <input type=\"submit\" name=\"id\" value=\"退出登录\" placeholder=\"rrepd\">
      </form>";
    echo "<h1> 商家信息 </h1>";
    echo "<table><thead><tr><th colspan=\"2\"></th></tr></thead><tbody>";
    echo "<tr><td>商家名</td><td>".$row['merchant_name']."</td></tr>";
    echo "<tr><td>商家编号</td><td>".$row['merchant_id']."</td></tr>";
    echo "<tr><td>菜单编号</td><td>".$row['menu_id']."</td></tr>";
    echo "<tr><td>是否营业中</td><td>".$row['is_open']."</td></tr>";
    echo "<tr><td>商家地址</td><td>
          <form action=\"/../info_update.php\"method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type='hidden' name='type' value='merchant'>
            <input type=\"text\" name=\"merchant_addr\" placeholder=\"".$row['merchant_addr']."\" minlength=\"1\" maxlength=\"500\" required>
            <input type=\"submit\" value=\"修改\">
            </form></td></tr>";
    echo "<tr><td>所在区域</td><td>
          <form action=\"/../info_update.php\"method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type='hidden' name='type' value='merchant'>
            <input type=\"text\" name=\"area_id\" placeholder=\"".$row['area_id']."\" minlength=\"1\" maxlength=\"500\" required>
            <input type=\"submit\" value=\"修改\">
            </form></td></tr>";
    echo "<tr><td>商家电话</td><td>
          <form action=\"/../info_update.php\"method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type='hidden' name='type' value='merchant'>
            <input type=\"text\" name=\"phone\" placeholder=\"".$row['phone']."\" minlength=\"11\" maxlength=\"11\" required>
            <input type=\"submit\" value=\"修改\">
            </form></td></tr>";
    echo "<tr><td>配送范围</td><td>
            <form action=\"/../info_update.php\"method=\"post\">
              <input type='hidden' name='user' value=$user>
              <input type='hidden' name='type' value='merchant'>
              <input type=\"text\" name=\"delivery_coverage\" placeholder=\"".$row['delivery_coverage']."\" maxlength=\"10\" required>
              <input type=\"submit\" value=\"修改\">
            </form></td></tr>";
    echo "<tr><td>密码</td><td>
          <form action=\"/../info_update.php\"method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type='hidden' name='type' value='merchant'>
            <input type=\"text\" name=\"password\" placeholder=\"".$row['password']."\" maxlength=\"15\" required>
            <input type=\"submit\" value=\"修改\">
          </form></td></tr>";
    echo "</tbody></table>";
    if(isset($_GET['status']) && $_GET['status']=='1') echo '<h3>FAILED TO UPDATE</h3>';
    echo "
          <form action=\"edit_menu.php?user={$user}\" method=\"post\">
            <input type=\"hidden\" name=\"user\" value=".$row['username'].">
            <input type=\"hidden\" name=\"merchant_id\" value=".$row['merchant_id'].">
            <input type=\"submit\"  value=\"编辑菜单&查看菜品购买次数\">
          </form>";
    echo "
          <form action=\"browse_orders.php\" method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type=\"hidden\" name=\"merchant_id\" value=".$row['merchant_id'].">
            <input type=\"submit\"  value=\"查看订单\">
          </form>";
   
  }
}

?>
