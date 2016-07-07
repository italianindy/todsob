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
* FROM student INNER JOIN level 
ON student.level_id=level.level_id where student.stud_id = '".$_GET["sid"]."'";



$objQuery = mysql_query($strSQL) or die (mysql_error());

$objResult = mysql_fetch_array($objQuery);
?>


<?
$strSQL4 = "SELECT
a.*, b.*, c.*, d.*
FROM student a INNER JOIN (level b, teacherkeep c, teacher d)
ON (b.level_id=a.level_id AND c.level_id=b.level_id AND c.teach_id=d.teach_id)
WHERE a.stud_id = '".$_GET["sid"]."'";

$objQuery4 = mysql_query($strSQL4) or die (mysql_error());

$objResult4 = mysql_fetch_array($objQuery4);
?>


<?
$strSQL3 = "SELECT
* FROM teacher  where teacher.teach_id = '".$_SESSION["strUserID"]."'";

$objQuery3 = mysql_query($strSQL3) or die (mysql_error());

$objResult3 = mysql_fetch_array($objQuery3);
?>



<div data-role="page" id="pageRcutbehavior">
	<div data-role="header">
     <a href="http://112.121.150.67/thaistudentcare/searchstudentforcutpk1.php?lid=<?=$objResult["level_id"];?>" data-icon="back" data-iconpos="notext" data-direction="reverse" >Back</a>
		<h1><font size="3">ใบตัดคะแนนนักเรียน</font></h1>
	</div>
	<div data-role="content">	
		<form action="savecutbpk1.php" method="post" id="form1">
		  <div data-role="fieldcontain">
          <?
$strSQL2 = " SELECT * FROM fault  WHERE fault.fault_id order by fault.fault_name asc";
$objQuery2 = mysql_query($strSQL2) or die (mysql_error());
?>
             <label for="selectfault" class="select">ความผิด:</label>
		    <select name="selectfault" id="selectfault">
            
            <?
			while($objResult2 = mysql_fetch_array($objQuery2))
			{
			?>
		      <option value="<?=$objResult2["fault_id"];?>"><?=$objResult2["fault_name"];?></option> 
             
		      <?
			
			}
			?>
	        </select>
		    <div data-role="fieldcontain">
                   <label for="txtnote">รายละเอียดความผิด:</label>
                   <textarea cols="40" rows="5" name="txtnote" id="txtnote"></textarea>
                 </div>
 
                
               
       <p>    <? echo $objResult["stud_prefix"];?> <? echo $objResult["stud_fname"];?> <? echo $objResult["stud_lname"];?> </p>
       <p>ระดับชั้นมัธยมศึกษาปีที่ : <? echo $objResult["level_name"];?></p>
       <p> ครูที่ปรึกษา ครู<? echo $objResult4["teach_fname"];?> <? echo $objResult4["teach_lname"];?></p>
       <p>วันที่กระทำความผิด : <?
echo date("d/m/Y")  ;?></p>
<p>ครูผู้ตัดคะแนน : ครู<? echo $objResult3["teach_fname"];?> <? echo $objResult3["teach_lname"];?></p>

          
               
  
	    <div data-role="fieldcontain">
	      <label for="slidpoint">ถูกตัดคะแนนตามระเบียบจำนวน :</label>
	      <input type="range" name="slidpoint" id="slidpoint" value="1" min="1" max="30" />
	      </div>
          
          
          
 <input name="hidstudid" type="hidden" value="<? echo $objResult["stud_id"];?>">  
	    <input name="hiddatefault" type="hidden" value="<?
echo date("Y/m/d")  ;?>">
<input name="hidteachcut" type="hidden" value="<? echo $objResult3["teach_id"];?>">
<input name="hidcreateid" type="hidden" value="">
<input name="hidstatus" type="hidden" value="รอดำเนินการ">
<input name="hidteacherkeep" type="hidden" value="<? echo $objResult4["teach_id"];?>">
       <div align="center">
	        
		  <div data-role="controlgroup" data-type="horizontal">
		    <input name="btnsubmit" type="submit" id="btnsubmit" value="ตกลง" />
		    <input name="Reset" type="reset" value="ยกเลิก" />
	      </div>
          </div>
              
        </form>
	</div>
    
	

</div>

</body>
</html>