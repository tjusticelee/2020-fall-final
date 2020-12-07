<?php
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
//takes form data from register.php and processes it

  $role = $_POST['role'];
  $fname = $_POST['first_name'];
  $lname = $_POST['last_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone_num'];
  $dob = $_POST['DOB'];
  $pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
  //data from register.php put into variables

  foreach($_POST as $name => $value){
    if(empty(trim($value))){
      session_start();
      $_SESSION["error"] = "<p> enter missing field: </p>". $name;
      exit;
    }
  }
}

$stmt = mysqli_prepare($link, "INSERT INTO users(`role_id`, `firstName`, `lastName`, `email`,
                              `phone`, `DOB`, `password`, `confirmed`) VALUES(?,?,?,?,?,?,?, NULL)");
mysqli_stmt_bind_param($stmt, 'issssss', $role, $fname, $lname, $email, $phone, $dob, $pw);
mysqli_stmt_execute($stmt);
//sql statement and execution to store "post" data into DATABASE

if(mysqli_stmt_error($stmt)){
//if statement to check for errors for database insert statement
  session_start();
  $_SESSION["error"] = errno(mysqli_stmt_errno($stmt));
  header("Location:../register.php");
  exit;
//will throw error and take you back to register if failed
}else{
  header("Location:../register.php");
}

mysqli_stmt_close($stmt);

$employees = array(1, 2, 3, 4);
//stores roles of employees in an array

$stmt = mysqli_prepare($link, "SELECT user_id FROM users WHERE email = ?");
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
mysqli_stmt_bind_result($stmt, $user);
mysqli_stmt_fetch($stmt);
$user_id = $user;
mysqli_stmt_close($stmt);

if($role == 5){
// if statement for if the role is patient
$stmt = mysqli_prepare($link, "INSERT INTO patients (`patient_id, family_code`,
                              `emergency_contact`, `relation_to_ec`, `group_id`) VALUES(?,?,?,?,1)");
mysqli_stmt_bind_param($stmt, 'iiss', $user_id, $_POST['familycode'], $_POST['emer_contact'], $_POST['relation']);
msqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
}elseif (inarray($role, $employees)){
  $stmt = mysqli_prepare($link, "INSERT INTO employees (`employee_id`, `salary`, `group_id`) VALUES(?, null, 1)");
  mysqli_stmt_bind_param($stmt, 'i', $user_id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  //elseif satement inserts data into employees table with user id
}

function errno($no){
  if($no == 1062){
    return "<p> email already in use. </p>";
  }else{
    echo "dis broke";
  }
}

mysqli_close($link);

?>
