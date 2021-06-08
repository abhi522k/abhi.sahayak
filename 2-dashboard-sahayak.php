<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "healthcare";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sahayak | Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Amita:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/main_styles.css">
  </head>
  <body id="page-top">
    <div id="page">
      <section>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white topbar shadow p-3 ">
          
          <div class="container">
            <a class="navbar-brand" href="#" style="font-family: 'Amita', cursive;"><h1>sahayak | </h1></a><a class="navbar-brand p-2 mb-2 d-sm-block"> Centralized Medical System</a>
            
            
            <!-- Topbar Navbar -->
            <button class="navbar-toggler " type="button" data-toggle="collapse"
            data-target="#collapsenavbar1">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse rounded-left" id="collapsenavbar1">
              
              <ul class="navbar-nav ml-auto p-2 ">
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                    <span class="mr-2 font-weight-bold text-gray-600"><?php echo $_SESSION['patient_name']; ?></span>
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="5-userpanel-sahayak.php">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                    </a>
                    <a class="dropdown-item" href="6-activitylog-sahayak.php">
                      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                      History
                    </a>
                    <a class="dropdown-item" href="1-login-sahayak.php">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </section>
      <section class="home pb-5">
        <header class="header" id="header">
          <div class="header_nav" id="header_nav_pin">
            <div class="header_nav_inner">
              <div class="header_nav_container">
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <div class="header_nav_content d-flex flex-row align-items-center justify-content-start">
                        <!--   <nav class="main_nav">
                          <ul class="d-flex flex-row align-items-center justify-content-start">
                            <li class="active"><a href="index.html">Home</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="news.html">News</a></li>
                            <li><a href="contact.html">Contact</a></li>
                          </ul>
                        </nav> -->
                        <div class="search_content d-flex flex-row align-items-center justify-content-end ml-auto">
                          <form action="search.php" method="POST" class="search_container_form">
                            <input type="text" name="search" class="search_container_input" placeholder="Search">
                            <button type="submit" name="submit-search" class="search_container_button"><i class="fa fa-search" aria-hidden="true"></i></button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>
      </section>
      
      <br>
     
      <section class="container-fluid">
        <div class="row mt-5 mb-5">
          <div class="col-lg-7 col-md-7 col-12 mx-1 ml-lg-5">
            <div class="card shadow mb-3 align-content-center">
              <div class="card-header py-3 d-flex flow-row align-items-center mb-4 justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Alerts</h5>
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle" role="button" id="dropdownmenulink" href="#"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownmenulink">
                    <a class="dropdown-item" href="#">View all news</a>
                  </div>
                </div>
              </div>
              <?php
                    $sql = "SELECT `name`, `date` FROM `alert` ORDER BY date DESC LIMIT 4 ";
                    $result = mysqli_query($conn,$sql); 
                ?>
              <?php while($rows = Mysqli_fetch_array($result)){ ?>

              <div class="card-body">
                <h4 class="flash animated infinite small font-weight-bold" style="color: rgb(239,66,54);"><?php echo $rows['name']; ?><span class="float-right"><?php echo $rows['date']; ?></span></h4>
              </div>
            
              <?php }?>

            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-12 ml-lg-4">
            <div class="row card shadow mx-auto mb-3 " style="width: 27rem;height: 10rem;">
              <img class="card-img-bottom m-auto" src="images/scheme.png" alt="Card image "style="width: 5rem; height: 5rem">
              <div class="card-body m-3">
                <h4 class="card-title text-dark font-weight-bold">Scheme</h4>
                <a href="3-scheme-sahayak.php" style="width: 120px" class="btn btn-primary">Explore</a>
              </div>
            </div>
            <div class="row card shadow mx-auto" style="width: 27rem; height: 10rem;" >
              <img class="card-img-bottom m-auto" src="images/facility.jpg" alt="Card image " style="width: 5rem;height: 5rem">
              <div class="card-body m-3">
                <h4 class="card-title text-dark font-weight-bold">Facility</h4>
                <a href="4-facility-sahayak.php" style="width: 120px" class="btn btn-primary">Explore</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      
     
  <footer id="colorlib-footer" class="bg-dark" role="contentinfo">
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    <script>
    $('.count').counterUp({
    delay:10,
    time:3000
    })
    </script>
  </body>
</html>