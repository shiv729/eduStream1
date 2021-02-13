<?php
  include_once 'header.php';
?>
<br>
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
<div>
<section>
  <div>
  <h2>Teachers Login</h2>
  <form action="..\loginincludes\teacherslogin.inc.php" method="post">
  <div>
    <input type="text" name="uid" placeholder=" Email...">
    <br>    
    <input type="password" name="pwd" placeholder=" Password...">
    <br>
    <br>
    <button type="submit" name="submit">Login</button>
    <p>Don't Have An Account? <a href="teacherssignup.php">Sign Up Here</a></p>
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
    else if($_GET["error"]=="wronglogin")
    {
      echo '<p style="color:red; font-size:20px; text-align: center">Sorry, You\'re Login Details Don\'t Match. Please Enter Them Again</p>';
    }
  }
?>
</div>

<?php
  include_once 'footer.php';
?>