<?php require 'config.php';
check_admin();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-color: #BBB;
}
</style>
</head>

<body class="container">
<?php
	$sqlmem = "SELECT * FROM member WHERE idmember=".$_GET['idmember'];
	$resultmem = mysqli_query($link,$sqlmem);
	$datamem=mysqli_fetch_array($resultmem);
	$sql = "SELECT * FROM selected WHERE idmember=".$_GET["idmember"];	
  $result = mysqli_query($link, $sql);
?>
<table width="100%" border="1" class="table-responsive">
  <tr>
    <th width="524" rowspan="3" align="center" bgcolor="#CCCCCC" scope="col"><img name="" src="<?php echo "picture/".$_GET["pic"].".jpg"; ?>" width="200" height="200" alt="" /></th>
    <th width="575" height="66" bgcolor="#CCCCCC" scope="col"><div class="input-group">
  <span class="input-group-addon" id="Name_RemainAdmin">ชื่อ</span>
  <input readonly type="text" class="form-control" aria-describedby="Name_RemainAdmin" value='<?php echo $datamem['name']; ?>'>
</div> 
<div class="input-group">
  <span class="input-group-addon" id="StudentID_RemainAdmin">รหัสนักศึกษา</span>
  <input readonly type="text" class="form-control" aria-describedby="StudentID_RemainAdmin" value='<?php echo $datamem['studentid']; ?>'>
</div>
<div class="input-group">
  <span class="input-group-addon" id="major_RemainAdmin">หลักสูตร</span>
  <input readonly type="text" class="form-control" aria-describedby="major_RemainAdmin"value='<?php echo $datamem['major']; ?>'>
</div>

   </th>
    <th width="544" bgcolor="#CCCCCC" scope="col"><!--div align="left">นามสกุล
    </div>
      <form name="form7" method="post" action=""><#?php echo $datamem['lastname']; ?>
      </form>
      <form id="form4" name="form4" method="post" action="">
        <label for="textfield4"></label>
        <div align="left"></div>
    </form-->
    <div class="input-group">
  <span class="input-group-addon" id="Surname_RemainAdmin">นามสกุล</span>
  <input readonly type="text" class="form-control" aria-describedby="Surname_RemainAdmin"value='<?php echo $datamem['lastname']; ?>'>
</div>
    <div class="input-group">
  <span class="input-group-addon" id="Year_RemainAdmin">ชั้นปี</span>
  <input readonly type="text" class="form-control" aria-describedby="Year_RemainAdmin"value='<?php echo $datamem['year']; ?>'>
</div>
    <div class="input-group">
  <span class="input-group-addon" id="faculty_RemainAdmin">ชั้นปี</span>
  <input readonly type="text" class="form-control" aria-describedby="faculty_RemainAdmin"value='<?php echo $datamem['faculty']; ?>'>
</div>
    </th>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="1" class="table-hover">
  <tr>
    <th width="4%" bgcolor="#CCCCCC" scope="col"><h3>ลำดับ</h3></th>
    <th width="81%" bgcolor="#CCCCCC" scope="col"><h3 align="center">อุปกรณ์</h3></th>
    <th width="9%" bgcolor="#CCCCCC" scope="col"><h3 align="center">จำนวน</h3></th>
    <th width="6%" bgcolor="#CCCCCC" scope="col"><h3 align="center">ลบ</h3></th>
  </tr>
  <?php
  
  
  $order=1;
  while($datacut = mysqli_fetch_array($result) )
  {
	  $sqltool = "SELECT * FROM tool WHERE idtool = ".$datacut['idtool'];
	  $resultool = mysqli_query($link,$sqltool);
	  $datatool = mysqli_fetch_array($resultool);
	  
	  echo "<tr>
     <th scope='row'>{$order}</th>
    <td align='center'>".$datatool['name']."</td>
	<form method=\"post\" action=\"function_admin.php\">
    <td align='center'><input type='number' name='contact_number' value='".$datacut['number']."' max='".$datatool['balance']."' min='1' ></td>
	<input type='hidden' name='idtool' value='".$datatool['idtool']."'>
	<input type='hidden' name='idmember' value='".$datacut['idmember']."'>
	</form>
	<form method=\"post\" action=\"function_admin.php\">
	<td align='center'><input type='submit' name='contact_delete' value='delete'></td>
	<input type='hidden' name='idtool' value='".$datatool['idtool']."'>
	<input type='hidden' name='idmember' value='".$datacut['idmember']."'>
	</form>
	</tr>";
	
	  
	  $order++;
	}
  
  ?>
</table>
<br>
<div align="right">
<form method="post" action="function_admin.php">
	<td align='center'><input type='submit' name='confirm_lend' value='ยืนยันการยืม'></td>
	<input type='hidden' name='idmember' value='<?php echo $datamem['idmember']?>'>
</form>
</div>
</body>
</html>
