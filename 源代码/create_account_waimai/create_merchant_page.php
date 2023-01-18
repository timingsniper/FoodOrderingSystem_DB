<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
  </head>
  <body>
    <h1>Register- Merchant</h1>
      <form action="add_merchant.php" method="post">
        <p><input type="text" name="merchant_name" placeholder="商家名" maxlength="45" required> </p>
        <p><input type="text" name="merchant_addr" placeholder="商家地址" minlength="1" maxlength="500" required> </p>
        <p><input type="text" name="area" placeholder="商家所在区域号" minlength="1" maxlength="500" required> </p>
        <p><input type="text" name="phone" placeholder="商家电话" maxlength="11" minlength="11" required> </p>
        <p><input type="text" name="delivery_coverage" placeholder="送餐范围" maxlength="10"> </p>
        <p><input type="text" name="username" placeholder="登录名" maxlength="15" required> </p>
        <p><input type="password" name="password" placeholder="密码" maxlength="20" required> </p>
        <input type="submit">
      </form>
      <p>
        <?php
        if(isset($_GET['status']) && $_GET['status']=='1') echo '<h3>FAILED TO CREATE ACCOUNT</h3>';
        ?>
      </p>
  </body>
</html>
