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
$faultid=$_POST['hidfault'];
$minuspoint=$_POST['hidpoint'];
$minusnote=$_POST['hidnote'];
$teachcut=$_POST['hidteachcut'];
$leaderlevel=$_POST['hidleaderlevel'];
$secondadmin=$_POST['hidcreateid'];
$teacherkeep=$_POST['hidteacherkeep'];
$admin=$_POST['hidcreateid'];
$minusdate=$_POST['hiddatefault'];
$status=$_POST['hidstatus'];
$leaderlevelac=$_POST['filpheadlevelac'];
$secondadminac=$_POST['hidcreateid'];
$adminac=$_POST['hidcreateid'];
$success = false;

$strSQL  = "UPDATE minusbehavior SET
stud_id='$studid', 
fault_id='$faultid', 
minus_faultpoint='$minuspoint', 
minus_note='$minusnote', 
minus_teachcut='$teachcut', 
minus_leaderlevel='$leaderlevel', 
minus_secondadmin='$secondadmin', 
minus_teacherkeep='$teacherkeep', 
minus_admin='$admin', 
minus_date='$minusdate', 
minus_status='$status', 
minus_leaderlevelac='$leaderlevelac', 
minus_secondadminac='$secondadminac', 
minus_adminac='$adminac'
WHERE minus_id='".$_GET["mbid"]."'";

$objQuery = mysql_query($strSQL) ;
if ($objQuery){
	$success = true;
}else{
	$success = false;
}

$objResult = mysql_fetch_array($objQuery);
?>
<div data-role="page" id="pageedit">
	<div data-role="header">
		<h1>ดำเนินการตัดคะแนน</h1>
	</div>
	<div data-role="content">	
		<? if ($success == true) {?>
        <div style="text-align:center">
        <h2>สำเร็จ!</h2>	
        <p>หัวหน้าระดับออกความคิดเห็นแล้ว</p>
        <p>&nbsp;<a href="http://112.121.150.67/thaistudentcare/pkteacherh05.php" data-icon="home">กลับสู่เมนูหลัก</a></p>
        </div>
        <? } else { ?>
        <div style="text-align:center">
        <h2>ผิดพลาด</h2>
        <p style="color:#F00">เกิดข้อผิดพลาดในการออกความคิดเห็น</p>
        <p style="color:#F00">&nbsp;<a href="http://112.121.150.67/thaistudentcare/recordcutbehaviorh05.php" data-role="button" data-icon="back">ลองใหม่</a></p>
        </div>
        <? }?>
	</div>
</div>


</body>
</html>