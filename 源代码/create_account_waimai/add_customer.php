<?php
$conn = mysqli_connect("localhost","customer","customer","waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$customer_insert = "
  INSERT INTO customer
    (name,id_num,dob,sex,phone,delivery_addr,email,username,password)
    VALUE(
      '{$_POST['name']}','{$_POST['id_num']}','{$_POST['dob']}',{$_POST['sex']},
      '{$_POST['phone']}', '{$_POST['delivery_addr']}','{$_POST['email']}','{$_POST['username']}','{$_POST['password']}'
    );
";
  $login_insert = "
    INSERT INTO login
      (username,password,type)
      VALUE('{$_POST['username']}','{$_POST['password']}', 1);
  ";


  try{
    mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
    mysqli_query($conn,$customer_insert);
    mysqli_query($conn,$login_insert);
    mysqli_commit($conn);
  }
  catch(Exception $e){
        mysqli_rollback($conn);
        echo ' WARNING: WRONG DATA';
        error_log(mysqli_error($conn));
        header("Location: http://127.0.0.1/create_account_waimai/create_customer_page.php?status=1");
  }
  echo $customer_insert."<br>".$login_insert."<br>";
   echo "<h1> 注册成功！</h1>";
?>

  <form action="/../index.php" method="post">
       <input type="submit" value="返回">
 </form>
