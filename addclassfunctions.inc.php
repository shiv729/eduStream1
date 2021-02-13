<?php

function emptyInput($sub, $duration, $start, $end, $sched, $cost, $link)
{
  $result;
  if (empty($sub)||empty($duration)||empty($start)||empty($end)||empty($sched)||empty($cost)||empty($link))
  {
    $result=true;
  }
  else
  {
    $result=false;
  }
  return $result;
}

function generateRandomKey()
{
  include 'dbh.inc.php';
  $randomKey="";
  $randomList=array("A","H","I","P","Q","X","Y","f","g","n","o","v","w","3","4",")",
                  "B","G","J","O","R","W","Z","e","h","m","p","u","x","2","5","(",
                  "C","F","K","N","S","V","a","d","i","l","q","t","y","1","6","9",
                  "D","E","L","M","T","U","b","c","j","k","r","s","z","0","7","8",);
  for ($i=0; $i<=8; $i=$i+1)
  {
    $rand=mt_rand(0,63);
    $randomKey=$randomKey.$randomList[$rand];
  }
  $sql="SELECT * FROM classes WHERE classesKey='".$randomKey."';";
  $result=mysqli_query($conn, $sql);
  $queryResults=mysqli_num_rows($result);
  if ($queryResults>0)
  {
    $randomKey=generateRandomKey();
    return $randomKey;
  }
  else
  {
    return $randomKey;
    exit();
  }
}


function createClass($conn, $sub, $duration, $start, $end, $sched, $cost, $rk, $email, $link)
{
  $sql="INSERT INTO classes (classesSubject, classesDuration, classesStart, classesEnd, classesTiming, classesCost, classesKey, teacherEmail, classesLink) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    header("location: ../codes/addClass.php?error=usercreationfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sisssisss", $sub, $duration, $start, $end, $sched, $cost, $rk, $email, $link);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../codes/addClass.php?error=none");
  
  exit();
}