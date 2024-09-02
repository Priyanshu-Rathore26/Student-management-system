<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/sweetalert.php'); 
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   // Code for deletion
if(isset($_GET['aid']))
{
    $aid=intval($_GET['aid']);
    //  $stuid=$_POST['stuid'];
    $q="SELECT MAX(ID) as max FROM tblstudent";
    $run=mysqli_query($conn,$q);
    $data=mysqli_fetch_object($run);
    $stuid=$data->max;
    $stuid++;
    $sql="SELECT * FROM tbltempstudent WHERE id=$aid";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    foreach($results as $row){
        $sql="insert into tblstudent(StudentName,StudentEmail,StudentClass,Gender,DOB,StuID,FatherName,MotherName,ContactNumber,AltenateNumber,Address,UserName,Password,Image)values(:stuname,:stuemail,:stuclass,:gender,:dob,'2023ST$stuid',:fname,:mname,:connum,:altconnum,:address,:uname,:password,:image)";
        $query=$dbh->prepare($sql);
        $query->bindParam(':stuname',$row->StudentName,PDO::PARAM_STR);
        $query->bindParam(':stuemail',$row->StudentEmail,PDO::PARAM_STR);
        $query->bindParam(':stuclass',$row->StudentClass,PDO::PARAM_STR);
        $query->bindParam(':gender',$row->Gender,PDO::PARAM_STR);
        $query->bindParam(':dob',$row->DOB,PDO::PARAM_STR);
        // $query->bindParam(':stuid','2023ST'$stuid,PDO::PARAM_STR);
        $query->bindParam(':fname',$row->FatherName,PDO::PARAM_STR);
        $query->bindParam(':mname',$row->MotherName,PDO::PARAM_STR);
        $query->bindParam(':connum',$row->SContact,PDO::PARAM_STR);
        $query->bindParam(':altconnum',$row->FContact,PDO::PARAM_STR);
        $query->bindParam(':address',$row->Address,PDO::PARAM_STR);
        $query->bindParam(':uname',$row->Username,PDO::PARAM_STR);
        $query->bindParam(':password',$row->Password,PDO::PARAM_STR);
        $query->bindParam(':image',$row->Image,PDO::PARAM_STR);
        $query->execute();

         $LastInsertId=$dbh->lastInsertId();
         if ($LastInsertId>0) {
            $sql="UPDATE tbltempstudent SET Status=1 WHERE id=$aid";
            $run=mysqli_query($conn,$sql);

?>
          <script>
       			 Swal.fire({
					icon: 'success',
  					title:'Done',
 					text:'Student has been added.',
					confirmButtonText: 'OK',
  				}).then((result) => {
    				if (result.isConfirmed) {
						window.location.href ='manage-request.php'
 					 }})
   			 </script>
         <?php
  }
  else
    {
      ?>
        
      <script>
             Swal.fire({
         icon: 'question',
           title:'Something went wrong',
           text:'Please try again.',
         confirmButtonText: 'OK',
         }).then((result) => {
           if (result.isConfirmed) {
           window.location.href ='manage-request.php'
           }})
         </script>

     <?php
    }

    }
}
elseif(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
// $sql="delete from tblstudent where ID=:rid";
$sql="UPDATE tbltempstudent SET Status=2 WHERE id=$rid";
$run=mysqli_query($conn,$sql);
?>
          <script>
       			 Swal.fire({
					icon: 'success',
  					title:'Addmission Cancelled',
 					text:'Student has been Removed.',
					confirmButtonText: 'OK',
  				}).then((result) => {
    				if (result.isConfirmed) {
						window.location.href ='manage-request.php'
 					 }})
   			 </script>
         <?php



}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|||Requests</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
    <!-- image inlarger code -->
    <style>
        .div-img{
    justify-content: center;
    align-items: center;
    display:flex;
    padding-top:20%;
    }
    img{
    transition: transform .2s;
    width:50px;
    height:50px;
    margin:0 auto;
    background-color: rgb(173, 173, 237);
    border-radius: 50px;
    border: 1px solid grey;
    }
    img:hover{
    transform:scale(5);
    }
    </style>
   
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
             <div class="page-header">
              <h3 class="page-title"> Requests </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Requests</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Manage Student Requests</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Students</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">S.No</th>
                            <th class="font-weight-bold">Student Name</th>
                            <th class="font-weight-bold">Class</th>
                            <th class="font-weight-bold">Gender</th>
                            <th class="font-weight-bold">DOB</th>
                            <th class="font-weight-bold">Contact</th>
                            <th class="font-weight-bold">Email</th>
                            <th class="font-weight-bold">Photo</th>
                            <th class="font-weight-bold">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                           <?php
                            if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        // Formula for pagination
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $ret = "SELECT ID FROM tblstudent";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$total_rows=$query1->rowCount();
$total_pages = ceil($total_rows / $no_of_records_per_page);
$sql="SELECT tbltempstudent.id as sid,tbltempstudent.StudentName,tbltempstudent.Gender,tbltempstudent.DOB,tbltempstudent.SContact,tbltempstudent.Image,tbltempstudent.StudentEmail,tblclass.ClassName,tblclass.Section from tbltempstudent join tblclass on tblclass.ID=tbltempstudent.StudentClass WHERE tbltempstudent.Status=0 LIMIT $offset, $no_of_records_per_page";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>   
                          <tr>
                           
                            <td><?php echo htmlentities($cnt);?></td>
                            <td><?php  echo htmlentities($row->StudentName);?></td>
                            <td><?php  echo htmlentities($row->ClassName);?> <?php  echo htmlentities($row->Section);?></td>
                            <td><?php  echo htmlentities($row->Gender);?></td>
                            <td><?php  echo htmlentities($row->DOB);?></td>
                            <td><?php  echo htmlentities($row->SContact);?></td>
                            <td><?php  echo htmlentities($row->StudentEmail);?></td>
                            <td> <div class="div-img"> <img src="images/<?php echo $row->Image;?>" value="<?php  echo $row->Image;?>"></div></td>
                            <td>
                              <div><a href="manage-request.php?aid=<?php echo htmlentities ($row->sid);?>"><i class="icon-plus"></i></a>
                                                || <a href="manage-request.php?delid=<?php echo ($row->sid);?>" class="btn_del"> <i class="icon-trash"></i></a></div>
                            </td> 
                          </tr><?php $cnt=$cnt+1;}} ?>
                        </tbody>
                      </table>
                    </div>
                    <script>
                        $('.btn_del').on('click', function(e){
                            e.preventDefault();
                            const href = $(this).attr('href')
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "Record will be deleted?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                  if (result.isConfirmed) {
                                    document.location.href = href;
                                  }
                                })
                        })
                    </script>
                    <div align="left">
    <ul class="pagination" >
        <li><a href="?pageno=1" style="color:green;"><strong><<-First Page</strong></a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px"> <-Prev</strong></a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Next-></strong></a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>" style="color:green;"><strong style="padding-left: 10px">Last Page->></strong></a></li>
    </ul>
</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html><?php }  ?>