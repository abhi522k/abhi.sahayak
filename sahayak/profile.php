<?php
	
	include('select.php');
	
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-Calendar.css">
    <link rel="stylesheet" href="assets/css/Custom-Card.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar"></ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <h1></h1>
                        <h1 style="font-family: Bitter, serif;"></h1>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                               
                            </li>
                            
         
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation"></li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="assets/img/IMG_9325.JPG" width="160" height="160">
                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Change Photo</button></div>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Previous Work</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">sancheti Hospital,Pune.<span class="float-right">2008-Present</span></h4>
                                    <h1 style="font-size: 15px;">Civil Surgen</h1>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Aditya Birla Memorial Hospital,Pune.<span class="float-right">2003-2008</span></h4>
                                    <h1 style="font-size: 15px;">Civil Surgen</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                           
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Personal Details</p>
                                        </div>
                                        <div class="card-body">
                                            <form method = "post">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="username"><strong>Please Enter Your ID</strong><br></label><input class="form-control" type="text" placeholder="your ID" name="did"></div>
                                                    </div>
													 <div class="col">
                                                        <div class="form-group"><label for="username"><strong>Please Enter Your password</strong><br></label><input class="form-control" type="text" placeholder="your ID" name="pass"></div>
                                                    </div>
													
                                                         <div class="form-group"><button class="btn btn-primary btn-sm" type="submit" name="Check">Check&nbsp;</button></div>
                                                    </div>
                                                    <?php
														if( isset($_POST["Check"]))
														{    
															
															
															 $did = $_POST['did'];
															  $pass = $_POST['pass'];
														 
															 $sql = "SELECT `doctor_id`, `name`, `password`, `hospital_id`, `doc_hospitals`, `speciality`, `rating` FROM `doctor` WHERE doctor_id =$did && password = $pass";
															$result = mysqli_query($conn,$sql);
			
															$row = mysqli_fetch_assoc($result);
				 
			
														}
													?>
													</form>
                                                </div>
												<form id = "my from">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group" style="margin-left:10px; color:blue"><strong>Doctor Name</strong><br></div>
														<div class="form-group" style="margin-left:15px"><strong><?php echo $row['name']?></strong><br></div>
                                                    </div>
                                                </div>
										<div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Work Details</p>
                                        </div>
                                        <div class="card-body">
                                            
                                                <div class="form-group" style="margin-left:10px; color:blue"><strong>Speciality</strong><br></div>
												<div class="form-group" style="margin-left:15px"><strong><?php echo $row['speciality']?></strong><br></div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group" style="margin-left:10px; color:blue"><strong>Hospital Id</strong><br></label></div>
														<div class="form-group" style="margin-left:15px"><strong><?php echo $row['hospital_id']?></strong><br></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group" style="margin-left:10px; color:blue"><strong>Hospital Name</strong></div>
														<div class="form-group" style="margin-left:15px"><strong><?php echo $row['doc_hospitals']?></strong><br></div>
                                                    </div>
                                                </div>
                                               
                                            
                                        </div>
										 
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
	</div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2019</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>