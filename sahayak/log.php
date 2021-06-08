<?php
include('select.php');
header('location:loginDoctor.php');
							$d_id = $_POST['doctor'];
							$pass = $_POST['password'];

							$q = "select name from doctor where doctor_id = '$d_id' && password = '$pass' ";

							$result = mysqli_query($conn, $q);
							$data=mysqli_fetch_array($result);
							$arr=$data['name'];
							$num = mysqli_num_rows($result);

							if($num == 1){
								$_SESSION['doctor_name'] = $arr;
								$doc_name= $_SESSION['doctor_name'];
								header('location:index.php');
								echo '<script>alert("Welcome ")</script>';
							}
							if($num==0){
								echo '<script>alert("Invalid ID and Password!")</script>';
								header('location:loginDoctor.php');

							}

?>