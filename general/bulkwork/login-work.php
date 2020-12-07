<?php

require_once "config.php";
require_once "auth.php";
//connects to database
session_start();
$_SESSION = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $email = $_POST['email'];
  //takes email value from input name email in login.php

    foreach($_POST as $name => $value){
      if(empty(trim($value))){
        echo $name;
    //checks for empty variables by taking the name value in login form and checking
    //to see if it's empty.
        $_SESSION["error"] = "<p> Please enter: <p>". $name;
        header("Location:../login.php");
        //error message if fields are left empty.
      }
    }

  if($stmt = $link->prepare('SELECT user_id, password, firstName, lastName, role_id
                            FROM users
                            WHERE email = ?')) {
  //prepares SQL statement preventing SQL injections
      $stmt->bind_param('s', $email);
      //'s' delcares what data type it is. binds $email to $stmt as parameters
      $stmt->execute();
      //executes query
      $stmt->store_result();
      //stores results of email for future use.

      if($stmt->num_rows > 0) {
      //if statement check if account exist, then verifies the password
        $stmt->bind_result($user_id, $password, $firstName, $lastName, $role_id);
        $stmt->fetch();

        if($_POST['password1'] == $password) {
          session_regenerate_id();
          $_SESSION['loggedin'] = TRUE;
          $_SESSION['user_id'] = $user_id;
          $_SESSION['firstName'] = $firstName;
          $_SESSION['lastName'] = $lastName;
          echo $role_id;
        }else{
          $_SESSION["error"] = "email or password incorrect";
          header("Location:../login.php");
          exit;

          }
        //else{
          //$_SESSION["error"] = "email or password incorrect";
          //header("Location:../login.php");
          //exit;
        //}

        $stmt->close();

      }
      }

      if(isset($_SESSION['loggedin'])){
        role_redirect($role_id);
      }

  }

function role_redirect($role_id){
  if($role_id == 1){
    header('Location:../../home-pages/admin-pages/homepage.php');
    exit;
  }

  if($role_id == 2){
    //header('Location:');
    //exit;
  }

  if($role_id == 3){
    //header('Location:');
    //exit;
  }

  if($role_id == 4){
    //header('Location:');
    //exit;
  }

  if($role_id == 5){
    //header('Location:');
    //exit;
  }

  if($role_id == 6){
    //header('Location:');
    //exit;
  }
}

?>
