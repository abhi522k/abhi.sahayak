<?php
	include('select.php');
	//include('sessio.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sahayak</title>
    <link rel="stylesheet" href="New folder/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter">
    <link rel="stylesheet" href="New folder/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="New folder/assets/css/Icon-Button.css">
    <link rel="stylesheet" href="New folder/assets/css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="height: 85px;">
        <div class="container"><a class="navbar-brand logo" href="AddPatient.php" style="font-family: Bitter, serif;">Add Patient</a>
            <div style="width: 30px;height: 30px;"></div>
            <div class="clean-block add-on newsletter-sign-up" style="height: 50px;">
                </div></div>
    </nav>
	
    <main class="page contact-us-page">
	<div class="card shadow ml-5 mr-5 mt-3">
        <section class="clean-block clean-form dark">
		
			
            <div class="container">
                
                <form method = "POST"><label class="text-right text-primary">Medical Details</label>
                    <div class="form-group"><label>&nbsp;please enter your adhhar ID</label><input class="form-control" type="text" name="aadharID"><label>&nbsp;Disease Name</label><input class="form-control" type="text" name="DName"></div>
                    <div class="form-group"><label>Doctor Name</label><input class="form-control" type="text" name="DocName"></div>
                    <div class="form-group"><label>Symptoms</label><input class="form-control" type="text" name="symptoms"></div>
                    <div class="form-group"><label>Conducted Tests</label><input class="form-control" type="text" name="tests"></div>
                    <div class="form-group"><label>Medicines</label><input class="form-control" type="text" name="medicines"></div>
                    <div class="form-group"><label>Additional Notes</label><textarea class="form-control" name="notes"></textarea></div>
					<label>Date</label><input class="form-control" type="date" style="margin-bottom: 8px;" name="date">
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit">Send</button></div>
                </form>
            </div>
			
			
			<?php
						if( isset($_POST['submit']))
						{    
							
							 $ID = "190";
							 $aadhar_id=$_POST['aadharID'];
							 $Dname = $_POST['DName'];
							 $DocName = $_POST['DocName'];
							 $Symptoms = $_POST['symptoms'];
							 $Tests = $_POST['tests'];
							 $Medicines = $_POST['medicines'];
							 $Notes = $_POST['notes'];
							 $Date = $_POST['date'];
						 
							 $sql = "INSERT INTO `history`(`case_id`, `patient_id`, `disease_name`,
							 `symptoms`, `disease_from`, `test_conducted`, `doctor_name`, `additional_notes`)
							 VALUES ('$ID','$aadhar_id','$Dname','$Symptoms','$Date','$Tests','$DocName','$Notes')";
							 
							if ($conn->query($sql) === TRUE) {
								$ID = $ID+1;
							  echo "New record created successfully";
							} else {
							  echo "Error: " . $sql . "<br>" . $conn->error;
							}
							 
							 
							 
							
						}
			?>
        </section>
	</div>
    </main>
    <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Centralized Medical System</span></div>
                </div>
            </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>