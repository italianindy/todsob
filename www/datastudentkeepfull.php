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

$strSQL = " SELECT
a.*, b.*
FROM student a INNER JOIN (level b)
ON ( a.level_id=b.level_id)
WHERE   b.level_id = '".$_GET["lid"]."'";
$objQuery = mysql_query($strSQL) or die (mysql_error());

$objResult = mysql_fetch_array($objQuery);
?>

<div data-role="page" data-theme="d" id="pageDstudentkeepfull">
	<div data-role="header" data-theme="e">
    <a href="http://112.121.150.67/thaistudentcare/datastudentkeep.php?lid=<?=$objResult["level_id"];?>" data-icon="back" data-iconpos="notext" data-direction="reverse" >Back</a>
		<h1><font size="2" >มัธยมศึกษาปีที่ ม.<? echo $objResult["level_name"];?> </font></h1>
	</div>
<?
$strSQL2 = "SELECT
a.*, b.*
FROM student a INNER JOIN (level b)
ON ( a.level_id=b.level_id)
WHERE   b.level_id = '".$_GET["lid"]."' AND a.stud_status='ปกติ'";
$objQuery2 = mysql_query($strSQL2) or die (mysql_error());
?>   

	<div data-role="content">	
    <div align="center">
      <img src="pic/mparent.png" width="250" height="80"> 			</div>
		<ul data-inset="true" data-role="listview" data-theme="e">
<?
while($objResult2 = mysql_fetch_array($objQuery2)) {
?>
  <li><a href="#">
    <h3><font size="2" ><? echo $objResult2["stud_prefix"]?><? echo $objResult2["stud_fname"]?>  <? echo $objResult2["stud_lname"]?> </font></h3>
   
  </a><a href="http://112.121.150.67/thaistudentcare/detailstudentforteacher.php?sid=<?=$objResult2["stud_id"];?>">รายละเอียด</a></li>
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