<?php

date_default_timezone_set('Asia/Shanghai');
$conn = mysqli_connect("localhost","rider","rider","waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$id='';
$user='';
if(isset($_GET['user']))$user = $_GET['user'];
if(isset($_GET['rider_id']))$id = $_GET['rider_id'];
if(!empty($_POST['rider_id'])) $id = $_POST['rider_id'];
$info_sql = "SELECT * FROM rider WHERE username= '{$user}' OR rider_id='{$id}'";
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
    echo "<h1> 骑手信息 </h1>";
    $id = $row['rider_id'];
    $alert_sql = "SELECT * FROM alert_table WHERE rider_id = '{$id}' and resolved=0";
    $alert_query = mysqli_query($conn, $alert_sql);

    if($alert_row = mysqli_fetch_array($alert_query)){
      echo "<span style='color:red;'><tr><td>Alert Message:</td><td>".$alert_row['alert_type']."</td></tr></span>";
    }
    echo "<table><thead><tr><th colspan=\"2\"></th></tr></thead><tbody>";
    echo "<tr><td>骑手姓名</td><td>".$row['rider_name']."</td></tr>";
    echo "<tr><td>配送员编号</td><td>".$row['rider_id']."</td></tr>";
    echo "<tr><td>加盟日期</td><td>".$row['joinTime']."</td></tr>";
    echo "<tr><td>家庭地址</td><td>
          <form action=\"/../info_update.php\"method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type='hidden' name='type' value='rider'>
            <input type=\"text\" name=\"homeAddr\" placeholder=\"".$row['homeAddr']."\" minlength=\"1\" maxlength=\"500\" required>
            <input type=\"submit\" value=\"修改\">
            </form></td></tr>";
    echo "<tr><td>骑手电话</td><td>
          <form action=\"/../info_update.php\"method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type='hidden' name='type' value='rider'>
            <input type=\"text\" name=\"phone\" placeholder=\"".$row['phone']."\" minlength=\"11\" maxlength=\"11\" required>
            <input type=\"submit\" value=\"修改\">
            </form></td></tr>";
    echo "<tr><td>体温</td><td>
            <form action=\"/../info_update.php\"method=\"post\">
              <input type='hidden' name='user' value=$user>
              <input type='hidden' name='type' value='rider'>
              <input type=\"text\" name=\"temp\" placeholder=\"".$row['temp']."\" maxlength=\"10\" required>
              <input type=\"submit\" value=\"修改\">
            </form></td></tr>";
    echo "<tr><td>核酸结果</td><td>
            <form action=\"/../info_update.php\"method=\"post\">
              <select name=\"pcr\">  
                <option value=\"".$row['pcr']."\" disabled selected>\"".$row['pcr']."\"</option>
                <option value=\"POSITIVE\">POSITIVE</option>}  
                <option value=\"NEGATIVE\">NEGATIVE</option>  
              </select>   
              <input type='hidden' name='user' value=$user>
              <input type='hidden' name='type' value='rider'>
              <input type=\"submit\" value=\"修改\">
            </form></td></tr>";
    echo "<tr><td>核酸结果上传时间</td><td>".$row['pcr_time']."</td></tr>";
    echo "<tr><td>密码</td><td>
          <form action=\"/../info_update.php\"method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type='hidden' name='type' value='rider'>
            <input type=\"text\" name=\"password\" placeholder=\"".$row['password']."\" maxlength=\"15\" required>
            <input type=\"submit\" value=\"修改\">
          </form></td></tr>";
    echo "</tbody></table>";
    if(isset($_GET['status']) && $_GET['status']=='1') echo '<h3>FAILED TO UPDATE</h3>';
 
    $pcrTime = new DateTime($row['pcr_time']);
    $timeNow = new DateTime("now");
    $diff = $pcrTime->diff($timeNow); 
    $total_minutes = ($diff->days * 24 * 60); 
    $total_minutes += ($diff->h * 60); 
    $total_minutes += $diff->i; 
    //$time = $timeNow->format('Y-m-d H:i:s');
    if ($row['pcr'] == "POSITIVE") {
      echo "<tr><td>小羊人不可接单, 好好休息吧, 祝您早日康复!</td><td></td></tr>";
    }
    else if($total_minutes < 2880 && $row['pcr'] != "POSITIVE"){
      echo "
            <tr><td>核酸符合48小时要求,可接单</td><td></td></tr>
            <form action=\"browse_kejie_orders.php\" method=\"post\">
              <input type='hidden' name='user' value=$user>
              <input type=\"hidden\" name=\"rider_id\" value=".$row['rider_id'].">
              <input type=\"submit\"  value=\"查看可接订单\">
            </form>";
    }
    else{
      echo "<tr><td>核酸超过48小时, 无法接单</td><td></td></tr>";
    }
    echo "
          <form action=\"browse_rider_orders.php\" method=\"post\">
            <input type='hidden' name='user' value=$user>
            <input type=\"hidden\" name=\"rider_id\" value=".$row['rider_id'].">
            <input type=\"submit\" value=\"查看我的订单\">
          </form>";
 
  }
}

?>
