<?php
  include('select.php');
  if(!isset($_SESSION)){
					session_start();
				}
  $user_check=$_SESSION['login_user'];
  //$scheme_check=$_SESSION['scheme_user'];
  $ses_sql=mysqli_query($conn,"select aadhar from patient where aadhar='$user_check' ");
  $row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
  $login_session=$row['aadhar'];
  if(!isset($login_session))
  {
   header("Location: index.php");
  }
  
 
  
?>





