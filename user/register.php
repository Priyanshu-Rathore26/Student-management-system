<?php
	
	session_start();
	error_reporting(0);
	include('includes/dbconnection.php');
	include('includes/sweetalert.php');
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="styles.css">

	
</head>

<body>
	
	<div class="container">
		<form action="" method="POST" class="login-email" enctype="multipart/form-data">
		<div class="brand-logo">
                  <img src="images/logo.svg"> SMS
                </div>
            <p class="login-text" style="font-size: 2rem; font-weight: 700;">Student Registration </p>

		<div class="container-2">
			<p class="login-text" style="font-size: 30px; font-weight: 550;">Student Details</p>
			<table style="width:100%;">
				<tr>
					<td>
						<div class="input-group">
							<input type="text" placeholder="Student Name" name="Stuname" value="" required='true'> 
						</div>
					</td>
					<td>
						<div class="input-group">
							<input type="email" placeholder="Student Email" name="email" value="" required='true'>
						</div>
					</td>
				</tr>
				<tr>
					<td>

						<div class="input-group">
							<input type="text" placeholder="Contact No." name="Scontact" value="" required='true'>
						</div>
					</td>
					<td>

						<div class="input-group">
							<select  name="stuclass" class="" required='true'>
								<option value="">Select Class</option>
								<?php 
							$sql4 = "SELECT * from    tblclass ";
							$query2 = $dbh -> prepare($sql4);
							$query2->execute();
							$result4=$query2->fetchAll(PDO::FETCH_OBJ);
							foreach($result4 as $row1)
							{          
								?>  
					<option value="<?php echo htmlentities($row1->ID);?>" ><?php echo htmlentities($row1->ClassName);?> <?php echo htmlentities($row1->Section);?> </option>
					<?php } ?> 
                </select>
			</div>
		</td>
		</tr>
		<tr>
			<td>

				<div class="input-group">
					<select name="Gender" value="" class="" required='true'>
						<option value="">Choose Gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
			</td>
			<td>

				<div class="input-group">
					<input placeholder="Date of Birth" name="dob" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
				</div>
			</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="input-group">
						<input type="file" name="image" value="" accept="image/*" class="customFileInput" required='true' >
					</div>
				</td>
			</tr>
			</table>
		</div>
		<div class="container-2">
			<p class="login-text" style="font-size: 30px; font-weight: 550;">Parents/Guardian's Details</p>
			<table style="width:100%;">
				<tr>
					<td>
						<div class="input-group">
							<input type="text" placeholder="Father Name" name="Fname" required='true'>
						</div>
					</td>
					<td>
						<div class="input-group">
							<input type="text" placeholder="Mother Name" name="Mname" required='true'>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="input-group">
							<input type="text" placeholder="Father's Contact No." name="Fcontact" value="" required='true'>
						</div>
					</td>
				</tr>
				<tr >
					<td colspan="2">
						<div class="input-group">
							<textarea type="text" placeholder="Address" name="Address" required='true'></textarea>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div class="container-2">
			<p class="login-text" style="font-size: 30px; font-weight: 550;">login Details</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="" required='true'>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="" required='true'>
            </div>
		</div>  
			<div class="input-group">
				<button type="submit" name="submit" onclick="swal('hii');" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have you registered? <a href="status.php">Check Status</a>.</p>
		</form>
		<p class="login-register-text"><a href="../index.php"style="margin-top:20px; height:55px; font-weight:400; font-size:20px; color:white; text-align:center; " class="btn">Back Home</a></p>
	</div>
	
</body>
</html>
<?php
if(isset($_POST['submit'])){
	$Stuname = $_POST['Stuname'];  
	$email = $_POST['email'];
	$Scontact = $_POST['Scontact'];
	$Stuclass = $_POST['stuclass'];
	$Gender = $_POST['Gender'];
	$Dob = $_POST['dob'];
	$Image = $_FILES['image']['name'];
	$Fname = $_POST['Fname'];
	$Mname = $_POST['Mname'];
	$Fcontact = $_POST['Fcontact'];
	$Address = $_POST['Address'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	$sql = "SELECT * FROM tblstudent WHERE UserName='$username'";
	$sql2 = "SELECT * FROM tbltempstudent WHERE Username='$username'";
		$result = mysqli_query($conn, $sql);
		$result2 = mysqli_query($conn, $sql2);
		if (!$result->num_rows > 0 && !$result2->num_rows > 0) {

			$extension = substr($Image,strlen($Image)-4,strlen($Image));
			$allowed_extensions = array(".jpg","jpeg",".png",".gif");
			if(!in_array($extension,$allowed_extensions))
			{
			echo "<script>alert('Logo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
			}
			else
			{

			$Image=md5($Image).time().$extension;
			move_uploaded_file($_FILES["image"]["tmp_name"],"../admin/images/".$Image);

			$sql3 = "INSERT INTO tbltempstudent (StudentName,StudentEmail,StudentClass,Status,Gender,DOB,FatherName,MotherName,SContact,FContact,Address,Username,Password,Image)
					VALUES ('$Stuname','$email',$Stuclass,0, '$Gender','$Dob','$Fname','$Mname','$Scontact','$Fcontact','$Address','$username','$password','$Image')";
			$result3 = mysqli_query($conn, $sql3);
			
			if ($result3) {
				?>
			 <script>
       			 Swal.fire({
					icon: 'success',
  					title:'Registration Done👍',
 					text:'Please Wait for Confirmation from Administration.  Keep Checking Status',
					confirmButtonText: 'OK',
  				}).then((result) => {
    				if (result.isConfirmed) {
						window.location.href ='../index.php'
 					 }})
   			 </script>

			<?php
				$username = "";
				$_POST['password'] = "";
			} else {
				?>

			 <script>
        	Swal.fire(
  				'Oops...',
  				'Something Went Wrong...?',
				'question'
			)
    		</script>

			<?php
			
		}}
		} else {
			?>

			 <script>
        		Swal.fire({
  					icon: 'error',
  					title: 'Oops...',
 					text: 'Username Already Taken!',
				})
				  </script>
			<?php
			//  echo "<script>window.location.href ='login.php '</script> ";
		}
}
?>


