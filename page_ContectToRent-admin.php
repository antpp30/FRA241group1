<?php require 'config.php';
check_admin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FRA241 Group1</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #CCC;
}
</style>
</head>

<body class="container">
<table width="100%"  border="1" class="table">
  <tr>
    <th width="64"  scope="col"><div align="center">
      <h5><strong>ลำดับ</strong></h5>
    </div></th>
    <th width="220" scope="col"><div align="center">
      <h5><strong>รหัสนักศึกษา</strong></h5>
    </div></th>
    <th width="333" scope="col"><div align="center">
      <h5><strong>ชื่อ-สกุล</strong></h5>
    </div></th>
    <th width="131" scope="col"><div align="center">
      <h5><strong>เวลา</strong></h5>
    </div></th>
    <th width="178" scope="col"><div align="center">
      <h5><strong>รายละเอียด</strong></h5>
    </div></th>
  </tr>
  
 <?php
$sql = "SELECT DISTINCT(idmember),dateselect FROM selected ORDER BY dateselect DESC";
$result = mysqli_query($link, $sql);
$order=1;
while($data = mysqli_fetch_array($result)){
	
$sqlmem = "SELECT * FROM member WHERE idmember = ".$data['idmember'];
	$resultmem = mysqli_query($link,$sqlmem);
	$datamem = mysqli_fetch_array($resultmem);
	
	echo "<tr>
     <th scope='row'>{$order}</th>
    <td align='center'>".$datamem['studentid']."</td>
    <td align='center'>".$datamem['name']." ".$datamem['lastname']."</td>
    <td align='center'>".date_format(date_create($data['dateselect']),"d-m-Y")."</td>
	 <td align='center'><form id='form1' name='form1' method='post'  action='pop-up_contact_to_lent_informa-admin.php?name=".$datamem['name']."&id=".$datamem['studentid']."&major=".$datamem['major']."&last=".$datamem['lastname']."&iyear=".$datamem['year']."&fibo=".$datamem['faculty']."&idmember=".$data['idmember']."&pic=".$datamem['pictureid']."'>
      <input type='submit' name='แสดงรายละเอียด' value='แสดงรายละเอียด' />
    </form></td>
  </tr>
  ";
  	
	$order++;
}
	
?>
</table>
<p class="container">&nbsp;</p>
</body>
</html>
