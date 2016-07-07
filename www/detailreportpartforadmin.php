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
* from teacher where teach_id = '".$_SESSION["strUserID"]."'";

$objQuery = mysql_query($strSQL) or die (mysql_error());

$objResult = mysql_fetch_array($objQuery);
?>

<div data-role="page" id="pageDreportpartforadmin">
	
    <div data-role="header" data-theme="e">
      <a href="http://112.121.150.67/thaistudentcare/mainadmin.php" data-icon="back" data-iconpos="notext" data-direction="reverse" >Back</a>
		<h1><font size="2" >ปีการศึกษา 2/2558 </font></h1>
	</div>
	<div data-role="content">	
		<div style="padding-left:10px;padding-right:10px">
 
<div align="right">
      <img src="pic/studentpart.png" width="250" height="80"> 			</div>
 
 
	<div data-role="fieldcontain">
		<label for="name">จำนวนนักเรียนทั้งหมด : 3,174 คน<br>เข้าเรียนทุกวิชาเฉลี่ย 92% จากคาบเรียนทั้งหมด</label>
			
	</div>
	<div data-role="fieldcontain">
		<label for="name">จำนวนนักเรียนม.1 : 560 คน<br>เข้าเรียนทุกวิชาเฉลี่ย 95% จากคาบเรียนทั้งหมด</label>
	</div>
    <div data-role="fieldcontain">
		<label for="name">จำนวนนักเรียนม.2 : 528 คน<br>เข้าเรียนทุกวิชาเฉลี่ย 91% จากคาบเรียนทั้งหมด</label>
	</div>
    
	<div data-role="fieldcontain">
		<label for="name">จำนวนนักเรียนม.3 : 530 คน<br>เข้าเรียนทุกวิชาเฉลี่ย 89% จากคาบเรียนทั้งหมด</label>
			
	</div>
	<div data-role="fieldcontain">
		<label for="name">จำนวนนักเรียนม.4 : 624 คน<br>เข้าเรียนทุกวิชาเฉลี่ย 94% จากคาบเรียนทั้งหมด</label>
	</div>
    <div data-role="fieldcontain">
		<label for="name">จำนวนนักเรียนม.5 : 450 คน<br>เข้าเรียนทุกวิชาเฉลี่ย 89% จากคาบเรียนทั้งหมด</label>
	</div>
    <div data-role="fieldcontain">
		<label for="name">จำนวนนักเรียนม.6 : 482 คน<br>เข้าเรียนทุกวิชาเฉลี่ย 93% จากคาบเรียนทั้งหมด</label>
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