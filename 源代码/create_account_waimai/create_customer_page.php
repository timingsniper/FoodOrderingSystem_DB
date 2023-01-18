<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
  </head>
  <body>
    <h1>Register</h1>
      <form action="add_customer.php" method="post">
        <p><input type="text" name="name" placeholder="姓名" maxlength="50" required> </p>
        <p><input type="text" name="id_num" placeholder="身份证号" minlength="18" maxlength="18" required> </p>
        <p><input type="date" name="dob" placeholder="出生年月日" value="2000-01-01" required></p>
        <fieldset>
         <legend>性别</legend>
         <p>
            男<input type="radio" name="sex" value="1" checked>
            女<input type="radio" name="sex" value="2">
         </p>
      </fieldset>
        <p><input type="text" name="phone" placeholder="联系方式" maxlength="11" minlength="11" required> </p>
        <p><input type="text" name="delivery_addr" placeholder="配送地址" maxlength="500" minlength="1" required> </p>
        <p><input type="email" name="email" placeholder="邮箱" maxlength="256"> </p>
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
