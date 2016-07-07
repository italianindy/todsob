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

$strSQL =$strSQL = "SELECT
a.*, b.*, c.*
FROM teacher a INNER JOIN (calendar b, department c)
ON (b.teach_id=a.teach_id AND b.dep_id=c.dep_id)
WHERE   a.teach_id = '".$_SESSION["strUserID"]."' ";
$objQuery = mysql_query($strSQL) or die (mysql_error());

$objResult = mysql_fetch_array($objQuery);
?>

<div data-role="page" data-theme="d" id="pageMteacher">
	<div data-role="header" data-theme="e">
    <a href="http://112.121.150.67/thaistudentcare/logout.php" data-icon="home" data-iconpos="notext" data-direction="reverse" >Back</a>
		<h1><font size="2" >ครูผู้สอน : ครู<? echo $objResult["teach_fname"];?> <? echo $objResult["teach_lname"];?></font></h1>
	</div>

<?


$strSQL3 =$strSQL3 = "SELECT
a.*, b.*, c.*
FROM teacher a INNER JOIN (teacherkeep b, level c)
ON (b.teach_id=a.teach_id AND b.level_id=c.level_id)
WHERE   a.teach_id = '".$_SESSION["strUserID"]."'";
$objQuery3 = mysql_query($strSQL3) or die (mysql_error());

$objResult3 = mysql_fetch_array($objQuery3);
?>

<?
$strSQL2 = "SELECT
a.*, b.*, c.*, d.*, e.*
FROM teacher a INNER JOIN (calendar b, department c, room d, level e)
ON (b.teach_id=a.teach_id AND b.dep_id=c.dep_id AND b.room_id=d.room_id AND b.level_id=e.level_id)
WHERE   a.teach_id = '".$_SESSION["strUserID"]."' AND b.calen_date = CURDATE() ORDER BY
b.calen_studin DESC";
$objQuery2 = mysql_query($strSQL2) or die (mysql_error());
?>   

	<div data-role="content">	
    <div align="center">
      <img src="pic/tableteacher.png" width="250" height="80"> 			</div>
		<ul data-inset="true" data-role="listview" data-theme="e">
<?
while($objResult2 = mysql_fetch_array($objQuery2)) {
?>
  <li><a href="#">
    <h3><font size="3" ><? echo $objResult2["dep_name"]?> </font><br> <font size="3" >ห้องเรียน</font> <font size="2" >: <? echo $objResult2["room_name"]?></font></h3>
    <p><font size="3" >ระดับชั้น มัธยมศึกษาปีที่ </font><font size="2" ><? echo $objResult2["level_name"]?></font></p>
    <p><font size="3" >เวลา </font><font size="2" ><? echo $objResult2["calen_studin"]?> ถึง <? echo $objResult2["calen_studout"]?></font></p>
  </a><a href="http://112.121.150.67/thaistudentcare/datateacherpart.php?did=<?=$objResult2["dep_id"];?>&lid=<?=$objResult2["level_id"];?>&rid=<?=$objResult2["room_id"];?>">รายละเอียด</a></li>
<?
}
?> 
</ul>
<ul data-inset="true" data-role="listview" data-theme="e">
<div align="center">
      <img src="pic/datastudentkeep.png" width="250" height="80"> 			</div>
<li><a href="#">
    <h3><font size="3" >ข้อมูลนักเรียนที่ปรึกษา </font></h3>
    <p><font size="3" >ระดับชั้น มัธยมศึกษาปีที่ </font><font size="2" ><? echo $objResult3["level_name"]?></font></p>
  </a><a href="http://112.121.150.67/thaistudentcare/datastudentkeep.php?lid=<?=$objResult3["level_id"];?>">รายละเอียด</a></li>
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