<?php


	include('select.php');
	
	
 
				
				if(!isset($_SESSION)){
					session_start();
				}
				  if($_SERVER["REQUEST_METHOD"] == "POST")
				  {
				   // patient id  sent from form 
					 $p_id=mysqli_real_escape_string($conn,$_POST['id']); 
				 
					 $sql="SELECT aadhar FROM patient WHERE aadhar='$p_id'";
					 $result=mysqli_query($conn,$sql);
					 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
					 $active=$row['active'];
				 
					 $count=mysqli_num_rows($result);
				 
					// If result matched $p_id, table row must be 1 row
					if($count==1)
					{
					
					 $_SESSION['login_user']=$p_id;
					
					 header("location: History.php");
					}
					if($count==0)
					{
						$_SESSION['login_user']=$p_id;
				 
						header("location: AddPatient.php");
					}
				  }
				
				  
          
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
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <div><i class="fas fa-home"  style="font-size:60px; color:white; margin:15px"></i><h1 style="color: rgb(249,250,251);font-size: 20px;"><a href="profile.php" style="color: rgb(251,251,252);"> Profile</a></h1>
                    
                        </a>
                        <div class="dropdown-menu show shadow dropdown-menu-right animated--grow-in" role="menu" style="background-color: #4e73df;filter: blur(88px);"></div>
                </div>
                <header></header>
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" data-bs-hover-animate="flash" href="index.php"><i class="fas fa-home"></i><span>Home</span></a>
					<a class="nav-link active" data-bs-hover-animate="flash" onclick="openForm()"><i class="fas fa-plus"></i><span>Add Patient</span></a>
					
					
					<a class="nav-link active" data-bs-hover-animate="flash" onclick="openForm()" href="#"><i class="fas fa-book-medical"></i><span>History</span></a>
					<a class="nav-link active" data-bs-hover-animate="flash" href="Scheme.php"><i class="fas fa-clipboard-list"></i><span>Schemes</span></a>
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
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4" style="width: 134;height: 31px;">
                        <h3 class="text-dark mb-0" style="font-size:44px;">Dashboard</h3>
                       
                        
						 <div><a class="btn btn-primary btn-lg" role="button" data-toggle="modal" href="#generateCase" style="width: 136;height: 81;font-size: 34px; margin-top:20px;"><i class="fa fa-download" style="margin-right: 10px;"></i>Generate Case</a></div>
                        <div class="modal fade"
                            role="dialog" tabindex="-1" id="generateCase">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-justify align-items-center align-content-center align-self-center" style="font-family: Bitter, serif;font-size: 16px;color: #4e73df;filter: blur(0px) hue-rotate(0deg) invert(0%);margin-left: 180px;">OPD RECEIPT</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    <div class="modal-body">
                                        <p style="margin: px;margin-bottom: 5px;">Hospital Name&nbsp;</p>
                                        <h1 style="font-size: 16px;margin-bottom: 5px;">Phone No</h1>
                                        <div></div>
                                        <div class="card">
                                            <div class="card-body" style="padding: 5px;">
                                                <h1 style="font-size: 15px;font-family: Bitter, serif;">OPD No:<input type="text" style="margin-left: 200px;"></h1>
                                                <h1 style="font-size: 15px;font-family: Bitter, serif;">Patient Name:<input type="text" style="margin-left: 165px;"></h1>
                                                <h1 style="font-size: 15px;font-family: Bitter, serif;">Department:<input type="text" style="margin-left: 175px;"></h1>
                                                <h1 style="font-size: 15px;font-family: Bitter, serif;">Doc Name:<input type="text" style="margin-left: 180px;"></h1>
                                                <ul class="list-group"></ul>
                                                <h1 style="font-size: 15px;font-family: Bitter, serif;">Receipt Type<input type="text" style="margin-left: 170px;"></h1>
                                                <h1 style="font-size: 15px;font-family: Bitter, serif;">Total Fees:<input type="text" style="margin-left: 185px;"></h1>
                                                <h1 style="font-size: 15px;font-family: Bitter, serif;">Paid Cash:<input type="text" style="margin-left: 186px;"></h1>
                                                <h1 style="font-size: 20px;font-family: Bitter, serif;">Room No<input type="text" style="margin-left: 172px;width: 81px;height: 50px;"></h1>
                                            </div>
                                        </div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button" name="submit" onclick="window.print()">Print</button></div>
                                </div>
                            </div>
                            </div>
							</div>
                    </div>
					<section class="p-5">
         

              <div class="container text-dark">
                  <div class="row d-flex justify-content-around align-items-center text-center">
                  <div class="  pt-1 pb-0 pl-5 pr-5">
				
                                      
                  </div>
              </div>
          </section>  
                   
                        <div class="col-lg-7 col-xl-8" style="margin-left:30px; margin-right:20px">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0" style="font-size:30px">Alerts</h6>
                                   
                                </div>
									
								<?php
										$sql = "SELECT `name`, `date` FROM `alert` ORDER BY date DESC LIMIT 5 ";
										$result = mysqli_query($conn,$sql);
								
									 
								?>
								
								
								<?php	while($rows = Mysqli_fetch_array($result)){ ?>
                                <div class="card-body">
                                    <h4 style="color: rgb(239,66,54); font-size: 15px"> <?php echo $rows['name']; ?><span class="float-right"> <?php echo $rows['date']; ?></span></h4>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                       
                
            </div>
			
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Centralized Medical System</span></div>
                </div>
            </footer>
        </div></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	
</body>
	
	

</html>