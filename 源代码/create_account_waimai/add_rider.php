<?php
$conn = mysqli_connect("localhost","rider","rider","waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}

$rider_insert = "
  INSERT INTO rider
    (rider_name,homeAddr,phone,jointime,username,password,pcr_time)
    VALUE(
      '{$_POST['rider_name']}','{$_POST['homeAddr']}','{$_POST['phone']}',
      now(),'{$_POST['username']}','{$_POST['password']}', now()
    );
";
$login_insert = "
    INSERT INTO login
      (username,password,type)
      VALUE('{$_POST['username']}','{$_POST['password']}', 3)
";

  try{
    mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
    mysqli_query($conn,$rider_insert);
    mysqli_query($conn,$login_insert);
    mysqli_commit($conn);
  }
  catch(Exception $e){
        mysqli_rollback($conn);
        echo ' WARNING: WRONG DATA';
        error_log(mysqli_error($conn));
        header("Location: http://127.0.0.1/create_account_waimai/create_rider_page.php?status=1");
  }
  echo $rider_insert."<br>".$login_insert."<br>";
   echo "<h1> 注册成功！</h1>";
?>

  <form action="/../index.php" method="post">
       <input type="submit" value="返回">
 </form>

