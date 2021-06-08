<?php 
    session_start();

    $con = mysqli_connect('localhost','root');
    
    mysqli_select_db($con, 'healthcare'); 

    $searc = $_POST['search'];
   
    function function_alert($message) {
      echo "<script>alert('$message');</script>";
  }
?>		
<!DOCTYPE html>
<html lang="en">

<head>

	
	<title>Login</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://fonts.googleapis.com/css2?family=Amita:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@500&display=swap" rel="stylesheet">

 <!-- Custom styles for this template-->
  <link rel="stylesheet" href="css/style.css">
  <!-- <link rel="stylesheet" href="css/main_styles.css"> -->

</head>

<body class="page-top">

	<div id="wrapper">

		 <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion font-weight-bold" id="accordionSidebar">
          <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
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
          <i class="fas fa-fw fa-cog"></i>
          <span>Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="6-activitylog-sahayak.php">
          <i class="fas fa-fw fa-cog"></i>
          <span>History</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="3-scheme-sahayak.php">
          <i class="fas fa-fw fa-cog"></i>
          <span>Scheme</span>
        </a>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="4-facility-sahayak.php">
          <i class="fas fa-fw fa-cog"></i>
          <span>Facility</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="1-login-sahayak.php">
          <i class="fas fa-fw fa-cog"></i>
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
                <a class="navbar-brand" href="#" style="font-family: 'Amita', cursive;"><h1>sahayak | </h1></a><a class="navbar-brand mr-auto p-2 mb-2 d-sm-block"> Centralized Medical System</a>
                
                
                <!-- Topbar Navbar -->
                
                <div class=" rounded-left ml-auto p-2" >
                 
                        <span class="mr-2 font-weight-bold text-gray-600"><?php echo $_SESSION['patient_name']; ?></span>
		       </div>
		    </div>
		 </nav>
		 </section>
		 
 <div class="m-auto p-5">
 	<h4>search-results</h4>
 	<?php 
	//	header('location:2-dashboard-sahayak.php');

 	// if (isset($_POST['submit-search'])){
 	//	$search = mysqli_real_escape_string($conn, $_POST['search']);
     

$sql = "SELECT * FROM scheme_table WHERE scheme_name LIKE '$searc%'";
    $result = mysqli_query($con, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0) {
      while ($data = mysqli_fetch_assoc($result)) {
                echo "<div class='card shadow ml-5 mr-5 mt-4'>
                      <div class='card-header'>Scheme Name
                        <h4 class='font-weight-bold text-primary'>
                            <div class='card-body m-1'>
                              ".$data['scheme_name']."
                            </div>
                        </h4>
                      </div>";

                echo  "<div class='card-body'>Scheme Description
                      <h5>
                        <div class='card-body m-auto'>
                          ".$data['scheme_description']."
                        </div>
                      </h5>
                      <a href='3.1-scheme-sahayak.php?sname=".$data['scheme_name']." ' class='btn btn-primary col-lg-2 col-md-2 col-sm-auto' style='left: 800px;'>detailes
                      </a>
                    </div>
                  </div>";
        }
    }

$sql = "SELECT * FROM hospital WHERE name LIKE '$searc' OR address LIKE '$searc%'";
    $result = mysqli_query($con, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0) {
      while ($data = mysqli_fetch_assoc($result)) {
                echo "<div class='card shadow ml-5 mr-5 mt-4'>
                      <div class='card-header'>Hospital Name
                        <h4 class='font-weight-bold text-primary'>
                            <div class='card-body m-1'>
                              ".$data['name']."
                            </div>
                        </h4>
                      </div>";

                echo  "<div class='card-body'>Hospital Address
                      <h5>
                        <div class='card-body m-auto'>
                          ".$data['address']."
                        </div>
                      </h5>
                      <a href='3.1-scheme-sahayak.html' class='btn btn-primary col-lg-2 col-md-2 col-sm-auto' style='left: 800px;'>detailes
                      </a>
                    </div>
                  </div>";
        }
    }

$sql = "SELECT * FROM facility_table WHERE facility_name LIKE '$searc%' OR facility_description LIKE '$searc%'";
    $result = mysqli_query($con, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0) {
      while ($data = mysqli_fetch_assoc($result)) {
                echo "<div class='card shadow ml-5 mr-5 mt-4'>
                      <div class='card-header'>Facility Name
                        <h4 class='font-weight-bold text-primary'>
                            <div class='card-body m-1'>
                              ".$data['facility_name']."
                            </div>
                        </h4>
                      </div>";

                echo  "<div class='card-body'>facility_description
                      <h5>
                        <div class='card-body m-auto'>
                          ".$data['facility_description']."
                        </div>
                      </h5>
                      <a href='4.1-facility-sahayak.php?fname=".$data['facility_name']." ' class='btn btn-primary col-lg-2 col-md-2 col-sm-auto' style='left: 800px;'>detailes
                      </a>
                    </div>
                  </div>";
        }
    }
   
    ?>
 		
 			 </div>
    	 </div>
        
		</div><!-- /.container-fluid -->
	 </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>