<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "healthcare";


// Create connection
$conn = new mysqli($servername, $username, $password,$db);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Scheme</title>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Amita:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@500&display=swap" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

</head>
<body>
	
	<!-- Page Wrapper -->
  <div id="wrapper">
   
               <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion font-weight-bold" id="accordionSidebar">
          <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">User</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="2-dashboard-sahayak.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

       <li class="nav-item">
        <a class="nav-link" href="5-userpanel-sahayak.php">
          <i class="fas fa-fw fa-id-card"></i>
          <span>Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="6-activitylog-sahayak.php">
          <i class="fas fa-fw fa-file-medical"></i>
          <span>History</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="3-scheme-sahayak.php">
          <i class="fas fa-fw fa-calendar-plus"></i>
          <span>Scheme</span>
        </a>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="4-facility-sahayak.php">
          <i class="fas fa-fw fa-hospital"></i>
          <span>Facility</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="1-login-sahayak.php">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>

    </ul>
    <!-- End of Sidebar -->


  
   <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
            
            <section> 
            <!-- Navbar -->
            <nav class="navbar navbar-expand-md flex-row navbar-light bg-white topbar shadow border-dark p-5">
               
               <div class="container">

              <a class="navbar-brand" href="#" style=" margin: 0; padding: 0; font-family: 'Amita', cursive;"><h1>sahayak | </h1></a><a class="navbar-brand p-2"> Centralized Medical System</a>
             
              <!-- Topbar Navbar -->
              <button class="navbar-toggler" type="button" data-toggle="collapse" 
              data-target="#collapsenavbar1">
                <span class="navbar-toggler-icon"></span>
              </button>
             <div class="collapse navbar-collapse" id="collapsenavbar1">
             
              <ul class="navbar-nav ml-auto p-2 ">
                
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                    <span class="mr-2 font-weight-bold text-gray-600"><?php echo $_SESSION['patient_name']; ?></span>
                    </a>
                </li>
                </ul>
              </div>
            </div>
            </nav>
          </section>

			<section class="p-5">
        <?php 
        $facilityname = $_GET['fname'];
        $query="SELECT * FROM facility_view WHERE facilityname LIKE '$facilityname%'";
        $con=mysqli_query($conn,$query);
        while($data=mysqli_fetch_array($con)){
        echo "<div class='card shadow mb-4'>
                
                <div class='card-header py-3'>
                  <h4 class='font-weight-bold text-primary'>
                  ".$data['facilityname']."
                </div>
               
                <div class='card-body'>
                  <h5>Description by:</h5>
                  <h6 class='p-3'>".$data['facility_description']."</h6>
                <div>

              <a class='align-content-center' href='https://www.jeevandayee.gov.in/'>
               <button class='btn btn-primary col-lg-2 col-md-2 col-sm-auto'>visit site</button>
              </a>
            </div><br>

            </div>
          </div>";
          }?>
      </section>

        <!--   <section class="container-fluid p-4" style="font-family: 'Baloo Da 2', cursive;">
          <div class="justify-content-center">

          <div class="card shadow col-lg-11 col-md-11 col-sm-auto mt-2">
          	<div class="card-header"><h4 class="font-weight-bold text-primary">Mahatma Jyotiba Phule Jan Arogya Yojana</h4></div>
          	<div class="card-body py-3">
            <h5 class="pt-2">Sponsered by:</h5>
            <h4 class="p-1">Maharashtra goverment</h4>
            <h5 class="">Description:</h5>
            <h6 class="p-2">The State Government of Maharashtra launched its flagship health insurance scheme, Rajiv Gandhi Jeevandayee Arogya Yojana (RGJAY) on 2nd July 2012 in 8 districts of Maharashtra (Phase 1) and later on introduced it to remaining 28 districts of Maharashtra (Phase 2). The scheme is renamed as Mahatma Jyotiba Phule Jan Arogya Yojana (MJPJAY) from 1st April 2017.</h6>
            <h5 class="">Eligibilty Criteria:</h5>
            <h5 class="">Required Documents:</h5>
            <div>
            <button href="#" class="btn btn-primary col-lg-2 col-md-2 col-sm-auto" style="left: 200px;">apply</button>
           <button href="#" class="btn btn-primary col-lg-2 col-md-2 col-sm-auto" style="left: 600px;">visit site</button></div><br>
        	</div>
        </div>
       </div>
      </section>
 -->
      </div>
     </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


</body>
</html>