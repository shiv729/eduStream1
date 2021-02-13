<?php
session_start();

if (isset($_POST["newclass"]))
{
  $sub=$_POST["sub"];
  $duration=$_POST["duration"];
  $start=$_POST["start"];
  $end=$_POST["end"];
  $sched=$_POST["sched"];
  $cost=$_POST["cost"];
  $link=$_POST["link"];
  $email=$_SESSION["teacherEmail"];

  require_once 'dbh.inc.php';
  require_once 'addclassfunctions.inc.php';

  $rk=generateRandomKey();

  if (emptyInput($sub, $duration, $start, $end, $sched, $cost, $link)!==false)
  {
    header("location: ../codes/addClass.php?error=emptyinput");
    exit();
  }

  createClass($conn, $sub, $duration, $start, $end, $sched, $cost, $rk, $email, $link);

}
else
{
  header("location: ../codes/signup.php");
  exit();
}