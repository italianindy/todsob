<?
session_start();
if($_SESSION["strUserID"] == "")
{
header("location:http://112.121.150.67/thaistudentcare/mainmenu.php");
exit();
}
?>
<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>THAI TIME STUDENT</title>
<link href="jquery-mobile/jquery.mobile.theme-1.0.min.css" rel="stylesheet" type="text/css"/>
<link href="jquery-mobile/jquery.mobile.structure-1.0.min.css" rel="stylesheet" type="text/css"/>
<script src="jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="jquery-mobile/jquery.mobile-1.0.min.js" type="text/javascript"></script>
</head> 
<body>
 
<?
$objConnect = mysql_connect("112.121.150.67","hdc","hdc") or die(mysql_error());

$objDB = mysql_select_db("student_db_urrw");
mysql_query("SET NAMES utf8", $objConnect);

$strSQL = " SELECT * FROM parent  WHERE parent_id = '".$_SESSION["strUserID"]."'";
$objQuery = mysql_query($strSQL) or die (mysql_error());

$objResult = mysql_fetch_array($objQuery);
?>

<div data-role="page" data-theme="d" id="pageSteacher">
	<div data-role="header" data-theme="e">
    <a href="http://112.121.150.67/thaistudentcare/logout.php" data-icon="home" data-iconpos="notext" data-direction="reverse" >Back</a>
		<h1><font size="2" >ผู้ปกครอง : คุณ<? echo $objResult["parent_fname"];?> <? echo $objResult["parent_lname"];?></font></h1>
	</div>
<?
$strSQL2 = "SELECT *
FROM
teacher INNER JOIN category
ON teacher.cag_id=category.cag_id
WHERE teacher.teach_id AND teacher.teach_status='ปกติ'
ORDER BY
teacher.teach_fname ASC
";
$objQuery2 = mysql_query($strSQL2) or die (mysql_error());
?>   

	<div data-role="content">	
    <div align="center">
      <img src="pic/datateachsearch.png" width="250" height="120
      
      33"> 			</div>
		<ul data-inset="true" data-role="listview" data-theme="e" data-filter="true">
<?
while($objResult2 = mysql_fetch_array($objQuery2)) {
?>
  <li><a href="#">
    <h3><font size="4" >ครู<? echo $objResult2["teach_fname"]?>  <? echo $objResult2["teach_lname"]?> </font><br> <font size="3" >กลุ่มสาระการเรียนรู้ </font> <font size="2" >: <? echo $objResult2["cag_name"]?></font></h3>
    <p><font size="3" >โทรศัพท์ : </font><font size="2" ><? echo $objResult2["teach_tel"]?></font></p>
  </a><a href=""></a></li>
<?
}
?> 
</ul>
	</div>
    <div data-role="footer" data-theme="e" data-position="fixed">
		<div data-role="navbar">
          <ul>
            <li><a href="http://112.121.150.67/thaistudentcare/logout.php"><font size="4">ออกจากระบบ</font></a></li>
           
          </ul>
        </div>
  </div>
</div>

</body>
</html>