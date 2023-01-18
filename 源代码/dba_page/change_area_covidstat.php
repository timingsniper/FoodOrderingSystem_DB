<?php

$conn = mysqli_connect('localhost','dba','dba','waimaidb');
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}

$user=$_POST['user'];
if(isset($_GET['user']))$user = $_GET['user'];


echo "<form action='../dba_page/dba_page.php?user={$user}' method=\"post\">
  <input type=\"submit\" value=\"返回\">
  
  <input type=\"hidden\" name=\"user\" value=$user>
</form>
<h1> 区域浏览 </h1>
";
?>


<?php
$area_sql = "SELECT * FROM area";
$area_result = mysqli_query($conn,$area_sql);



while($area_row = mysqli_fetch_array($area_result)){
  ?>
  <fieldset>
    <legend>区域编号：<?=$area_row['area_id']?></legend>
    
    <?php
    echo "<tr><td>区域是否有疫情: </td><td>
            <form action=\"update_area.php\" method=\"post\">
              <select name=\"covid_stat\">  
                <option value=\"".$area_row['covid_stat']."\" disabled selected>\"".$area_row['covid_stat']."\"</option>
                <option value=\"YES\">YES</option>}  
                <option value=\"NO\">NO</option>  
              </select>   
              <input type='hidden' name='user' value=$user>
              <input type='hidden' name='type' value='dba'>
              <input type=\"hidden\" name=\"area_id\" value=".$area_row['area_id'].">
              <input type=\"submit\" value=\"修改\">
            </form></td></tr>";
    ?>
  </fieldset>
  <?php
  
}
if(isset($_GET['status']) && $_GET['status']=='1') echo '<h3>FAILED TO UPDATE</h3>';
?>
