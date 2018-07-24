<?php
/*session_start();

if(!$_SESSION['admin_name']){
	header('location:admin_login.php?error=You are not an administrator....');
}
*/
?>
<html>
	<head><title>Viewing the Record</title>
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<div class="container">
	<?php include 'header.php'?>
		<center><font color='red' size='6'><?php echo @$_GET['delete'];?>
		<?php echo @$_GET['updated']; ?><?php echo @$_GET['logged']; ?></font></center>
		<a href="logout.php">Logout</a>
		<br></br><table align="center" width='900' border='4'>
			<tr>
			
					<th colspan="20" align="center" bgcolor="yellow"><h1>Viewing all the record</h1></th>
				
			</tr>
			<tr align="center">
				<td>Serial No.</td>
				<td>Student's Name</td>
				<td>Father's Name</td>
				<td>Roll No.</td>
				<td>Delete</td>
				<td>Edit</td>
				<td>Detail</td>
			</tr>
	
			<?php
				
				$conn=mysql_connect("localhost","root","");
				$db=mysql_select_db("students",$conn);
				
				$que = "select * from u_reg order by 1 DESC";
				$run =mysql_query($que);
				$i=1;
				while ($row=mysql_fetch_array($run)){
					$u_id = $row[0];
					$user_name = $row[1];
					$father_name=$row[2];
					$roll_no=$row[4];
					
				
			?>
				<tr align="center">
				<td><?php echo $i;$i++; ?></td>
				<td><?php echo $user_name; ?></td>
				<td><?php echo $father_name; ?></td>
				<td><?php echo $roll_no; ?></td>
				<td><a href ='delete.php?del=<?php echo $u_id; ?>'>Delete</a></td>
				<td><a href='edit.php?edit=<?php echo $u_id ?>'>Edit</a></td>
				<td><a href='view.php?detail=<?php echo $u_id ?>'>Detail</a></td>
			</tr>
			<?php } ?>
		</table>
		<?php include 'footer.php'?>
		<div>
	</body>
</html>

<?php
	if( isset($_GET['detail']))
	{
	$detail_record=$_GET['detail'];
	$que1="select * from u_reg where u_id='$detail_record'";
	$run1 = mysql_query($que1);
	
	while ($row1=mysql_fetch_array($run1))
	{
		$name= $row1[1];
		$father= $row1[2];
		$school= $row1[3];
		$roll= $row1[4];
		$class= $row1[5];
	
?>
<br><br>
<table border="4" align="center" width='1000'>
	<tr>
		<td bgcolor="yellow" align="center" colspan="6"><h1>Detail</h1></td>
	</tr>
	<tr align="center" >
		<td><?php echo $name; ?></td>
		<td><?php echo $father; ?></td>
		<td><?php echo $school; ?></td>
		<td><?php echo $roll; ?></td>
		<td><?php echo $class; ?></td>
	</tr>
</table>

<?php }} ?>