	<?php
  session_start();
?>

<style>

ol	{list-style-type: none;}

a	{text-decoration: none;
	 margin: 10px;}

button {
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border: 2px solid #E65F42;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

button:hover {
  background-color: #E65F42;
  color: white;
}

img	{height:75px;}

</style>

<!doctype html>
<html lang="en">
  <head>
<link rel="shortcut icon" type="image/ico" href="..\images\EduStream.ico"/>
    <meta charset="utf-8">
    <title>EduStream</title>
  </head>
  <body bgcolor="#eeeeee">
<img src="..\images\EDUSTREAM.png" alt="EduStream Logo">
    <h1 style="font-family:verdana">EduStream</h1>
    <ol>
      <?php
        if(isset($_SESSION["useruid"]))
        {
          echo "<button><a href='../loginincludes/logout.inc.php'>Logout</a></button>";
          if (isset($_SESSION["userType"]))
          {
            if ($_SESSION["userType"]==="Teacher")
            {
              echo '<button><a href="addClass.php">Create New Class</a></button>';
	      echo '<button><a href="https://addstreampage.shivanidogipart.repl.co/">Create Survey</a></button>';
            }
            if ($_SESSION["userType"]==="Student")
            {
              echo '<button><a href="allclasses.php">Browse Classes</a></button>';
              echo '<form action="search.php" method="POST">
                <input id="searchbar" style="width: 300px;" type="text" name="search" placeholder="Search For Classes By Subject, Date, Etc...">
                <button id="searchbutton" type="submit" name="submit-search">Search</button>
              </form>';
            }
          }
        }
        else
	{
          echo '<button><a href="signup.php">Sign Up As Student</a></button>';
          echo '<button><a href="teacherssignup.php">Sign Up As Teacher</a></button>';
	  echo '<button><a href="login.php">Login As Student</a></button>';
          echo '<button><a href="teacherslogin.php">Login As Teacher</a></button>';
        }
       ?>
     </ol>

<style>
		.dropbtn {
			background-color: #E65F42;
			color: white;
			padding: 16px;
			font-size: 16px;
			border: none;
			cursor: pointer;
		}

		.dropbtn:hover,
		.dropbtn:focus {
			background-color: #E65F42;
		}

		.dropdown {
			float: right;
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f1f1f1;
			min-width: 160px;
			overflow: auto;
			box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
			right: 0;
			z-index: 1;
		}

		.dropdown-content a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
		}

		.dropdown a:hover {
			background-color: #ddd;
		}

		.show {
			display: block;
		}
	</style>
</head>

<body>

	<div class="dropdown">
		<button onclick="myFunction()" class="dropbtn"> Subject Menu </button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#Math">Math</a>
    <a href="#English literature">English</a>
    <a href="#Chemistry">Chemistry</a>
    <a href="#Biology">Biology</a>
    <a href="#Physics">Physics</a>
    <a href="#history">History</a>
    <a href="#geo">Geography</a>
    <a href="#francais">French</a>
    <a href="#spanish">Spanish</a>
    <a href="#german">German</a>
    <a href="#hindi">Hindi</a>
    <a href="#francais">Kannada</a>
    <a href="#">Art and Design</a>
    <a href="#">Business Studies</a>
    <a href="#">Economics</a>
  </div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
