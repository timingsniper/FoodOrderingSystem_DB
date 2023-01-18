<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
  </head>
  <body>
    <h1>Register- Rider</h1>
      <form action="add_rider.php" method="post">
        <p><input type="text" name="rider_name" placeholder="姓名" maxlength="45" required> </p>
        <p><input type="text" name="homeAddr" placeholder="家庭地址" minlength="1" maxlength="500" required> </p>
        <p><input type="text" name="phone" placeholder="电话" maxlength="11" minlength="11" required> </p>
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
