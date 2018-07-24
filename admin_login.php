<?php
session_start();
?>
<html>
	<head>
		<title>Admin Pane</title>
		<link rel="stylesheet" href="style.css">
	</head>
	
	<body>
	<div class="container">
	<?php include 'header.php'?>
	
		<form method="POST" action="admin_login.php">
			<table border="0" align="center">
				<tr>	
					<th colspan="6"><h1>Admin Panel Form</h1></th>
				</tr>
				<tr >
					<td align="right"><label>User Name:</label></td>
					<td><input type="text" name="admin_name"><font color="red"><?php echo @$_GET['user']?></font></td>
				</tr>
				<tr >
					<td align="right"><label>Password:</label></td>
					<td><input type="password" name="admin_pass"><font color="red"><?php echo @$_GET['pass']?></font></td>
				</tr >
				<tr>
					<td align="center" colspan="8"><input type="submit" value="Login" name="login"></td>
				</tr>
				
			</table>
			
		</form>
		<center><?php echo @$_GET['error'] ?></center>
		<?php include 'footer.php'  ?>
		<div>
	</body>
</html>



<?php

	include('config.php');
        
		if(isset($_POST['login'])){
			$admin_name=$_SESSION['admin_name']=$_POST['admin_name'];
			$admin_pass=$_POST['admin_pass'];
			
			$query="select * from login where user_name='$admin_name' AND user_password='$admin_pass'";
			$run=mysql_query($query);
			
			if(mysql_num_rows($run)>0){
				
				echo "<script>window.open('view.php?logged=logged in successfully...!','_self')</script>";
			}
			else
			{
				echo "<script>alert('Password or User Name is incorrect!')</script>";
			}
			
			
		}
?>
