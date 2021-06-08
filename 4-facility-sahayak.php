<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "healthcare";


// Create connection
$conn = new mysqli($servername, $username, $password,$db);
$id1 = $_SESSION['patient_id'];
$name = $_SESSION['patient_name'];

$q="SELECT * from aadhar WHERE aadhar = '$id1'";
$con=mysqli_query($conn,$q);

$data=mysqli_fetch_array($con);
$id2 = $data['ration_card'];
$id3 = $data['income_certificate'];
$id4 = $data['satbara_utara'];
$id5 = $data['health_card'];
$id6 = $data['pan_card'];
$id7 = $data['pregnant'];
$id8 = $data['user_need_operation'];
$id9 = $data['voter_id_card'];
$id10 = $data['rural_area'];
$id11 = $data['urban_area'];



$query="UPDATE `facility_table` SET `facility_name` = '$name',`ration_card` = '$id2',`health_card` = '$id5',`income_certificate` = '$id3',`pregnant` = '$id7',`opd` = '$id8',`voter_card` = '$id9',`rural_area` = '$id10',`pan_card` = '$id6',`urban_area` = '$id11',`satbara_utara` = '$id4' WHERE `facility_table`.`index` = 0
";
$con=mysqli_query($conn,$query);

$python = `python facility.py`;
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Sahayak | Facility</title>

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
    
          <section class="container-fluid">
          <div class="row justify-content-center mt-3 p-0"> 
          <div class="card col-lg-2 col-md-2 p-3 m-3 shadow ">
          <h3 class="p-2 font-weight-bold">Facility</h3></div>
          <!-- Topbar Search -->
          <div class="card col-lg-8 col-md-8 p-3 m-4 shadow ">
           <form action="search.php" method="POST" class="search_container_form form mr-auto w-100 mt-2 mb-2 navbar-search input-group">
                  <input type="text" name="search" class="search_container_input form-control bg-light border-0 small" placeholder="Search for scheme ..." aria-label="Search" aria-describedby="basic-addon2">
                    <button class="search_container_button btn btn-primary" name="submit-search" type="submit">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
              </form>
            </div>
          </div>
          </section>
          
          
    <section class="p-3">  
      <?php $query="SELECT facilityname,facility_description from facility_view";
         $con=mysqli_query($conn,$query);
           while($data=mysqli_fetch_array($con)){
              echo "<div class='card shadow ml-5 mr-5 mt-3'>
                      <div class='card-header'>
                        <h4 class='font-weight-bold text-primary'>
                            <div class='card-body m-1'>
                              ".$data['facilityname']."
                            </div>
                        </h4>
                      </div>";

              echo  "<div class='card-body'>
                      <h5>
                        <div class='card-body m-1'>
                          ".$data['facility_description']."
                        </div>
                      </h5>
                      <a href='4.1-facility-sahayak.php?fname=".$data['facilityname']." ' class='btn btn-primary col-lg-2 col-md-2 col-sm-auto' style='left: 800px;'>detailes
                      </a>
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