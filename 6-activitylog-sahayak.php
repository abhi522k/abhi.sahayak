<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "healthcare";
$conn = new mysqli($servername, $username, $password,$db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Activity log</title>

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
                <!-- Nav item Alerts -->
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

      <section>
        <!-- Begin Page Content -->
        <div class="container-fluid">


        </div>
        <!-- /.container-fluid -->
      </section>

        <section class="p-3">  
      <?php 
      $id1 = $_SESSION['patient_id'];
      $query="SELECT * FROM history WHERE patient_id LIKE '$id1'";
         $con=mysqli_query($conn,$query);
           while($data=mysqli_fetch_array($con)){
              echo "<div class='card shadow ml-5 mr-5 mt-3'>
                      <div class='card-header'>
                        <h4 class='font-weight-bold text-primary'>
                            <div class='card-body'>
                              ".$data['disease_name']."
                            </div>
                        </h4>
                      </div>";

              echo  "<div class='card-body'>  
                      <h5>
                        <div class='card-body'>
                          ".$data['symptoms']."
                        </div>
                        <div class='card-body'>
                          ".$data['disease_from']."---".$data['disease_till']."
                        </div>
                      </h5>
                    </div>
                  </div>";
               }?>
       </section>

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