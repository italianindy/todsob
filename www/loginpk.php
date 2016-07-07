<?
session_start();
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

$strSQL = " SELECT * FROM teacher INNER JOIN category
ON teacher.cag_id=category.cag_id WHERE teach_username = '".$_POST["txtUsername"]."' AND teach_password = '".$_POST["txtPassword"]."' AND teach_status != 'ไม่ปกติ'"; 
$objQuery = mysql_query($strSQL) or die (mysql_error());

$objResult = mysql_fetch_array($objQuery);
?>

<div data-role="page" data-theme="d" id="pageLoginpk">
	<div data-role="header" data-theme="e">
   <a href="logout.php" data-icon="home" data-iconpos="notext" data-direction="reverse" >Back</a>
<h1><font size="4">เข้าสู่ระบบ</font></h1>
		
	</div>


<?

if(!$objResult)

{
	
?>
<div align="center">

      <img src="pic/notuser.png" width="240" height="120"> 			</div>
<font size="4" ><a href="http://112.121.150.67/thaistudentcare/mainmenu.php" data-icon="back" data-role="button" data-theme="e">ลองอีกครั้ง</a></font>
<?
}
else if ($objResult["teach_speci"] == "g01")
{
$_SESSION["strUserID"] = $objResult["teach_id"];
?>



	<div style="padding-left:10px;padding-right:10px">
		
        <div align="center">
      <img src="pic/welcome.png" width="240" height="120"> </div>
		<div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">ชื่อครูผู้สอน : คุณ</label><? echo $objResult["teach_fname"];?> <? echo $objResult["teach_lname"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">เลขบัตรประชาชน</font> <font size="3" color="#990000">: <? echo $objResult["teach_id"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">กลุ่มสาระการเรียนรู้</font> <font size="3" color="#990000">: <? echo $objResult["cag_name"];?></font>
		</div>
		<font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/pkteacherg01.php" data-icon="grid" data-role="button" data-theme="e">เข้าสู่หน้าหลักฝ่ายปกครอง</a></font>
      
    </div>    
 <?   
}

else if ($objResult["teach_speci"] == "pk1")
{
	$_SESSION["strUserID"] = $objResult["teach_id"];
?>

	<div style="padding-left:10px;padding-right:10px">
		
        <div align="center">
      <img src="pic/welcome.png" width="240" height="120"> </div>
		<div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">ผช.ผอ.ฝ่ายกิจการนักเรียน : คุณ</label><? echo $objResult["teach_fname"];?> <? echo $objResult["teach_lname"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">เลขบัตรประชาชน</font> <font size="3" color="#990000">: <? echo $objResult["teach_id"];?></font>
		</div>
       
		<font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/pkteacherpk1.php" data-icon="grid" data-role="button" data-theme="e">เข้าสู่หน้าหลักฝ่ายปกครอง</a></font>
       
    </div>    
<?
}
else if ($objResult["teach_speci"] == "pk2")
{
	$_SESSION["strUserID"] = $objResult["teach_id"];
?>

	<div style="padding-left:10px;padding-right:10px">
		
        <div align="center">
      <img src="pic/welcome.png" width="240" height="120"> </div>
		<div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">รอง ผอ.ฝ่ายกิจการนักเรียน: คุณ</label><? echo $objResult["teach_fname"];?> <? echo $objResult["teach_lname"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">เลขบัตรประชาชน</font> <font size="3" color="#990000">: <? echo $objResult["teach_id"];?></font>
		</div>
       
		<font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/pkteacherpk2.php" data-icon="grid" data-role="button" data-theme="e">เข้าสู่หน้าหลักฝ่ายปกครอง</a></font>
       
    </div>    
<?
}
else if ($objResult["teach_speci"] == "h01")
{
	$_SESSION["strUserID"] = $objResult["teach_id"];
?>

	<div style="padding-left:10px;padding-right:10px">
		
        <div align="center">
      <img src="pic/welcome.png" width="240" height="120"> </div>
		<div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">หัวหน้าระดับม.1 : คุณ</label><? echo $objResult["teach_fname"];?> <? echo $objResult["teach_lname"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">เลขบัตรประชาชน</font> <font size="3" color="#990000">: <? echo $objResult["teach_id"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">กลุ่มสาระการเรียนรู้</font> <font size="3" color="#990000">: <? echo $objResult["cag_name"];?></font>
		</div>
		<font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/pkteacherh01.php" data-icon="grid" data-role="button" data-theme="e">เข้าสู่หน้าหลักฝ่ายปกครอง</a></font>
        
    </div>    
<?
}
else if ($objResult["teach_speci"] == "h02")
{
	$_SESSION["strUserID"] = $objResult["teach_id"];
?>

	<div style="padding-left:10px;padding-right:10px">
		
        <div align="center">
      <img src="pic/welcome.png" width="240" height="120"> </div>
		<div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">หัวหน้าระดับม.2 : คุณ</label><? echo $objResult["teach_fname"];?> <? echo $objResult["teach_lname"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">เลขบัตรประชาชน</font> <font size="3" color="#990000">: <? echo $objResult["teach_id"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">กลุ่มสาระการเรียนรู้</font> <font size="3" color="#990000">: <? echo $objResult["cag_name"];?></font>
		</div>
		<font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/pkteacherh02.php" data-icon="grid" data-role="button" data-theme="e">เข้าสู่หน้าหลักฝ่ายปกครอง</a></font>
        
    </div>    
<?
}
else if ($objResult["teach_speci"] == "h03")
{
	$_SESSION["strUserID"] = $objResult["teach_id"];
?>

	<div style="padding-left:10px;padding-right:10px">
		
        <div align="center">
      <img src="pic/welcome.png" width="240" height="120"> </div>
		<div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">หัวหน้าระดับม.3 : คุณ</label><? echo $objResult["teach_fname"];?> <? echo $objResult["teach_lname"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">เลขบัตรประชาชน</font> <font size="3" color="#990000">: <? echo $objResult["teach_id"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">กลุ่มสาระการเรียนรู้</font> <font size="3" color="#990000">: <? echo $objResult["cag_name"];?></font>
		</div>
		<font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/pkteacherh03.php" data-icon="grid" data-role="button" data-theme="e">เข้าสู่หน้าหลักฝ่ายปกครอง</a></font>
        
    </div>    
<?
}
else if ($objResult["teach_speci"] == "h04")
{
	$_SESSION["strUserID"] = $objResult["teach_id"];
?>

	<div style="padding-left:10px;padding-right:10px">
		
        <div align="center">
      <img src="pic/welcome.png" width="240" height="120"> </div>
		<div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">หัวหน้าระดับม.4 : คุณ</label><? echo $objResult["teach_fname"];?> <? echo $objResult["teach_lname"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">เลขบัตรประชาชน</font> <font size="3" color="#990000">: <? echo $objResult["teach_id"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">กลุ่มสาระการเรียนรู้</font> <font size="3" color="#990000">: <? echo $objResult["cag_name"];?></font>
		</div>
		<font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/pkteacherh04.php" data-icon="grid" data-role="button" data-theme="e">เข้าสู่หน้าหลักฝ่ายปกครอง</a></font>
        
    </div>    
<?
}
else if ($objResult["teach_speci"] == "h05")
{
	$_SESSION["strUserID"] = $objResult["teach_id"];
?>

	<div style="padding-left:10px;padding-right:10px">
		
        <div align="center">
      <img src="pic/welcome.png" width="240" height="120"> </div>
		<div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">หัวหน้าระดับม.5 : คุณ</label><? echo $objResult["teach_fname"];?> <? echo $objResult["teach_lname"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">เลขบัตรประชาชน</font> <font size="3" color="#990000">: <? echo $objResult["teach_id"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">กลุ่มสาระการเรียนรู้</font> <font size="3" color="#990000">: <? echo $objResult["cag_name"];?></font>
		</div>
		<font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/pkteacherh05.php" data-icon="grid" data-role="button" data-theme="e">เข้าสู่หน้าหลักฝ่ายปกครอง</a></font>
        
    </div>    
<?
}
else if ($objResult["teach_speci"] == "h06")
{
	$_SESSION["strUserID"] = $objResult["teach_id"];
?>

	<div style="padding-left:10px;padding-right:10px">
		
        <div align="center">
      <img src="pic/welcome.png" width="240" height="120"> </div>
		<div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">หัวหน้าระดับม.6 : คุณ</label><? echo $objResult["teach_fname"];?> <? echo $objResult["teach_lname"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">เลขบัตรประชาชน</font> <font size="3" color="#990000">: <? echo $objResult["teach_id"];?></font>
		</div>
        <div data-role="fieldcontain" align="center">
			<font size="3" color="#990000"><label for="name">กลุ่มสาระการเรียนรู้</font> <font size="3" color="#990000">: <? echo $objResult["cag_name"];?></font>
		</div>
		<font size="3" color="#990000"><a href="http://112.121.150.67/thaistudentcare/pkteacherh06.php" data-icon="grid" data-role="button" data-theme="e">เข้าสู่หน้าหลักฝ่ายปกครอง</a></font>
        
    </div>    
<?
}
?>


 
</div>



</body>
</html>