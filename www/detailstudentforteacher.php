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


$strSQL = "SELECT
a.*, b.*, c.*
FROM student a INNER JOIN (parent b,level c)
ON (b.parent_id=a.parent_id AND a.level_id=c.level_id)
WHERE   a.stud_id = '".$_GET["sid"]."'";

$objQuery = mysql_query($strSQL) or die (mysql_error());

$objResult = mysql_fetch_array($objQuery);
?>

<div data-role="page" id="pageDSFteacher">
	
    <div data-role="header" data-theme="e">
    <a href="http://112.121.150.67/thaistudentcare/mainteacher.php" data-icon="back" data-iconpos="notext" data-direction="reverse" >Back</a>
		<h1><font size="2" >ผู้ปกครอง : คุณ<? echo $objResult["parent_fname"];?> <? echo $objResult["parent_lname"];?></font></h1>
	</div>
	<div data-role="content">	
		<div style="padding-left:10px;padding-right:10px">
 
<div align="right">
      <img src="pic/datastudentcontact.png" width="250" height="80"> 			</div>
 
 
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
		<label for="name">ชื่อ-สกุล ผู้ปกครอง :</label>
			<? echo $objResult["parent_prefix"];?><? echo $objResult["parent_fname"];?> <? echo $objResult["parent_lname"];?>
	</div>
	<div data-role="fieldcontain">
		<label for="name">โทรศัพท์ :</label>
			<? echo $objResult["parent_tel"];?>
	</div>
    </div>
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