<?php

include('includes/dbconnection.php');
// $sql="SELECT * FROM tbltempstudent WHERE id=199 ";
// $query = $dbh -> prepare($sql);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);
// foreach($results as $row){
// echo $row->StudentName;
// }
// $result=mysqli_query($conn,$sql);
// $row=mysqli_fetch_assoc($result);
// echo $row->StudentName;
if(isset($_POST['submit'])){
    echo "hello";
    $name=$_POST['Name'];
    $username=$_POST['username'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    
    
    // echo "<script>alert('hii') </script>";
    $sql="INSERT INTO tbladmin(AdminName,UserName,MobileNumber,Email,Password) VALUES('$name','$username','$contact','$email','$password')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo  "<script> alert('reord added')</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
</head>
<body>
    <form action="" name="submit" method="POST" enctype="multipart/form-data">
        <div>

            <input type="text" placeholder=" Name" name="Name">
        </div>
        
        <div>

            <input type="text" placeholder=" username" name="username">
        </div>
        <div>

            <input type="text" placeholder="mobile no " name="contact">
        </div>
         <div>

             <input type="email" placeholder=" email" name="email">
            </div>
            <div>

                <input type="password" placeholder="password " name="password">
            </div>
            <div>
                <button type="submit" name="submit">submit</button>
            </div>

    </form>
</body>
</html>