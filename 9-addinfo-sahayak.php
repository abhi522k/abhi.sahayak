<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>User</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Amita:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@500&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    
    <!-- Page Wrapper -->
    <div id="wrapper">
      
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion font-weight-bold" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">User</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="2-dashboard-sahayak.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
          </li>
          <!-- Divider -->
          <hr class="sidebar-divider">
          
           <li class="nav-item">
        <a class="nav-link" href="5-userpanel-sahayak.php">
          <i class="fas fa-fw fa-id-card"></i>
          <span>Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="6-activitylog-sahayak.php">
          <i class="fas fa-fw fa-file-medical"></i>
          <span>History</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="3-scheme-sahayak.php">
          <i class="fas fa-fw fa-calendar-plus"></i>
          <span>Scheme</span>
        </a>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="4-facility-sahayak.php">
          <i class="fas fa-fw fa-hospital"></i>
          <span>Facility</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="1-login-sahayak.php">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>

        </ul>
        <!-- End of Sidebar -->
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
          <!-- Main Content -->
          <div id="content">
            
            <section>
              <!-- Navbar -->
              <nav class="navbar navbar-expand-md flex-row navbar-light bg-white topbar shadow border-dark p-5">
                
                <div class="container">
                  <a class="navbar-brand" href="#" style=" margin: 0; padding: 0; font-family: 'Amita', cursive;"><h1>sahayak | </h1></a><a class="navbar-brand p-2"> Centralized Medical System</a>
                  
                  <!-- Topbar Navbar -->
                  <button class="navbar-toggler" type="button" data-toggle="collapse"
                  data-target="#collapsenavbar1">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="collapsenavbar1">
                    
                    <ul class="navbar-nav ml-auto p-2 ">
                <!-- Nav item Alerts -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                    <span class="mr-2 font-weight-bold text-gray-600"><?php echo $_SESSION['patient_name']; ?></span>
                    </a>
                </li>
                </ul>
                  </div>
               </div>
              </nav>
            </section>

<?php
  $con = mysqli_connect('localhost','root','');

  mysqli_select_db($con, 'healthcare');

    $id1 = $_SESSION['patient_name'];

      if(isset($_POST['submit'])){

          $income_certifi = $_POST['income_certi'];
          $rationcard = $_POST['ration_card'];
          $utara = $_POST['utara'];
          $healthcard = $_POST['health_card'];
          $pancard = $_POST['pan_card'];
          $preg = $_POST['pregnant'];
          $opd1 = $_POST['opd'];
          $urbanarea = $_POST['Urban'];
          $votercard = $_POST['voter'];
          $ruralarea = $_POST['rural'];

          $sql = "UPDATE aadhar SET income_certificate='$income_certifi', ration_card = '$rationcard', satbara_utara = '$utara', health_card = '$healthcard', pan_card = '$pancard', pregnant = '$preg', user_need_operation = '$opd1', urban_area = '$urbanarea', voter_id_card = '$votercard', rural_area = '$ruralarea' WHERE F_name LIKE '$id1'";
          mysqli_query($con,$sql);
      }
?>
        <section>
          
          <div class="container-fluid m-5">
           
              <form method="POST" >
                 <div class="row justify-content-center justify-content-around">

                <div class="">
                  <div class="m-3 col-auto">
                    <label>Income Certificate :</label>
                    <select id="dropdown" name="income_certi" required>
                      <option disabled selected value>Select Option</option>
                      <option value="yes">Upto 4 Lack</option>
                      <option value="no">Above 4 Lack</option>
                    </select>
                  </div>
                  
                  <div class="col-auto m-3">
                    <label>Ration Card :</label>
                    <select id="dropdown" name="ration_card" required>
                      <option disabled selected value>Select Option</option>
                      <option value="yes">Yellow or Orange Ration Card</option>
                      <option value="no">Not available</option>
                    </select>
                  </div>
                  
                  <div class="col-auto m-3">
                    <label>7/12 Utara :</label>
                    <select id="dropdown" name="utara" required>
                      <option disabled selected value>Select Option</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                  
                  <div class="col-auto m-3">
                    <label>Health Card :</label>
                    <select id="dropdown" name="health_card" required>
                      <option disabled selected value>Select Option</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                  
                  <div class="col-auto m-3">
                    <label>Pan Card :</label>
                    <select id="dropdown" name="pan_card" required>
                      <option disabled selected value>Select Option</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                </div>

                <div class="">
                  <div class="m-3 col-auto">
                    <label>Pregnant :</label>
                    <select id="dropdown" name="pregnant" required>
                      <option disabled selected value>Select Option</option>
                      <option value="yes">Upto 4 Lack</option>
                      <option value="no">Above 4 Lack</option>
                    </select>
                  </div>
                 
                  
                  <div class="m-3 col-auto">
                    <label>User need Operation :</label>
                    <select id="dropdown" name="opd" required>
                      <option disabled selected value>Select Option</option>
                      <option value="yes">Yellow or Orange Ration Card</option>
                      <option value="no">Not available</option>
                    </select>
                  </div>
                  
                  
                  <div class="m-3 col-auto">
                    <label>Urban area :</label>
                    <select id="dropdown" name="Urban" required>
                      <option disabled selected value>Select Option</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                  
                  
                  <div class="m-3 col-auto">
                     <label>Voter Id Card :</label>
                    <select id="dropdown" name="voter" required>
                      <option disabled selected value>Select Option</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                  </div>

                 
                  <div class="m-3 col-auto">
                    <label>Rural Area :</label>
                    <select id="dropdown" name="rural" required>
                      <option disabled selected value>Select Option</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                  </div>
                  
                </div>
                </div>
                <div class="text-center mt-5">
                  <button type="submit" name="submit" class="btn btn-primary btn-user">Submit</button>
                </div>
            </form>
            
          </div>
        </section>

          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </body>
  </html>