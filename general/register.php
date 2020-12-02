<?php

echo <<< "EOT"
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <script type="text/javascript" src="bulkwork/xtrainfo.js"></script>
  </head>

  <body>

    <h1>Register</h1>

      <br>

    <form class="form-style register" action="index.html" method="post">

      <label for="role">Role</label>
      <select onchange="moreinfo(role)" name="role">
        <option value=1 >Admin</option>
        <option value=2 >Doctor</option>
        <option value=3 >Supervisor</option>
        <option value=4 >Care giver</option>
        <option value=5 >Patient</option>
        <option value=6 >Family member</option>
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

        <br>

      <input id="submit" type="submit" value="Submit">

    </form>
  </body>
</html>
EOT;

?>
