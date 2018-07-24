<?php
	$conn = mysql_connect("localhost","root","");
	$db = mysql_select_db('students',$conn);
	
	$edit_record=$_GET['edit'];
	$query="select * from u_reg where u_id ='$edit_record' ";
	
	$run=mysql_query($query);
	while($row=mysql_fetch_array($run))
	{
		$edit_id=$row['u_id'];
		$s_name=$row[1];
		$s_father=$row[2];
		$s_school=$row[3];
		$s_roll=$row[4];
		$s_class=$row[5];
	}
?>

<html>
	<head>
		<title>updating student's record</title>
		<link rel="stylesheet" href="style.css">
	</head>
	
	<body>
	<div class="container">
	<?php include 'header.php'?>
		<form method="POST" action="edit.php?edit_form=<?php echo $edit_id;?>">
			<table width="500" border="0" align="center">
				<tr>	
					<th colspan="4"><h1>Updating Form</h1></th>
				</tr>
				<tr >
					<td align="right">Name</td>
					<td><input type="text" name="user_name1" value='<?php echo $s_name; ?>'></td>
				</tr>
				<tr >
					<td align="right">Father's Name</td>
					<td><input type="text" name="father_name1" value='<?php echo $s_father; ?>'></td>
				</tr >
				<tr>
					<td align="right">School's Name</td>
					<td><input type="text" name="school_name1" value='<?php echo $s_school; ?>'></td>
				</tr>
				<tr >
					<td align="right">Roll No</td>
					<td><input type="text" name="roll_no1" value='<?php echo $s_roll; ?>'></td>
				</tr>
				<tr >
					<td align="right">Class</td>
					<td><select name="class_name1">
						<option value='<?php echo $s_class; ?>'><?php echo $s_class; ?></option>
						<option value="9th">9th</option>
						<option value="10th">10th</option>
					</select></td>
				</tr>
				<tr>
					<td colspan="5" align="center"><input type="submit" value="Update" name="update"></td>
				</tr>
			</table>
			
		</form>
		<?php include 'footer.php'?>
		</div>
	</body>
</html>
<?php
	if(isset($_POST['update'])){
	
		$edit_record1 = $_GET['edit_form'];
		
		$student_name=$_POST['user_name1'];
		$student_father=$_POST['father_name1'];
		$student_school=$_POST['school_name1'];
		$student_roll=$_POST['roll_no1'];
		$student_class=$_POST['class_name1'];
		
		$query1="update u_reg set user_name='$student_name',father_name='$student_father',school_name='$student_school',roll_no='$student_roll',class='$student_class' where u_id='$edit_record1'";
		if(mysql_query($query1))
		{
			echo "<script>window.open('view.php?updated=Record has been updated..!','_self')</script>";
		}
	}
?>