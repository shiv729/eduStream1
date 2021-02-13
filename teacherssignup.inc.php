<?php

if (isset($_POST["submit"]))
{
  $name=$_POST["name"];
  $email=$_POST["email"];
  $sub1=$_POST["sub1"];
  $sub2=$_POST["sub2"];
  $pwd=$_POST["pwd"];
  $pwdRepeat=$_POST["pwdrepeat"];

  require_once 'dbh.inc.php';
  require_once 'teachersfunctions.inc.php';

  if (pwdMatch($pwd, $pwdRepeat)!==false)
  {
    header("location: ../codes/teacherssignup.php?error=passwordmismatch");
    exit();
  }


  createUser($conn, $name, $email, $sub1, $sub2, $pwd);

}
else
{
  header("location: ../codes/teacherssignup.php");
  exit();
}