<?php
  include('select.php');
  session_start();
  $user_check=$_SESSION['login_user'];
 
  $ses_sql=mysqli_query($conn,"select patient_id from patient where patient_id='$user_check' ");
  $row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
  $login_session=$row['patient_id'];
  if(!isset($login_session))
  {
   header("Location: index.php");
  }
  
  
?>
