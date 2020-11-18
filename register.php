<?php
echo <<< "EOT"
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
  </head>

  <body>

    <h1>Register</h1>
      <br>
    <form class="" action="index.html" method="post">
      <label for="role">Role</label>
      <select name="oper" id="oper">
        <option value="admin">Admin</option>
        <option value="doctor">Doctor</option>
        <option value="supervisor">Supervisor</option>
        <option value="caregiver">Care giver</option>
        <option value="patient">Patient</option>
        <option value="familymem">Family member</option>
      </select>
        <br>
      <label for="first_name">First Name:</label>
      <input type="text" name="first_name" value="">
        <br>
      <label for="last_name">Last Name:</label>
      <input type="text" name="last_name" value="">
        <br>
      <label for="email">email:</label>
      <input type="text" name="email" value="">
        <br>
      <label for="phone_num">Phone Number:</label>
      <input type="text" name="phone_num" value="">
        <br>
      <label for="DOB">Date of Birth:</label>
      <input type="date" name="DOB" value="">
        <br>
      <label for="password">Password:</label>
      <input type="text" name="password" value="">
        <br>
      <label for="vpassword">Verify password:</label>
      <input type="text" name="password1" value="">

      <input id="submit" type="submit" value="Submit">
    </form>
  </body>
</html>
EOT;

session_start();
?>
