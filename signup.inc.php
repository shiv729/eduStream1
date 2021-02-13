<?php

if (isset($_POST["submit"]))
{
  $name=$_POST["name"];
  $email=$_POST["email"];
  $username=$_POST["uid"];
  $sub1=$_POST["sub1"];
  $sub2=$_POST["sub2"];
  $pwd=$_POST["pwd"];
  $pwdRepeat=$_POST["pwdrepeat"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat)!==false)
  {
    header("location: ../codes/signup.php?error=emptyinput");
    exit();
  }
  if (invalidUid($username)!==false)
  {
    header("location: ../codes/signup.php?error=invalidusername");
    exit();
  }
  if (invalidEmail($email)!==false)
  {
    header("location: ../codes/signup.php?error=invalidemail");
    exit();
  }
  if (pwdMatch($pwd, $pwdRepeat)!==false)
  {
    header("location: ../codes/signup.php?error=passwordmismatch");
    exit();
  }
  if (uidExists($conn, $username, $email)!==false)
  {
    header("location: ../codes/signup.php?error=emailexists");
    exit();
  }

  createUser($conn, $name, $email, $username, $pwd, $sub1, $sub2);

}
else
{
  header("location: ../codes/signup.php");
  exit();
}