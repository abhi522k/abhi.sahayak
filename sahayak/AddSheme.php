<?php
include('select.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>admin panel</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Testimonials.css">
	
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
</head>

<body>
    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
            <h1>Sahayak</h1>
        </div>
    </nav>
    <div class="testimonials-clean"></div>
	<form  class="form-container" method ="POST">
    <div class="contact-clean">
        <h1 style="font-family: Abel, sans-serif;margin: 20px;">Add Scheme</h1>
        <div class="card" style="margin: 20px;">
            <div class="card-body" style="padding: 70px;"><input class="border rounded border-secondary shadow" type="text" name="id" placeholder="Scheme Id" style="width: 100px;margin: 11px;margin-bottom: 9px;padding: 10px;">
			<input class="border rounded border-secondary shadow" type="text" name="sname"
                    placeholder="Scheme Name" style="width: 800px;margin: 11px;margin-bottom: 9px;padding: 10px;"><input class="border rounded border-secondary shadow" type="text" name="dname" placeholder="Department Name" style="width: 800px;margin: 11px;margin-bottom: 9px;padding: 10px;">
                <h1
                    style="font-size: 20px;margin-left: 10px;">Scheme Description:</h1><textarea style="width: 800px;margin: 10px;margin-bottom: 5px;padding: 10px;" name="description"></textarea>
                    <h1 style="font-size: 20px;margin-left: 10px;">Scheme Benificiaries:</h1><textarea style="width: 800px;margin: 10px;margin-bottom: 5px;padding: 10px;" name="benifiaries"></textarea>
                    <h1 style="font-size: 20px;margin-left: 10px;">Scheme Benifits:</h1><textarea style="width: 800px;margin: 10px;margin-bottom: 5px;padding: 10px;" name="benifits"></textarea>
                    <h1 style="font-size: 20px;margin-left: 10px;">Documents Required:</h1>
                    <h1 style="font-size: 20px;margin-left: 10px;">Ration Card:<input type="text" style="margin-left: 20px;" name="ration"></h1>
                    <h1 style="font-size: 20px;margin-left: 10px;">Health Card:<input type="text" style="margin-left: 20px;" name="health"></h1>
                    <h1 style="font-size: 20px;margin-left: 10px;">Income Certificate:<input type="text" style="margin-left: 20px;" name="income"></h1>
                    <h1 style="font-size: 20px;margin-left: 10px;">Pregnency Details:<input type="text" style="margin-left: 20px;" name="preg"></h1>
					<input class="border rounded border-secondary shadow" type="text" name="link" placeholder="Link" style="width: 800px;margin: 11px;margin-bottom: 9px;padding: 10px;">
                    <button type="submit" class="btn" name="save" style="margin: 20px;width: 100px;">Save</button>
                        
            </div>
        </div>
    </div>
	</form>
    <div class="contact-clean"></div>
	<?php
						if( isset($_POST["save"]))
						{    
							
							
							 $index = $_POST['id'];
							 $name = $_POST['sname'];
							 $dname = $_POST['dname'];
							 $des = $_POST['description'];
							 $benifiaries = $_POST['benifiaries'];
							 $benifits = $_POST['benifits'];
							 $ration = $_POST['ration'];
							 $health = $_POST['health'];
						//	 $utara = $_POST['utara'];
							 $income = $_POST['income'];
							 $preg = $_POST['preg'];
						     $link = $_POST['link'];
							 
							 $sql = "INSERT INTO `scheme_table`(`index`, `scheme_name`, `scheme_description`, `scheme_beneficiarias`,
							 `scheme_benefits`, `ration_card`, `health_card`, `income_certificate`, `pregnant`, `link`, `department`) VALUES 
							 ('$index','$name','$des','$benifiaries','$benifits','$ration','$health','$income','$preg','$link','$dname')";
							 
							if ($conn->query($sql) === TRUE) {
								//$ID = $ID+1;
							  echo "New record created successfully";
							} else {
							  echo "Error: " . $sql . "<br>" . $conn->error;
							}

							
							 
							 
							
						}
			?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>