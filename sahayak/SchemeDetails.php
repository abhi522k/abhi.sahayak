<?php
	include('select.php');
	//require_once('sessio.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>sha2</title>
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

<body>
    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
            <h1 style="font-family: Bitter, serif;">Sahayak</h1>
            <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group" style="width: 150px;">
                    <div class="input-group-append"></div>
                </div>
            </form><input class="bg-light border rounded border-primary border-0 small" type="text" placeholder="Search for Schemes" style="width: 210px;height: 30px;padding: 5px;"><button class="btn btn-primary py-0" type="button" style="height: 30px;"><i class="fas fa-search"></i></button>
            <ul
                class="nav navbar-nav flex-nowrap ml-auto">
                <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                    <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto navbar-search w-100">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow" role="presentation">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Dr. Varma</span><img class="border rounded-circle img-profile" src="assets/img/IMG_9325.JPG"></a>
                        <div
                            class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                            <a
                                class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
        </div>
        </li>
        </ul>
        </div>
    </nav>
    <section class="p-5">
				<?php
					$sql = "SELECT `Scheme_id`, `Scheme_name`, `Scheme_description`, 
					`Scheme_benificiaries`, `scheme_benefits`, `docs_req`, `no_of_applicants`, `department`, `link` FROM `scheme_material` WHERE Scheme_id = '98776'";
					$result = mysqli_query($conn,$sql);
				?>	
				
				<?php
					$rows = mysqli_fetch_assoc($result);
				?>
				
				<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="font-weight-bold text-primary"><?php echo $rows['Scheme_name']; ?></h4></div>
            <div class="card-body">
	            <h5 class="pt-0">Sponsered by:</h5>
	            <h4 class="p-3"><?php echo $rows['department']; ?></h4>
	            <h5 class="">Description:</h5>
	            <h6 class="p-3"><?php echo $rows['Scheme_description']; ?></h6>
				<h5 class="">Scheme Benefits:</h5>
	            <h6 class="p-2"><?php echo $rows['scheme_benefits']; ?></h6>
	            <h5 class="">Eligibilty Criteria:</h5>
	            <h6 class="p-2"><?php echo $rows['Scheme_benificiaries']; ?></h6>
	            <h5 class="">Required Documents:</h5>
	            <h6 class="p-2"><?php echo $rows['docs_req']; ?></h6>
	            <div>
	            <button href="#" class="btn btn-primary col-lg-2 col-md-2 col-sm-auto" style="left: 200px;">apply</button>
              <a class="" href="https://www.jeevandayee.gov.in/">
	           <button class="btn btn-primary col-lg-2 col-md-2 col-sm-auto" style="left: 600px;">visit site</button></a></div><br>
            </div>
              </div>
			 
			</section>
      </div>
     </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>