<?php
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>
<head>

           <!--=====================================================================
             =========== Designer: Mystery Code(YouTube Channel) ===================
             =====================================================================-->

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
 @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400&display=swap');
 
.popup .content {
 position: absolute;
 top: 65%;
 left: 50%;
 transform: translate(100%,200%) scale(0);
 width: 250px;
 height: 195px;
 z-index: 2;
 text-align: center;
 padding: 20px;
 border-radius: 20px;
 backdrop-filter: blur(15px);
    border-top: 1px solid rgba(255,255,255,0.2);
    border-left: 1px solid rgba(255,255,255,0.2);
    box-shadow: 5px 5px 30px rgba(0,0,0,0.2);
}

.popup .close-btn {
 position: absolute;
 right: 20px;
 top: 10px;
 width: 30px;
 height: 30px;
 color: white;
 font-size: 20px;
 border-radius: 50%;
 padding: 2px 5px 7px 5px;
 backdrop-filter: blur(15px);
    border-top: 1px solid rgba(255,255,255,0.2);
    border-left: 1px solid rgba(255,255,255,0.2);
    box-shadow: 5px 5px 30px rgba(0,0,0,0.2);
 }

.popup.active .content {
transition: all 300ms ease-in-out;
transform: translate(-50%,-50%) scale(1);
}

h1 {
 text-align: center;
 font-size: 25px;
 font-weight: 500;
 padding-top: 0px;
 padding-bottom: 10px;
 color: Grey;
}

.input-field .validate {
padding: 15px;
font-size: 16px;
border-radius: 10px;
border: none;
 
margin-bottom: 5px;
background: rgba(255,255,255,0.05);
    border-top: 1px solid rgba(255,255,255,0.2);
    border-left: 1px solid rgba(255,255,255,0.2);
    box-shadow: 5px 5px 30px rgba(0,0,0,0.2);
outline: none;
}
.second-button {
 
font-size: 18px;
font-weight: 500;
margin-top: 10px;
padding: 10px 15px;
border-radius: 40px;
border: none;
color: white;
background: rgba(255,255,255,0.05);
backdrop-filter: blur(15px);
    border-top: 1px solid rgba(255,255,255,0.2);
    border-left: 1px solid rgba(255,255,255,0.2);
    box-shadow: 5px 5px 30px rgba(0,0,0,0.2);
transition: box-shadow .35s ease !important;
outline: none;
}

.second-button:active{
  background: rgba(255,255,255,0.05);
 
border: none;
outline: none;
}
 
</style>
</head>
<body>
 <div class="popup" id="popup-1">
   <div class="content">
    <div class="close-btn" onclick="togglePopup()">
     ×</div>
     
<h1>Check</h1> 
<form action="" method="post" name="check">
  <div class="input-field">
    <input placeholder="Username" name="username" class="validate" required="true">
  </div>
    <button class="second-button" name="check" type="submit">Get Info</button>
    </form>
   </div>
  </div>
  
  <div onclick="togglePopup()" class="dropdown-item " style="padding:10px; font-size:1rem; "><i class="dropdown-item-icon icon-check text-primary"></i>&nbsp; Check Status</div>

<script>
 function togglePopup() {
 document.getElementById("popup-1")
  .classList.toggle("active");
}
</script>

</body>
</html> 
<?php
if(isset($_POST['check'])) 
  {
    $username = $_POST['username'];
    $sql = "SELECT * FROM tbltempstudent WHERE Username='$username'";
    $result = mysqli_query($conn,$sql);
    $data_row= mysqli_num_rows($result);
    if($data_row){
      $data = mysqli_fetch_assoc($result);
      $status = $data['Status'];
      if($status==0){
        ?>
        
			 <script>
       			 Swal.fire({
					icon: 'info',
  					title:'In Progess...',
 					text:'Your Request Pending',
					confirmButtonText: 'OK',
  				}).then((result) => {
    				if (result.isConfirmed) {
						window.location.href ='index.php'
 					 }})
   			 </script>

			<?php
      }
      elseif($status==1){
        ?>
        
			 <script>
       			 Swal.fire({
					icon: 'success',
  					title:'Addmission Done👍',
 					text:'Your Request Accepted',
					confirmButtonText: 'Login',
  				}).then((result) => {
    				if (result.isConfirmed) {
						window.location.href ='user/login.php'
 					 }})
   			 </script>

			<?php

      }
      else{
       ?>
        
			 <script>
       			 Swal.fire({
					icon: 'error',
  					title:'Addmission Rejected',
            text:'Request Cancelled',
					confirmButtonText: 'OK',
  				}).then((result) => {
    				if (result.isConfirmed) {
						window.location.href ='index.php'
 					 }})
   			 </script>

			<?php
      }
    }
    else{
       ?>
        
			 <script>
       			 Swal.fire({
					icon: 'question',
  					title:'No Record Found',
					confirmButtonText: 'OK',
  				}).then((result) => {
    				if (result.isConfirmed) {
						window.location.href ='index.php'
 					 }})
   			 </script>

			<?php
  }
  }
?>