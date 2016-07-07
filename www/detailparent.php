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

/*$strSQL = " SELECT
a.*, b.*, c.*, d.*
FROM student a INNER JOIN (parent b,level c, studentcome d)
ON (b.parent_id=a.parent_id AND a.level_id=c.level_id AND a.stud_id = d.stud_id)
WHERE   d.stc_in IN
(SELECT MAX( stc_in )FROM studentcome 
WHERE stud_id = '".$_GET["sid"]."') ";
*/
$strSQL = "SELECT
a.*, b.*, c.*, d.*
FROM student a INNER JOIN (parent b,level c, studentcome d)
ON (b.parent_id=a.parent_id AND a.level_id=c.level_id AND a.stud_id = d.stud_id)
WHERE   d.stud_id = '".$_GET["sid"]."'  AND d.stc_in  IN
(SELECT MAX( stc_in )FROM studentcome 
 WHERE   stud_id = '".$_GET["sid"]."' )";

$objQuery = mysql_query($strSQL) or die (mysql_error());

$objResult = mysql_fetch_array($objQuery);
?>

<?
$strSQL = "SELECT
a.*, b.*, c.*, d.*
FROM student a INNER JOIN (parent b,level c, studentcome d)
ON (b.parent_id=a.parent_id AND a.level_id=c.level_id AND a.stud_id = d.stud_id)
WHERE   d.stud_id = '".$_GET["sid"]."'  AND d.stc_in  IN
(SELECT MAX( stc_in )FROM studentcome 
 WHERE   stud_id = '".$_GET["sid"]."' )";

$objQuery = mysql_query($strSQL) or die (mysql_error());

$objResult = mysql_fetch_array($objQuery);
?>

<?
$strSQL2 = "SELECT
a.*, b.*, c.*, d.*, e.*, f.*
FROM student a INNER JOIN (parent b,level c, studentpart d, department e, room f)
ON (b.parent_id=a.parent_id AND a.level_id=c.level_id AND a.stud_id = d.stud_id AND d.dep_id = e.dep_id AND d.room_id=f.room_id)
WHERE   d.stud_id = '".$_GET["sid"]."'  AND d.stp_date= CURDATE()  AND d.stp_in  IN 
(SELECT MAX( stp_in )FROM studentpart 
 WHERE   stud_id = '".$_GET["sid"]."' )";
 
 $objQuery2 = mysql_query($strSQL2) or die (mysql_error());

$objResult2 = mysql_fetch_array($objQuery2);
?>

<?
$strSQL3 = "SELECT
a.*, b.*, c.*, d.*, e.*, f.*, g.*, h.*
FROM student a INNER JOIN (parent b,level c, studentpart d, department e, room f, calendar g, teacher h)
ON (b.parent_id=a.parent_id AND a.level_id=c.level_id AND a.stud_id = d.stud_id AND d.dep_id = e.dep_id AND d.room_id=f.room_id AND g.teach_id=h.teach_id)
WHERE   d.stud_id = '".$_GET["sid"]."'  AND d.stp_date= CURDATE() AND g.dep_id=d.dep_id AND g.level_id=a.level_id AND d.stp_in  IN 
(SELECT MAX( stp_in )FROM studentpart 
 WHERE   stud_id = '".$_GET["sid"]."' )
 GROUP BY h.teach_id";
 
 $objQuery3 = mysql_query($strSQL3) or die (mysql_error());

$objResult3 = mysql_fetch_array($objQuery3);
?>



<div data-role="page" id="page">
	
    <div data-role="header" data-theme="e">
    <a href="http://112.121.150.67/thaistudentcare/mainparent.php" data-icon="back" data-iconpos="notext" data-direction="reverse" >Back</a>
		<h1><font size="2" >ผู้ปกครอง : คุณ<? echo $objResult["parent_fname"];?> <? echo $objResult["parent_lname"];?></font></h1>
	</div>
	<div data-role="content">	
		<div style="padding-left:10px;padding-right:10px">
 
<div align="right">
      <img src="pic/datastud.png" width="250" height="80"> 			</div>
 
 
	<div data-role="fieldcontain">
		<label for="name">เลขบัตรประชาชนนักเรียน :</label>
			<? echo $objResult["stud_id"];?>
	</div>
	<div data-role="fieldcontain">
		<label for="name">ชื่อ-สกุล :</label>
			<? echo $objResult["stud_prefix"];?><? echo $objResult["stud_fname"];?> <? echo $objResult["stud_lname"];?>
	</div>
    <div data-role="fieldcontain">
		<label for="name">ระดับชั้น : มัธยมศึกษาปีที่ </label>
			<? echo $objResult["level_name"];?>
	</div>
    
	<div data-role="fieldcontain">
		<label for="name">วันที่และเวลาเข้าเรียนล่าสุด :</label>
			<? echo $objResult["stc_in"];?>
	</div>
	<div data-role="fieldcontain">
		<label for="name">วันที่และเวลากลับล่าสุด :</label>
			<? echo $objResult["stc_out"];?>
	</div>
    <div data-role="fieldcontain">
		<label for="name">สถานะปัจจุบัน<br>
        เรียนวิชา : </label> <? echo $objResult2["dep_name"];?><br>
		ห้อง : 	<? echo $objResult2["room_name"];?><br>
        เข้าห้องเวลา : 	<? echo $objResult2["stp_in"];?><br>
        ครูผู้สอน : ครู<? echo $objResult3["teach_fname"];?> <? echo $objResult3["teach_lname"];?>
	</div>
        <font size="4" color="#990000"><a href="http://112.121.150.67/thaistudentcare/menuterm.php?sid=<?=$objResult["stud_id"];?>" data-icon="star" data-role="button" data-theme="e">ผลการเรียน</a></font>
				



</body>
</html>