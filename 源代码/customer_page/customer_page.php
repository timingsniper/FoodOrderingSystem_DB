<?php

$conn = mysqli_connect("localhost","customer","customer","waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$id='';
$user='';
if(isset($_GET['user']))$user = $_GET['user'];
if(isset($_GET['id']))$id = $_GET['id'];
if(!empty($_POST['id'])) $id = $_POST['id'];
$info_sql = "SELECT * FROM customer WHERE username= '{$user}' OR customer_id='{$id}'";
$result = mysqli_query($conn, $info_sql);
if($result === false){
    echo 'WARNING: WRONG DATA';
    error_log(mysqli_error($conn));
}
else {
  if($row = mysqli_fetch_array($result)){
    echo "
      <form action=\"/../index.php\" method=\"post\">
        <input type=\"submit\" name=\"id\" value=\"退出登录\" placeholder=\"rrepd\">
      </form>";
    echo "<h1> 客户个人信息 </h1>";
    echo "<table><thead><tr><th colspan=\"2\"></th></tr></thead><tbody>";
    echo "<tr><td>顾客编号</td><td>".$row['customer_id']."</td></tr>";
    echo "<tr><td>姓名</td><td>".$row['name']."</td></tr>";
    echo "<tr><td>登录名</td><td>".$row['username']."</td></tr>";
    echo "<tr><td>性别</td><td>".$row['sex']."</td></tr>";
    echo "<tr><td>身份证号</td><td>".$row['id_num']."</td></tr>";
    echo "<tr><td>出生年月日</td><td>".$row['dob']."</td></tr>";
    echo "<tr><td>电话</td><td>
          <form action=\"/../info_update.php\"method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type='hidden' name='type' value='customer'>
            <input type=\"text\" name=\"phone\" placeholder=\"".$row['phone']."\" minlength=\"11\" maxlength=\"11\" required>
            <input type=\"submit\" value=\"修改\">
            </form></td></tr>";
    echo "<tr><td>电子邮件</td><td>
          <form action=\"/../info_update.php\"method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type='hidden' name='type' value='customer'>
            <input type=\"email\" name=\"email\" placeholder=\"".$row['email']."\" maxlength=\"256\" required>
            <input type=\"submit\" value=\"修改\">
          </form></td></tr>";
    echo "<tr><td>配送地址</td><td>
          <form action=\"/../info_update.php\"method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type='hidden' name='type' value='customer'>
            <input type=\"text\" name=\"delivery_addr\" placeholder=\"".$row['delivery_addr']."\" minlength=\"1\" maxlength=\"500\" required>
            <input type=\"submit\" value=\"修改\">
          </form></td></tr>";
    echo "<tr><td>密码</td><td>
          <form action=\"/../info_update.php\"method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type='hidden' name='type' value='customer'>
            <input type=\"text\" name=\"password\" placeholder=\"".$row['password']."\" maxlength=\"15\" required>
            <input type=\"submit\" value=\"修改\">
          </form></td></tr>";
    echo "</tbody></table>";
    if(isset($_GET['status']) && $_GET['status']=='1') echo '<h3>FAILED TO UPDATE</h3>';
    echo "
          <form action=\"browse_stores.php?user={$user}\" method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type=\"hidden\" name=\"customer_id\" value=".$row['customer_id'].">
            <input type=\"submit\"  value=\"浏览商店/菜单\">
          </form>";
    echo "
          <form action=\"browse_cart.php?user={$user}\" method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type=\"hidden\" name=\"customer_id\" value=".$row['customer_id'].">
            <input type=\"submit\"  value=\"购物车管理/下单\">
          </form>";
    echo "
          <form action=\"browse_orders.php?user={$user}\" method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type=\"hidden\" name=\"customer_id\" value=".$row['customer_id'].">
            <input type=\"submit\" value=\"查看订单信息\">
          </form>";

  }
}

?>
