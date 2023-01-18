<?php
echo "<h1> 管理员页面 </h1>";
?>
<form action='/../index.php' method='post'>
  <input type='submit' value='退出登录'>
</form>
<form action='change_area_covidstat.php' method='post'>
  <input type="hidden" name="user" value="<?=$_GET['user']?>">
  <input type='submit' value='更改区域疫情信息'>
</form>
<form action='browse_stores.php' method='post'>
  <input type="hidden" name="user" value="<?=$_GET['user']?>">
  <input type='submit' value='浏览&删除商家/编辑菜单'>
</form>
<form action='browse_customer.php' method='post'>
  <input type="hidden" name="user" value="<?=$_GET['user']?>">
  <input type='submit' value='浏览&删除顾客'>
</form>
<form action='browse_rider.php' method='post'>
  <input type="hidden" name="user" value="<?=$_GET['user']?>">
  <input type='submit' value='浏览&删除骑手'>
</form>
<form action='sql/sql1.php' method='post'>
  <input type="hidden" name="user" value="<?=$_GET['user']?>">
  <input type='submit' value=
  '找出2021年1月1日之后点餐次数前十的顾客, 按照点餐次数进行降序排序; 若次数相同, 则按照顾客姓名拼音次序排序'>
</form>
<form action='sql/sql2.php' method='post'>
  <input type="hidden" name="user" value="<?=$_GET['user']?>">
  <input type='submit' value=
  '查找顾客消费次数最多的商家的信息，包括商家的名称、顾客消费次数，顾客消费次数相同的按照订单总额排序'>
</form>
<form action='sql/sql3.php' method='post'>
  <input type="hidden" name="user" value="<?=$_GET['user']?>">
  <input type='submit' value=
  '找出在30天内顾客消费次数少于全部商家平均接待次数的商家姓名, 编号'>
</form>
<form action='sql/sql4.php' method='post'>
  <input type="hidden" name="user" value="<?=$_GET['user']?>">
  <input type='submit' value=
  '找出在14天内体温高于37.3度的配送员所接触过的商家和顾客的姓名、地址'>
</form>
<form action='sql/sql5.php' method='post'>
  <input type="hidden" name="user" value="<?=$_GET['user']?>">
  <input type='submit' value=
  '找出在7天内的所有订单中, 消费总额最少的菜品名称, 若存在多种菜品的总额相同且最少, 则都列出'>
</form>
<form action='sql/sql6.php' method='post'>
  <input type="hidden" name="user" value="<?=$_GET['user']?>">
  <input type='submit' value=
  '找出在30天内订单异常次数(系统中存在顾客有效订单,但是超过2小时没有到达订单完成状态)超过2次的顾客的姓名和配送员姓名'>
</form>
