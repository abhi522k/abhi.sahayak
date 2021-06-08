<?php
	include('select.php');
	include('sessio.php');
	
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #4e73df;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 80px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
max-height:600px;
  max-width: 500px;
  padding: 5px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 5px;
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
  background-color:black;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
            <h1 style="font-family: Bitter, serif;">Sahayak</h1>
            <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group" style="width: 150px;">
                    <div class="input-group-append"></div>
                </div>
            </form>
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
                <li class="nav-item dropdown no-arrow" role="presentation">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Dr. Varma</span><img class="border rounded-circle img-profile" src="assets/img/IMG20180708185021.jpg"></a>
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
    <div class="card" style="margin: 50px;">
        <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-center mb-4" style="width: 134;height: 31px;">
                <h3 class="text-dark mb-0" style="color: #4e73df;"><?php echo $login_session; ?></h3>
                <div><a class="btn btn-primary btn-lg" role="button" data-toggle="modal" href="#generateCase" style="width: 136;height: 31;font-size: 14px;">Applied Schemes</a></div>
                <div class="modal fade" role="dialog" tabindex="-1" id="generateCase">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-justify align-items-center align-content-center align-self-center" style="font-family: Bitter, serif;font-size: 16px;color: #4e73df;filter: blur(0px) hue-rotate(0deg) invert(0%);margin-left: 180px;">Applied Schemes</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
								
                                
                                <div></div>
						
								
								<?php
										$sql = "SELECT Scheme_name,Scheme_id FROM scheme_material WHERE Scheme_id IN (SELECT Scheme_id FROM p_schemes WHERE patient_id ='$login_session' )";
										$result = mysqli_query($conn,$sql);
								
									 
								?>
								
								
								<?php
									
									while($rows = Mysqli_fetch_array($result)){
									 
								 ?>
                                <div class="card">
                                    <div class="card-body" ">
										
                                      <div> <h4 class="text-dark mb-0" style="color: rgb(2,4,10);font-family: Bitter, serif;font-size: 16px; ">Scheme Id  :</h4> <h4 class="text-dark mb-0" style="font-family: Bitter, serif;font-size: 16px; color:#4e73df;margin-bottom: 10px;"> <?php echo $rows['Scheme_id']; ?></h4></div>
									   <div> <h4 class="text-dark mb-0" style="color: rgb(3,4,10);font-family: Bitter, serif;font-size: 16px; ">Scheme Name  :</h4> <h4 class="text-dark mb-0" style="font-family: Bitter, serif;font-size: 16px; color:#4e73df;margin-bottom: 10px;"> <?php echo $rows['Scheme_name']; ?></h4></div>
								</div>
                                </div>
								<?php
									}
								?>
                            </div>
                            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button></div>
                        </div>
                    </div>
                </div>
            </div>
			
			<?php
					$sql ="SELECT F_Name,L_Name,address,phone_no FROM aadhar WHERE aadhar =(SELECT aadhar FROM patient WHERE patient_id = '$login_session')";
					$result = mysqli_query($conn,$sql);
			
				 
			?>
			
			
			<?php
				
				 $row = mysqli_fetch_assoc($result);
				 
			 ?>
			<div>	
            <h4 class="card-title" style="font-size: 27px;color: rgb(3,4,18);"><?php echo $row['F_Name']?></h4><h4 class="card-title" style="font-size: 27px;color: rgb(3,4,18);"><?php echo $row['L_Name']?></h4></div>
            <h6 class="text-muted card-subtitle mb-2" style="font-size: 20px;"><?php echo $row['address']; ?></h6>
            <p class="card-text"><?php echo $row['phone_no']; ?></p>
			
			<?php
					$sql = "SELECT `case_id`, `patient_id`, `disease_name`, `symptoms`, `doctor_id`, `hospital`, `disease_from`,
					`disease_till`, `test_conducted`, `doctor_name`, `additional_notes` FROM `history` WHERE patient_id = '$login_session'";
					$result = mysqli_query($conn,$sql);
				?>
				
				<?php
				
				 while($rows = mysqli_fetch_assoc($result)) {
				 
				 ?>
				
            <div class="card">
                <div class="card-body shadow" style="margin: 10px;">
				<h6 class="text-muted card-subtitle mb-2" style="color: rgb(2,4,10);font-size: 20px;margin: 0px;margin-bottom: 20px;"><?php echo $rows['case_id']; ?></h6>
                    <h6 class="text-muted card-subtitle mb-2" style="color: rgb(2,4,10);font-size: 20px;margin: 0px;margin-bottom: 20px;"><?php echo $rows['disease_from']; ?></h6>
                    <div class="d-sm-flex justify-content-between align-items-center mb-4" style="width: 134;height: 31px;">
                        <h3 class="text-dark mb-0"><?php echo $rows['disease_name']; ?></h3>
                        
                    </div>
                    <h6 class="text-muted card-subtitle mb-2" style="color: rgb(2,4,10);font-size: 20px;margin: 10px;"><?php echo $rows['doctor_name']; ?></h6>
                    <h6 class="text-muted card-subtitle mb-2" style="font-size: 18px;margin: 10px;"><?php echo $rows['hospital']; ?></h6>
                    <h6 class="text-muted card-subtitle mb-2" style="font-size: 17px;margin: 10px;">Symptoms: <?php echo $rows['symptoms']; ?></h6>
					<h6 class="text-muted card-subtitle mb-2" style="font-size: 17px;margin: 10px;">Test:<?php echo $rows['test_conducted']; ?></h6>
                    <h6 class="text-muted card-subtitle mb-2" style="font-size: 17px;margin: 10px;">Notes:<?php echo $rows['additional_notes']; ?></h6>
                </div>
               
            </div>
			<?php
				 }
			?>
            <div class="d-sm-flex justify-content-between align-items-center mb-4" style="width: 134;height: 31px;margin: 20px;">
                <h3 class="text-dark mb-0"></h3>
                
				<button class="open-button" onclick="openForm()">Add</button>

				<div class="form-popup" id="myForm">
				  <form class="form-container" method="POST">
					<h1>Add</h1>
					<div>
					
					<input type="text" placeholder="Enter Disease Name" name="DName">
					<input type="text" placeholder="Enter Disease Cause" name="DCause">
					<input type="text" placeholder="Enter Symptoms" name="symptoms">
					<input type="text" placeholder="Enter Conducted Tests" name="tests">
					<input type="text" placeholder="Enter Additional Notes" name="notes">
					<input type="text" placeholder="Enter Date" name="date">

					<button type="submit" class="btn" name="submit">Save</button>
					
					<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
					</div>
				  </form>
				
				</div>
				<script>
				function openForm() {
				  document.getElementById("myForm").style.display = "block";
				}

				function closeForm() {
				  document.getElementById("myForm").style.display = "none";
				}
				</script>

			
                                
          </div>
		  
			<?php
						if( isset($_POST["submit"]))
						{    
							
							 $ID = "183";
							 $Dname = $_POST['DName'];
							 $DocName = $_POST['DCause'];
							 $Symptoms = $_POST['symptoms'];
							 $Tests = $_POST['tests'];
							// $Medicines = $_POST['medicines'];
							 $Notes = $_POST['notes'];
							 $Date = $_POST['date'];
						 
							 $sql = "INSERT INTO `history`(`case_id`, `patient_id`, `disease_name`,
							 `symptoms`, `disease_from`, `test_conducted`, `doctor_name`, `additional_notes`)
							 VALUES ('$ID','$login_session','$Dname','$Symptoms','$Date','$Tests','$DocName','$Notes')";
							 
							if ($conn->query($sql) === TRUE) {
								$ID = $ID+1;
							  echo "New record created successfully";
							} else {
							  echo "Error: " . $sql . "<br>" . $conn->error;
							}

							
							 
							 
							
						}
			?>
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