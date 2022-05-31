<?php

include '../Footer/Header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="form.css" />
  <link rel="stylesheet" href="../Footer/header.css">
</head>

<body>
  <div class="form-wrapper">
    <form action="formsQuery.php" method="post">
      <div>
        <div class="form-content">
          <p>User Name</p>
          <input type="text" id="username" name="username" required autofocus />
        </div>
        <div class="form-content">
          <p>Password</p>
          <input type="passowrd" id="password" name="password" required />
        </div>
        <div class="form-content">
          <p>Email</p>
          <input type="text" id="email" name="email" required />
        </div>
        <div class="form-content">
          <p>First Name</p>
          <input type="text" id="firstname" name="firstname" required />
        </div>
        <div class="form-content">
          <p>Last Name</p>
          <input type="text" id="lastname" name="lastname" required />
        </div>
      </div>
      <div>
        <div class="form-content">
          <p>Phone No</p>
          <input type="text" id="phoneno" name="phoneno" required />
        </div>
        <div class="form-content">
          <p>Address</p>
          <input type="text" id="address" name="address" required />
        </div>
        <div class="form-content">
          <p>Birthday</p>
          <input type="date" id="birthday" name="birthday" required />
        </div>
        <div class="form-content">
          <p>Department</p>
          <input type="text" id="department" name="department" required />
        </div>
        <!-- <div class="form-content">
            <p>Course</p>
            <input type="text" id="course" name="course" required />
          </div>
          <div class="form-content">
            <p>Course</p>
            <input type="text" id="course" name="course" required />
          </div> -->
        <div class="form-content-submit">
          <input type="submit" name="student-register" value="Register" />
        </div>
      </div>
    </form>
  </div>
</body>

</html>