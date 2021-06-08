<?php
include('select.php');
session_start();
header('location:1-login-sahayak.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<title>Login</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Amita:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@500&display=swap" rel="stylesheet">

 <!-- Custom styles for this template-->
  <link href="css/style.css" rel="stylesheet">
</head>

<body class="">

  <div class="container">
    <!-- Outer Row -->      
    <div class="row justify-content-center">

      <div class="col-lg-10 col-sm-auto">
        <div class="card o-hidden border-0 shadow-lg my-5 p-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row text-center">
              <div class="col-lg-5 d-none d-lg-block p-5">
              	<div class="text-center "><br><br><br><br>
                    <h1 class=" text-gray-900 mb-4" style=" font-family: 'Amita', cursive;">sahayak</h1><h5>Centralized Medical System</h5>
                  </div>
              </div><div class="m-auto" style="border-left: 3px solid black ;
  height: 15rem;"></div>
              
              <div class="col-lg-6">
                <div class="p-5"> 
                  <div class="imgsetting d-block m-auto"><i class="fa fa-user fa-3x mb-4"></i></div>

                 <form class="form" action="c.php" id="form" method="post"> 
                    <div class="form-group">
                      <input  id="aadharcardno" name="doctor" class="form-control" style="width: 300px;" autocomplete="off" placeholder="Enter Doctor id...">
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Invalid Aadhar no</small>
                    </div>
                    
                    <div class="form-group">
                      <input type="Password" name="password" class="form-control" style="width: 300px;" id="otp" placeholder="OTP" autocomplete="off">
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Invalid OTP</small>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-user ">Submit</button>
                    <hr>
                  </form>
					<?php
						
						if( isset($_POST["submit"]))
						{ 
							$id = $_POST['user'];
							$pass = $_POST['password'];

							$q = "select name from doctor where doctor_id = '$id' && password = '$pass' ";

							$result = mysqli_query($conn, $q);
							$data=mysqli_fetch_array($result);
							$arr=$data['name'];
							$num = mysqli_num_rows($result);

							if($num == 1){
								$_SESSION['doctor_name'] = $arr;
								header('location:index.php');
							}
							else
							{

									header('location:1-login-sahayak.php');
							}
						}
					?>
                  <div class="text-center">
                    <a class="small" href="8-doctorlogin-sahayak.html">Login as User</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 <!--  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript">
    const form = document.getElementById('form');      
    const aadharcardno = document.getElementById('aadharcardno');
    const otp = document.getElementById('otp');
    
    //add event
      form.addEventListener('submit', (event) => {
          event.preventDefault();
          validate();
          
      })
      
      const validate = () => {     
          const aadharcardnoval = aadharcardno.value.trim();
          const otpval = otp.value.trim();
          var count = 0 ;
          //validate username
          if(aadharcardnoval == "") {
            setErrorMsg(aadharcardno, 'No cannot be blank');
          } else if (aadharcardnoval.length <= 11) {
            setErrorMsg(aadharcardno, 'No min 12 char');            
          } else {
            setSuccessMsg(aadharcardno);
            count = count + 1;
          }

          //validate otp
          if(otpval == "") {
            setErrorMsg(otp, 'Otp cannot be blank');
          } else if (otpval.length <= 5) {
            setErrorMsg(otp, 'Otp min 5 char');            
          } else {
            setSuccessMsg(otp);
            count = count + 1;
          }
         //successMsg();
         validated(count);
      }

      const validated = (count) => {
        if(count == 2) {
           location.href = 'c.php'
            alert('registration Successfull');
//     swal("Good job!", "Registration Successfull", "success");
//             setTimeout(function () { 
//     $("#jsSegurosProductos").jsGrid("refresh"); 
// }, 100);
           // location.href = '2-dashboard-sahayak.php'
        }
      }

      function setErrorMsg(input, errormsgs){
        const formGroup = input.parentElement;
        const small = formGroup.querySelector('small');
        formGroup.className = "form-group error";
        small.innerText = errormsgs;
      }

      function setSuccessMsg(input){
        const formGroup = input.parentElement;
        formGroup.className = "form-group success";
      }
  </script>
 -->

</body>
</html>