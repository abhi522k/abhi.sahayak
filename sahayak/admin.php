<?php
include('select.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Testimonials.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	
	

	<style>
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
</style>

  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
			
		['location','malaria','dangue','typhoid','viral_fever'],
		<?php 
			$loc = ["1", "2", "3","4","5","6","7","8","9","10","11","12"];
			$query = "SELECT `location`, `malaria`, `dangue`, `typhoid`, `viral_fever` FROM `prediction` WHERE 1";

			 $exec = mysqli_query($conn,$query);
			 $i=0;
			 while($row = mysqli_fetch_array($exec)){
	
			 echo "['$loc[$i]',".$row['malaria'].",".$row['dangue'].",".$row['typhoid'].",".$row['viral_fever']."],";
			 $i++;
			 }
		?> 
 
		]);

        var options = {
          title: 'Disease Range',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
 
</html>

</head>

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
			<form  action="/external/" method="POST">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <h1>Sahayak-Admin</h1>
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
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="font-size: 20px;"><span>Schemes</span></div>
                                        </div>
                                        <div class="col-auto"><i class="far fa-clipboard fa-2x text-gray-300"></i></div>
                                    </div><a  href="AddSheme.php" class="btn btn-primary btn-icon-split" role="button"><span class="text-white-50 icon"><i class="fas fa-plus"></i></span><span class="text-white text">ADD</span></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span style="font-size: 20px;">Facilities</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-notes-medical fa-2x text-gray-300"></i></div>
                                    </div><a href="AddFacility.php" class="btn btn-primary btn-icon-split" role="button"><span class="text-white-50 icon"><i class="fa fa-plus"></i></span><span class="text-white text">ADD</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="curve_chart" style="width: 800px; height: 500px"></div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4"></div>
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card text-white bg-danger shadow">
                                        <div class="card-body">
                                            <p class="m-0">Alert</p>
											<?php
												$sql = "SELECT count(*),malaria from prediction where malaria>10000 LIMIT 2";
												
												$result = mysqli_query($conn,$sql);
												$rows = mysqli_fetch_assoc($result);
												$count = $rows['malaria'];
												$disease_name = "MALARIA";
												if($count>10000){
														$sql = "REPLACE INTO alerty SET disease_name='$disease_name', count = '$count'";
														if ($conn->query($sql) === TRUE) {
														 
														} else {
														  echo "Error: " . $sql . "<br>" . $conn->error;
														}

													}
											?>
											<?php
												$sql = "SELECT count(*),dangue from prediction where dangue>10000 LIMIT 2";
												
												$result = mysqli_query($conn,$sql);
												$rows = mysqli_fetch_assoc($result);
												$disease_name = "DANGUE";
												$count = $rows['dangue'];
												if($count>10000){
														$sql = "REPLACE INTO alerty SET disease_name='$disease_name', count = '$count'";
														if ($conn->query($sql) === TRUE) {
														  
														} else {
														  echo "Error: " . $sql . "<br>" . $conn->error;
														}

													}
											?>
											<?php
												$sql = "SELECT count(*),typhoid from prediction where typhoid>10000 LIMIT 2";
												
												$result = mysqli_query($conn,$sql);
												$rows = mysqli_fetch_assoc($result);
												$disease_name ="TYPHOID";
												$count = $rows['typhoid'];
												if($count>10000){
														$sql = "REPLACE INTO alerty SET disease_name='$disease_name', count = '$count'";
														if ($conn->query($sql) === TRUE) {
														 
														} else {
														  echo "Error: " . $sql . "<br>" . $conn->error;
														}

													}
											?>
											<?php
												$sql = "SELECT count(*),viral_fever from prediction where viral_fever>10000 LIMIT 2";
												
												$result = mysqli_query($conn,$sql);
												$rows = mysqli_fetch_assoc($result);
												$disease_name = "VIRAL FEVER";
												$count = $rows['viral_fever'];
												if($count>10000){
														$sql = "REPLACE INTO alerty SET disease_name='$disease_name', count = '$count'";
														if ($conn->query($sql) === TRUE) {
														  
														} else {
														  echo "Error: " . $sql . "<br>" . $conn->error;
														}

													}
											?>
								
										<?php
												$sql = "SELECT disease_name, count FROM `alerty` ORDER BY count DESC LIMIT 1";
												
												$result = mysqli_query($conn,$sql);
												$row = mysqli_fetch_assoc($result);
										?>
								      <h4 class="flash animated infinite small font-weight-bold" style="color:black;font-size: 20px"> <?php echo $row['disease_name'];?></h4>
									  <h4 class="flash animated infinite small font-weight-bold" style="color:black"><?php echo $row['count'];?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="form-popup" id="myForm">
							<form class="form-container" method="POST">
                            <div class="card shadow border-left-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span style="font-size: 20px;">Generate Alert</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-bell fa-2x text-gray-300"></i></div>
                                    </div>
									 <div><a class="btn btn-primary btn-lg" role="button" data-toggle="modal" href="#generateAlert" 
									 style="width:23;height: 61;font-size: 20px; margin-top:20px;"><i class="fa fa-plus" style="margin-right: 10px;">
									 </i>ADD</a></div>
									</div>
                            </div>
							<div class="modal fade"
                            role="dialog" tabindex="-1" id="generateAlert">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-justify align-items-center align-content-center align-self-center" style="font-family: Bitter, serif;font-size: 16px;color: #4e73df;filter: blur(0px) hue-rotate(0deg) invert(0%);margin-left: 180px;">Generate Alert</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    <div class="modal-body">
                                        
                                        <div class="card">
                                            <div class="card-body" style="padding: 5px;">
												<input class="border rounded border-secondary shadow" type="text" name="id" placeholder="Scheme Id" style="width: 100px;margin: 11px;margin-bottom: 9px;padding: 10px;">
                                                 <h1 style="font-size: 20px;margin-left: 10px;">Add Data</h1>
												 <textarea style="width: 428px;margin: 10px;margin-bottom: 5px;padding: 10px;" name="addAlert"></textarea>
                                                <label>Date</label><input class="form-control" type="date" style="margin-bottom: 8px;" name="Adddate">
                                            </div>
                                        </div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button type="submit" class="btn" name="submit">Generate</button></div>
                                </div>
                            </div>
                            </div>
							</form>
							</div>
                        </div>
                    </div>
                    <div class="row"></div>
                </div>
				</form>
            </div>
			
			<?php
						if( isset($_POST["submit"]))
						{    
							
							 $ID = $_POST['id'];
							 $AddAlert = $_POST['addAlert'];
							 $Adddate = $_POST['Adddate'];
						 
							 $sql = "INSERT INTO `alert`(`id`,`alert`, `date`) VALUES ('$ID','$AddAlert','$Adddate')";
							 
							if ($conn->query($sql) === TRUE) {
								//$ID = $ID+1;
							  echo "New record created successfully";
							} else {
							  echo "Error: " . $sql . "<br>" . $conn->error;
							}

							
							 
							 
							
						}
			?>
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