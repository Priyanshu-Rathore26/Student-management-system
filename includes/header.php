<!--header-->
<head>
   <!-- plugins:css -->
   <link rel="stylesheet" href="user/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="user/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="user/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    

    <link rel="stylesheet" href="./css/style.css">
    <style>
      .dropdown-item:hover{
        transform: translateY(-2px);
    background: #6c5ce736;
      }
      .bbtn{
        border: 0px;
        width: 100%;
        text-align: left;
        margin-left:0px;
      }
      .user-dropdown:hover .dropdown-menu{
        display :block ;
      }
    </style>
   
</head>
    <div class="header" id="home">
      <nav class="navbar navbar-default">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"> </span>
            <span class="icon-bar"> </span>
            <span class="icon-bar"> </span>
          </button>
          <h1><a class="navbar-brand" href="index.php">SMS</a></h1>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right margin-top cl-effect-2">
                <li><a href="index.php"><span data-hover="Home">Home</span></a></li>
                <li><a href="about.php"><span data-hover="About">About</span></a></li>
                
                <li><a href="contact.php"><span data-hover="Contact">Contact</span></a></li>
                <li><a href="admin/login.php"><span data-hover="Contact">Admin</span></a></li>
                <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown" >
                  <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                 <span class="font-weight-normal"> Student </span></a>

                 <div class="dropdown-menu " style="padding:10px; width:200px; "  aria-labelledby="UserDropdown">
                   <a href="user/login.php"><div class="dropdown-item" style="padding:10px; font-size:1rem;" ><i class="dropdown-item-icon icon-user text-primary"></i>&nbsp; Login</div></a>
                   <a href="user/register.php"><div class="dropdown-item" style="padding:10px; font-size:1rem;"><i class="dropdown-item-icon icon-pencil text-primary"></i>&nbsp; Registration</div></a>
                   <div style="color:grey;"><?php include('check.php')?></div>
                  </div>

                 </li>
              </ul>
              <div class="clearfix"> </div>
            </div><!-- /.navbar-collapse -->
        <!-- /.container-fluid -->

      </nav>
<!--/script-->
       <div class="clearfix"> </div>
</div>
<!-- Top Navigation -->
<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>

<!--header-->