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

$studid=$_POST['hidstudid'];
$faultid=$_POST['selectfault'];
$minuspoint=$_POST['slidpoint'];
$minusnote=$_POST['txtnote'];
$teachcut=$_POST['hidteachcut'];
$leaderlevel=$_POST['hidcreateid'];
$secondadmin=$_POST['hidcreateid'];
$teacherkeep=$_POST['hidteacherkeep'];
$admin=$_POST['hidcreateid'];
$minusdate=$_POST['hiddatefault'];
$status=$_POST['hidstatus'];
$leaderlevelac=$_POST['hidcreateid'];
$secondadminac=$_POST['hidcreateid'];
$adminac=$_POST['hidcreateid'];
$success = false;

$strSQL  = "INSERT INTO minusbehavior (stud_id, fault_id, minus_faultpoint, minus_note, minus_teachcut, minus_leaderlevel, minus_secondadmin, minus_teacherkeep, minus_admin, minus_date, minus_status, minus_leaderlevelac, minus_secondadminac, minus_adminac)
VALUES ('$studid','$faultid','$minuspoint','$minusnote','$teachcut','$leaderlevel','$secondadmin','$teacherkeep','$admin','$minusdate','$status','$leaderlevelac','$secondadminac','$adminac')";


$objQuery = mysql_query($strSQL) ;
if ($objQuery){
	$success = true;
}else{
	$success = false;
}

$objResult = mysql_fetch_array($objQuery);
?>
<div data-role="page" id="pageSave">
	<div data-role="header">
		<h1>ดำเนินการตัดคะแนน</h1>
	</div>
	<div data-role="content">	
		<? if ($success == true) {?>
        <div style="text-align:center">
        <h2>สำเร็จ!</h2>	
        <p>คุณตัดคะแนนความประพฤตินักเรียนแล้ว</p>
        <p>&nbsp;<a href="http://112.121.150.67/thaistudentcare/pkteacherh02.php" data-icon="home">กลับสู่เมนูหลัก</a></p>
        </div>
        <? } else { ?>
        <div style="text-align:center">
        <h2>ผิดพลาด</h2>
        <p style="color:#F00">เกิดข้อผิดพลาดในการตัดคะแนน</p>
        <p style="color:#F00">&nbsp;<a href="http://112.121.150.67/thaistudentcare/recordcutbehaviorh02.php" data-role="button" data-icon="back">ลองใหม่</a></p>
        </div>
        <? }?>
	</div>

</div>

</body>
</html>