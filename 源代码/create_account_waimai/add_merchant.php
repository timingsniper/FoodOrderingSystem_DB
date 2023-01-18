<?php
$conn = mysqli_connect("localhost","merchant","merchant","waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}

$merchant_insert = "
  INSERT INTO merchant
    (merchant_name,merchant_addr,phone,delivery_coverage,username,password,area_id)
    VALUE(
      '{$_POST['merchant_name']}','{$_POST['merchant_addr']}','{$_POST['phone']}',
      '{$_POST['delivery_coverage']}','{$_POST['username']}','{$_POST['password']}','{$_POST['area']}'
    );
";

$menuid_sql = "
    UPDATE merchant SET menu_id = merchant_id WHERE merchant_id = LAST_INSERT_ID();
";


$login_insert = "
    INSERT INTO login
      (username,password,type)
      VALUE('{$_POST['username']}','{$_POST['password']}', 2)
";

  try{
    mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
    mysqli_query($conn,$merchant_insert);
    mysqli_query($conn,$menuid_sql);
    mysqli_query($conn,$login_insert);
    mysqli_commit($conn);
  }
  catch(Exception $e){
        mysqli_rollback($conn);
        echo ' WARNING: WRONG DATA';
        error_log(mysqli_error($conn));
        header("Location: http://127.0.0.1/create_account_waimai/create_merchant_page.php?status=1");
  }
  echo $merchant_insert."<br>".$login_insert."<br>".$menuid_sql."<br>";
   echo "<h1> 注册成功！</h1>";
?>

  <form action="/../index.php" method="post">
       <input type="submit" value="返回">
 </form>

