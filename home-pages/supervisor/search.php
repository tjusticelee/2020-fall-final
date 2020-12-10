<?php

require_once "../../general/bulkwork/config.php";
require_once "../../general/bulkwork/auth.php";

session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employee search</title>
  </head>

  <body>
    <header>
      <a href="#">Logout</a>

      <nav class="nav">
        <a href="#">Home</a>
      </nav>
    </header>

    <main class='roster-table'>
  <h1>Employees</h1>
  <div class='employee-form-wrap'>
    <form class="search-form">
      <p>Find an employee:</p>
      <label>Id
        <input type="number" name="id">
      </label>
      <label>Name
        <input type="text" name="name">
      </label>
      <label>Role
        <input type="text" name="role">
      </label>
      <label>Salary
        <input type="number" name="salary">
      </label>
      <button type="button" id='search'>Search</button>
      <button type="button" id='reset'>Reset</button>
    </form>

    <?php






    ?>
