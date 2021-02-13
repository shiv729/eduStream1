<?php

function pwdMatch($pwd, $pwdRepeat)
{
  $result;
  if ($pwd!==$pwdRepeat)
  {
    $result=true;
  }
  else
  {
    $result=false;
  }
  return $result;
}

function uidExists($conn, $email)
{
  $sql="SELECT * FROM teachers WHERE teachersEmail = ?;";
  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    header("location: ../codes/teacherssignup.php?error=stmtfailed");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  $resultData=mysqli_stmt_get_result($stmt);

  if ($row=mysqli_fetch_assoc($resultData))
  {
    return $row;
  }																
  else
  {		
    $result=false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $sub1, $sub2, $pwd)
{
  $sql="INSERT INTO teachers (teachersName, teachersEmail, teachersSub1, teachersSub2, teachersPwd) VALUES (?, ?, ?, ?, ?);";
  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    header("location: ../codes/teacherssignup.php?error=usercreationfailed");
    exit();
  }

  $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $sub1, $sub2, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../codes/teacherssignup.php?error=none");
  
  exit();
}

function loginUser($conn, $username, $pwd)
{
  $uidExists=uidExists($conn, $username, $username);

  if($uidExists===false)
  {
    header("location: ../codes/login.php?error=wronglogin");
    exit();
  }

  $pwdHashed=$uidExists["teachersPwd"];
  $checkPwd=password_verify($pwd, $pwdHashed);

  if($checkPwd===false)
  {
    header("location: ../codes/login.php?error=wronglogin");
    exit();
  }
  else if($checkPwd===true)
  {
    session_start();
    $_SESSION["userid"]=$uidExists["teachersId"];
    $_SESSION["useruid"]=$uidExists["teachersName"];
    $_SESSION["teacherEmail"]=$uidExists["teachersEmail"];
    $_SESSION["userType"]="Teacher";
    header("location: ../codes/index.php");
    exit();
  }
}