
<?php
$conn = mysqli_connect("localhost","dba","dba","waimaidb");
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}
$login_sql = "SELECT type FROM login WHERE username='{$_POST['username']}' and password='{$_POST['password']}'";
try{
  $result = mysqli_query($conn, $login_sql);
  if($row = mysqli_fetch_array($result)){
    if($row['type'] == 'CUSTOMER')
      header("Location: ../customer_page/customer_page.php?user=".$_POST['username']);
    elseif ($row['type'] == 'MERCHANT') {
      header("Location: ../merchant_page/merchant_page.php?user=".$_POST['username']);
    }
    elseif ($row['type'] == 'RIDER') {
      header("Location: ../rider_page/rider_page.php?user=".$_POST['username']);
    }
    elseif ($row['type'] == 'ADMIN'){
      header("Location: ../dba_page/dba_page.php?user=".$_POST['username']);
    }
   
  }
  else header("Location: http://127.0.0.1/index.php?status=1");
}
catch(Exception $e){
    echo '// WARNING: WRONG DATA';
    error_log(mysqli_error($conn));
    header("Location: http://127.0.0.1/index.php?status=1");
}

?>
