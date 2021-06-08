<?php
	include('select.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sahayak</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-Calendar.css">
    <link rel="stylesheet" href="assets/css/Custom-Card.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;

  bottom: 400;
  right: 500px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4e73df;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: #ddd;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>

</head>

<body id="page-top">
    <div id="wrapper">
       
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
 <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <div class="dropdown show no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="true" href="profile.html"><img class="border rounded-circle img-profile" src="assets/img/IMG_9325.JPG" style="width: 80px;height: 81px;margin-bottom: 7px;margin-left: 20px;"><h1 style="color: rgb(249,250,251);font-size: 20px;"><a href="profile.html" style="color: rgb(251,251,252);">Dr. Sharma</a></h1>
                    <h1
                        style="color: rgb(249,250,251);font-size: 15px;">Shahu Hospital,Pune</h1>
                        </a>
                        <div class="dropdown-menu show shadow dropdown-menu-right animated--grow-in" role="menu" style="background-color: #4e73df;filter: blur(88px);"></div>
                </div>
                <header></header>
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" data-bs-hover-animate="flash" href="index.php"><i class="fas fa-home"></i><span>Home</span></a>
					<a class="nav-link active" data-bs-hover-animate="flash" onclick="openForm()"><i class="fas fa-plus"></i><span>Add Patient</span></a>
					
					
					<a class="nav-link active" data-bs-hover-animate="flash" onclick="openForm()" href="#"><i class="fas fa-book-medical"></i><span>History</span></a>
					<a class="nav-link active" data-bs-hover-animate="flash" href="Scheme.html"><i class="fas fa-clipboard-list"></i><span>Schemes</span></a>
					</li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
				
		<script>
			function openForm() {
			  document.getElementById("myForm").style.display = "block";
			}

			function closeForm() {
			  document.getElementById("myForm").style.display = "none";
			}
		</script>
		
		<div class="form-popup" id="myForm">
		  <form class="form-container" action="" method="post">
			<h1>Patient ID</h1>
			<input type="text" placeholder="Enter ID" name="id" required>
			<div>
			<button type="submit" class="btn" name="submit">Check</button>
			<button type="button" class="btn cancel" onclick="closeForm()">Close</button></div>
		  </form>
		</div>
			
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <h1 style="font-family: Bitter, serif;">Sahayak</h1>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
          <!-- Topbar Search -->
          
          </div>
    
          
          
			<section class="p-3">  
      
			<div class="card shadow ml-5 mr-5 mt-3">
                <div class="card-header">
				<?php
					$sql = "SELECT Scheme_name FROM schemes";
					$result = mysqli_query($conn,$sql);
				?>
				
				<?php
				
				 while($rows = mysqli_fetch_assoc($result)) {
				 
				 ?>
                  <h4 class="font-weight-bold text-primary"><?php echo $row['Scheme_name']; ?></h4>
				 <?php
					}
				?>
				  </div>
            <div class="card-body">
              <h6 class="">The State Government of Maharashtra launched its flagship health insurance scheme, Rajiv Gandhi Jeevandayee Arogya Yojana (RGJAY) on 2nd July 2012 in 8 districts of Maharashtra (Phase 1) and later on introduced it to remaining 28 districts of Maharashtra (Phase 2). The scheme is renamed as Mahatma Jyotiba Phule Jan Arogya Yojana (MJPJAY) from 1st April 2017.</h6>
             <a href="SchemeDetails.html" class="btn btn-primary col-lg-2 col-md-2 col-sm-auto" style="left: 800px;">Details</a></div>
            </div>
			
            <div class="card shadow ml-5 mr-5 mt-3">
                <div class="card-header">
                  <h4 class="font-weight-bold text-primary">Janani Shishu Suraksha Karyakaram (JSSK)</h4></div>
            <div class="card-body">
              <h6 class="">In view of the difficulty being faced by the pregnant women and parents of sick new- born along-with high expenditure on delivery and treatment of sick- new-born, Ministry of health and Family Welfare (MoHFW) has taken a major initiative to ensure better facilities for women and child health services. It is an initiative  to provide completely free and cashless services to pregnant women including normal deliveries and caesarean operations and sick new born(up to 30 days after birth) in Government health institutions in both rural & urban areas.</h6>
             <a href="SchemeDetails.html" class="btn btn-primary col-lg-2 col-md-2 col-sm-auto" style="left: 800px;">Details</a></div>
            </div>

            
      </section>

      </div>
     </div>
                   
                </div>
            </div>
        </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Centralized Medical System</span></div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>