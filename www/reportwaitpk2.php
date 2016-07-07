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
*
FROM teacher 
WHERE   teacher.teach_id = '".$_SESSION["strUserID"]."' ";
$objQuery = mysql_query($strSQL) or die (mysql_error());

$objResult = mysql_fetch_array($objQuery);
?>

<div data-role="page" data-theme="d" id="pageRwait">
	<div data-role="header" data-theme="e">
    <a href="http://112.121.150.67/thaistudentcare/pkteacherpk2.php" data-icon="back" data-iconpos="notext" data-direction="reverse" >Back</a>
		<h1><font size="2" >ครู<? echo $objResult["teach_fname"];?> <? echo $objResult["teach_lname"];?></font></h1>
	</div>

<?


$strSQL3 =$strSQL3 = "SELECT *
FROM minusbehavior  INNER JOIN student INNER JOIN fault INNER JOIN `level`
ON (minusbehavior.stud_id=student.stud_id AND minusbehavior.fault_id=fault.fault_id AND student.level_id=`level`.level_id)
WHERE minusbehavior.minus_id   AND minusbehavior.minus_admin != '' AND minusbehavior.minus_date = CURDATE()";
$objQuery3 = mysql_query($strSQL3) or die (mysql_error());


?>

<?
$strSQL2 = "SELECT *
FROM minusbehavior  INNER JOIN student INNER JOIN fault INNER JOIN `level`
ON (minusbehavior.stud_id=student.stud_id AND minusbehavior.fault_id=fault.fault_id AND student.level_id=`level`.level_id)
WHERE minusbehavior.minus_id  AND minusbehavior.minus_status = 'รอดำเนินการ'  AND minusbehavior.minus_secondadmin != '' AND minusbehavior.minus_admin = ''";
$objQuery2 = mysql_query($strSQL2) or die (mysql_error());
?>   

	<div data-role="content">	
    <div align="center">
      <img src="pic/waitaccept.png" width="250" height="80"> 			</div>
		<ul data-inset="true" data-role="listview" data-theme="e">
<?
while($objResult2 = mysql_fetch_array($objQuery2)) {
?>
  <li><a href="#">
    <h3><font size="3" ><? echo $objResult2["stud_prefix"]?> <? echo $objResult2["stud_fname"]?> <? echo $objResult2["stud_lname"]?></font></h3>
    <p><font size="3" >ระดับชั้น มัธยมศึกษาปีที่ </font><font size="2" ><? echo $objResult2["level_name"]?></font></p>
    <p><font size="3" >ความผิด <? echo $objResult2["fault_name"]?> </font></p>
  </a><a href="http://112.121.150.67/thaistudentcare/editcutbehaviorpk2.php?mbid=<?=$objResult2["minus_id"];?>">รายละเอียด</a></li>
<?
}
?> 
</ul>
<ul data-inset="true" data-role="listview" data-theme="e">
<div align="center">
      <img src="pic/wait.png" width="250" height="80"> 			</div>
      <?
while($objResult3 = mysql_fetch_array($objQuery3)) {
?>
<li><a href="#">
    <h3><font size="3" ><? echo $objResult3["stud_prefix"]?> <? echo $objResult3["stud_fname"]?> <? echo $objResult3["stud_lname"]?></font></h3>
    <p><font size="3" >ระดับชั้น มัธยมศึกษาปีที่ </font><font size="2" ><? echo $objResult3["level_name"]?></font></p>
    <p><font size="3" >ความผิด <? echo $objResult3["fault_name"]?> </font></p>
  </a><a href="http://112.121.150.67/thaistudentcare/editfinishbvpk2.php?mbid=<?=$objResult3["minus_id"];?>">รายละเอียด</a></li>
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