
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>LogInPage</title>
  </head>
  <body>
    <h1>彬彬外卖平台</h1>
    <form action="/login/login.php" method="post">
      <p><input type="text" name="username" placeholder="Username" maxlength="15" required> </p>
      <p><input type="password" name="password" placeholder="Password" maxlength="20" required> </p>
      <input type="submit">
    </form>
    <?php
      if(isset($_GET['status']) && $_GET['status']=='1'){
        echo "WRONG USERNAME OR PASSWORD";
      }
    ?>
    <p><a href="/create_account_waimai/create_customer_page.php?status=0">New User? Sign up here!</a></p>
    <p><a href="/create_account_waimai/create_merchant_page.php?status=0">New Merchant? Sign up here!</a></p>
    <p><a href="/create_account_waimai/create_rider_page.php?status=0">New Rider? Sign up here!</a></p>
  </body>
</html>
