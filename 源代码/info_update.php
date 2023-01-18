<?php
$update_type = $_POST['type']; 
$conn = mysqli_connect("localhost",$update_type,$update_type,"waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$update_row = '';
if(!empty($_POST["phone"])){
  $update_row = 'phone';
}
if(!empty($_POST["email"])){
  $update_row = 'email';
}
if(!empty($_POST["password"])){
  $update_row = 'password';
}
if(!empty($_POST["delivery_coverage"])){
  $update_row = 'delivery_coverage';
}
if(!empty($_POST["merchant_addr"])){
  $update_row = 'merchant_addr';
}
if(!empty($_POST["delivery_addr"])){
  $update_row = 'delivery_addr';
}
if(!empty($_POST["homeAddr"])){
  $update_row = 'homeAddr';
}
if(!empty($_POST["temp"])){
  $update_row = 'temp';
}
if(!empty($_POST["pcr"])){
  $update_row = 'pcr';
}
if(!empty($_POST["area_id"])){
  $update_row = 'area_id';
}
if(!empty($_POST["covid_stat"])){
  $update_row = 'covid_stat';
}
$info_update = "
    UPDATE {$update_type}
    SET {$update_row} = '{$_POST[$update_row]}'
    WHERE username='{$_POST['user']}'
";
  echo $info_update.'<br>';

  if($update_row == 'password'){ //When we update the password, update on both login and customer table needs to be done
    $login_update = "
      UPDATE login
      SET password = '{$_POST['password']}'
      WHERE username='{$_POST['user']}'
    ";
    try{
      mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
      mysqli_query($conn, $info_update);
      mysqli_query($conn, $login_update);
      mysqli_commit($conn);
      echo "<h1> 密码修改成功 ！</h1>";
      echo "<form action=\"{$_POST['type']}_page/{$_POST['type']}_page.php?user={$_POST['user']}&status=0.php\" method=\"post\">
        <input type=\"submit\" value=\"返回\">
        </form>";
    }
    catch(Exception $e){
      echo ' WARNING: WRONG DATA';
      error_log(mysqli_error($conn));
      header("Location: http://127.0.0.1/{$_POST['type']}_page/{$_POST['type']}_page.php?user={$_POST['user']}&status=1");
    }
  }
  else if($update_row == 'pcr'){ //when pcr result is uplodaded, also update the time
    $update_time = "
    UPDATE {$update_type}
    SET pcr_time = now()
    WHERE username='{$_POST['user']}'
    ";
    try{
      mysqli_query($conn, $info_update);
      mysqli_query($conn, $update_time);
      echo "<h1> 修改成功 ！</h1>";
      echo "<form action=\"{$_POST['type']}_page/{$_POST['type']}_page.php?user={$_POST['user']}&status=0.php\" method=\"post\">
        <input type=\"submit\" value=\"返回\">
        </form>";
    }
    catch(Exception $e){
      echo ' WARNING: WRONG DATA';
      error_log(mysqli_error($conn));
      header("Location: http://127.0.0.1/{$_POST['type']}_page/{$_POST['type']}_page.php?user={$_POST['user']}&status=1");
    }
  }
  
  else { //in another cases, just update the target table
    try{
      mysqli_query($conn, $info_update);
      echo "<h1> 修改成功 ！</h1>";
      echo "<form action=\"{$_POST['type']}_page/{$_POST['type']}_page.php?user={$_POST['user']}&status=0.php\" method=\"post\">
        <input type=\"submit\" value=\"返回\">
        </form>";
    }
    catch(Exception $e){
      echo ' WARNING: WRONG DATA';
      error_log(mysqli_error($conn));
      header("Location: http://127.0.0.1/{$_POST['type']}_page/{$_POST['type']}_page.php?user={$_POST['user']}&status=1");
    }
  }
?>
