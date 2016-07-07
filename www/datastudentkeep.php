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

<div data-role="page" data-theme="d" id="pageDstudentkeep">
	<div data-role="header" data-theme="e">
    <a href="http://112.121.150.67/thaistudentcare/mainteacher.php" data-icon="back" data-iconpos="notext" data-direction="reverse" >Back</a>
		<h1><font size="2" >มัธยมศึกษาปีที่ ม.<? echo $objResult["level_name"];?> </font></h1>
	</div>
<?
$strSQL2 = "SELECT
a.*, b.*
FROM student a INNER JOIN (level b)
ON ( a.level_id=b.level_id)
WHERE   b.level_id = '".$_GET["lid"]."'";
$objQuery2 = mysql_query($strSQL2) or die (mysql_error());
$objResult2 = mysql_fetch_array($objQuery2);
?>   

	<div data-role="content">	
    <div align="center">
      <img src="pic/menudatakeep.png" width="250" height="80"> 			</div>
		
         <font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/datastudentkeepfull.php?lid=<?=$objResult2["level_id"];?>" data-icon="grid" data-role="button" data-theme="e">รายชื่อนักเรียนทั้งหมด</a></font>
        <font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/datastudentkeepgrade.php?lid=<?=$objResult2["level_id"];?>" data-icon="grid" data-role="button" data-theme="e">รายชื่อนักเรียนที่ยังติด 0 ร มส </a></font>
        <font size="3" color="#990000"><a href="" data-icon="grid" data-role="button" data-theme="e">พฤติกรรมเสี่ยงด้านการมาเรียน</a></font>
    
<font size="3" color="#990000"><a href="" data-icon="grid" data-role="button" data-theme="e">พฤติกรรมเสี่ยงด้านการเข้าเรียนรายวิชา</a></font>
        
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