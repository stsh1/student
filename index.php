<html>
	<head>
		<title>Registration Form</title>
		<link rel="stylesheet" href="style.css">
	</head>
	
	<body>
	<div class="container">
	<?php include 'header.php'?>
	
		<form method="POST" action="index.php">
			<table  border="0" align="center">
				<tr>	
					<th colspan="6"><h1>Student's Registration Form</h1></th>
				</tr>
				<tr >
					<td align="right"><label>Name:</label></td>
					<td><input type="text" name="user_name"><font color="red"><?php echo @$_GET['name']; ?></font></td>
				</tr>
				<tr >
					<td align="right"><label>Father's Name:</label></td>
					<td><input type="text" name="father_name"><font color="red"><?php echo @$_GET['father']; ?></font></td>
				</tr >
				<tr>
					<td align="right"><label>School's Name:</label></td>
					<td><input type="text" name="school_name"><font color="red"><?php echo @$_GET['school']; ?></font></td>
				</tr>
				<tr >
					<td align="right"><label>Roll No:</label></td>
					<td><input type="text" name="roll_no"><font color="red"><?php echo @$_GET['roll']; ?></font></td>
				</tr>
				<tr >
					<td align="right"><label>Class:</label></td>
					<td><select name="class_name">
						<option value='null'>Class</option>
						<option value='9th'>9th</option>
						<option value='10th'>10th</option>
					</select><font color="red"><?php echo @$_GET['class']; ?></font></td>
				</tr>
				<tr>
					<td colspan="5" align="center"><input type="submit" value="Submit" name="submit"></td>
				</tr>
			</table>
			
		</form>
		<?php include 'footer.php'  ?>
		<div>
	</body>
</html>
<?php
/*$conn=mysql_connect("localhost","root","");
$db= mysql_select_db("students",$conn);*/

$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"students");
 
 if (isset($_POST['submit']))
 {
 $student_name=$_POST['user_name'];
 $student_father=$_POST['father_name'];
 $student_school=$_POST['school_name'];
 $student_roll=$_POST['roll_no'];
 $student_class=$_POST['class_name'];
 
 if($student_name=='')
 {
	echo "<script>window.open('index.php?name=name is required','_self');</script>";
	exit();
 }
 if($student_father=='')
 {
	echo "<script>window.open('index.php?father=father's name is required','_self');</script>";
	exit();
 }
if($student_school=='')
 {
	echo "<script>window.open('index.php?school= school name is required','_self');</script>";
	exit();
 }
if($student_roll=='')
 {
	echo "<script>window.open('index.php?roll=roll no. is required','_self');</script>";
	exit();
 }
 if($student_class=='null')
 {
	echo "<script>window.open('index.php?class=class is required','_self');</script>";
	exit();
 }

$que="insert into u_reg (user_name,father_name,school_name,roll_no,class)values('$student_name','$student_father','$student_school','$student_roll','$student_class');";

if($conn->query($que)=== true)
{
	echo "<center><b>The follwing Data has been inserted into our databse:</b></center>";
	echo "<table width='500px'align='center' border='4'><tr><td>$student_name</td><td>$student_father</td><td>$student_school</td><td>$student_roll</td><td>$student_class</td></tr></table>";                      
}


}


?>