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
* FROM teacher  
 where teach_id = '".$_SESSION["strUserID"]."'";



$objQuery = mysql_query($strSQL) or die (mysql_error());

$objResult = mysql_fetch_array($objQuery);
?>

<?
$strSQL2 = "SELECT *
FROM minusbehavior  INNER JOIN student INNER JOIN fault INNER JOIN `level` INNER JOIN teacher
ON (minusbehavior.stud_id=student.stud_id AND minusbehavior.fault_id=fault.fault_id AND student.level_id=`level`.level_id AND minusbehavior.minus_teachcut = teacher.teach_id )
WHERE minusbehavior.minus_id = '".$_GET["mbid"]."'";

$objQuery2 = mysql_query($strSQL2) or die (mysql_error());

$objResult2 = mysql_fetch_array($objQuery2);
?>

<?
$strSQL3 = "SELECT *
FROM minusbehavior  INNER JOIN student INNER JOIN fault INNER JOIN `level` INNER JOIN teacher
ON (minusbehavior.stud_id=student.stud_id AND minusbehavior.fault_id=fault.fault_id AND student.level_id=`level`.level_id AND minusbehavior.minus_teacherkeep = teacher.teach_id )
WHERE minusbehavior.minus_id = '".$_GET["mbid"]."'";

$objQuery3 = mysql_query($strSQL3) or die (mysql_error());

$objResult3 = mysql_fetch_array($objQuery3);
?>


<div data-role="page" id="pageEbehavior">
	<div data-role="header">
     <a href="http://112.121.150.67/thaistudentcare/reportwaith06.php" data-icon="back" data-iconpos="notext" data-direction="reverse" >Back</a>
		<h1>รอดำเนินการตัดคะแนน</h1>
	</div>
	
			<form action="saveeditcutbh02.php?mbid=<?=$objResult2["minus_id"];?>" method="post" id="form1">
            
            <p>ชื่อนักเรียน <? echo $objResult2["stud_prefix"];?> <? echo $objResult2["stud_fname"];?> <? echo $objResult2["stud_lname"];?> </p>
       <p>ระดับชั้นมัธยมศึกษาปีที่ : <? echo $objResult3["level_name"];?></p>
       <p>ได้กระทำความผิด : <? echo $objResult3["fault_name"];?></p>
       <p>รายะเอียดเพิ่มเติม : <? echo $objResult3["minus_note"];?></p>
       <p>ถูกตัด : <? echo $objResult3["minus_faultpoint"];?> คะแนน</p>
       <p>วันที่กระทำ : <? echo $objResult3["minus_date"];?></p>
       <p>ครูผู้ตัดคะแนน ครู<? echo $objResult2["teach_fname"];?> <? echo $objResult2["teach_lname"];?> </p>
       <p>ครูที่ปรึกษา ครู<? echo $objResult3["teach_fname"];?> <? echo $objResult3["teach_lname"];?> </p>
       <p>ความเห็นหัวหน้าระดับ: <? echo $objResult3["minus_leaderlevelac"];?>  </p>
       <p>ความเห็นผช.ผอ.ฝ่ายกิจการนักเรียน : <? echo $objResult3["minus_secondadminac"];?>  </p>
        <p>ความเห็นรองผู้อำนวยการฝ่ายกิจการนักเรียน : <? echo $objResult3["minus_adminac"];?>  </p>
       
       
    
     </div>
            </form>
  </div>
	
</div>


</body>
</html>