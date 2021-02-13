<?php
  include_once 'header.php';
?>
<style>
div {border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;}

input[type="text"], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type="password"], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type="submit"] {
  width: 100%;
  background-color: #E65F42;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #CB5A42;
}
</style>
<br>
<div>
<section class="signup-form">
  <div>
  <h2>Sign Up</h2>
  <form action="..\loginincludes\signup.inc.php" method="post">
  <div>
    <input type="text" name="name" placeholder=" Full Name...">
    <br>    
    <input type="text" name="email" placeholder=" Email...">
    <br>    
    <input type="text" name="uid" placeholder=" Username...">
    <br>  
    <input type="text" name="sub1" placeholder=" Enter Subject Preference 1 (Refer To Subject Menu)...">
    <br>    
    <input type="text" name="sub2" placeholder=" Enter Subject Preference 2 (Refer To Subject Menu)...">
    <br>    
    <input type="password" name="pwd" placeholder=" Password...">
    <br>    
    <input type="password" name="pwdrepeat" placeholder=" Repeat Password...">
    <br>
    <br>
    <button type="submit" name="submit">Sign Up</button>
    <p>Already Have An Account? <a href="login.php">Login Here</a></p>
  </div>
  </form>
  </div>
</section>

<?php
  if(isset($_GET["error"]))
  {
    if($_GET["error"]=="emptyinput")
    {
      echo '<p style="color:red; font-size:20px; text-align: center">Fill In All Fields!</p>';
    }
    else if($_GET["error"]=="invalidusername")
    {
      echo '<p style="color:red; font-size:20px; text-align: center">Invalid Username</p>';
    }
    else if($_GET["error"]=="invalidemail")
    {
      echo '<p style="color:red; font-size:20px; text-align: center">Input A Proper Email</p>';
    }
    else if($_GET["error"]=="passwordmismatch")
    {
      echo '<p style="color:red; font-size:20px; text-align: center">The Passwords Don\'t Match: Please Type Them In Again</p>';
    }
    else if($_GET["error"]=="emailexists")
    {
      echo '<p style="color:red; font-size:20px; text-align: center">An Account With This Username/Email Already Exists</p>';
    }
    else if($_GET["error"]=="usercreationfailed")
    {
      echo '<p style="color:red; font-size:20px; text-align: center">Sorry, Something Went Wrong: Please Try Again/p>';
    }
    else if($_GET["error"]=="stmtfailed")
    {
      echo '<p style="color:red; font-size:20px; text-align: center">Sorry, Something Went Wrong: Please Try Again</p>';
    }
    else if($_GET["error"]=="none")
    {
     header("location: ../codes/login.php");
    }
  }

echo "</div>";


  include_once 'footer.php';
?>