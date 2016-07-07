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
*
FROM teacher 
WHERE   teacher.teach_id = '".$_SESSION["strUserID"]."'";
$objQuery = mysql_query($strSQL) or die (mysql_error());

$objResult = mysql_fetch_array($objQuery);
?>

<div data-role="page" data-theme="d" id="pageDstudentkeep">
	<div data-role="header" data-theme="e">
    <a href="http://112.121.150.67/thaistudentcare/logout.php" data-icon="home" data-iconpos="notext" data-direction="reverse" >Back</a>
		<h1><font size="2" >ครู<? echo $objResult["teach_fname"];?> <? echo $objResult["teach_lname"];?> </font></h1>
	</div>
 

	<div data-role="content">	
    <div align="center">
      <img src="pic/reportbv.png" width="250" height="80"> 			</div>
		
         <font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/searchlevelforcuth01.php" data-icon="grid" data-role="button" data-theme="e">ตัดคะแนนความประพฤติ</a></font>
        <font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/recordrisk.php" data-icon="grid" data-role="button" data-theme="e">ทัณฑ์บนนักเรียน</a></font>
        <font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/recordactive.php" data-icon="grid" data-role="button" data-theme="e">ติดตามแก้ไขพฤติกรรม</a></font>
    <font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/reportwaith01.php" data-icon="grid" data-role="button" data-theme="e">รอดำเนินการ</a></font>
        
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