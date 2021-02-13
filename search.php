<?php
  include 'header.php';
  include '../loginincludes/dbh.inc.php';
?>

<div>
  <?php
    if (isset($_POST['search']))
    {
      $search=mysqli_real_escape_string($conn, $_POST['search']);
      $sql="SELECT * FROM classes WHERE classesSubject LIKE '$search' OR classesDuration LIKE '%$search%' OR classesStart LIKE '%$search%'
            OR classesEnd LIKE '%$search%' OR classesTiming LIKE '%$search%' OR classesCost LIKE '%$search%'";
      $result=mysqli_query($conn, $sql);
      $queryResult=mysqli_num_rows($result);

      if ($queryResult>0)
      {
        echo "<h1 align='center'>Search Results:</h1>";

	if ($queryResult==1)
	{
          echo "<h3 style='text-align: center;'>There is ".$queryResult." result.</h3>";
	}
	if ($queryResult!=1)
	{
          echo "<h3 style='text-align: center;'>There are ".$queryResult." results.</h3>";
	}
        while ($row=mysqli_fetch_assoc($result))
        {
          echo "<div width='100px'>
                <h2>".$row['classesSubject']."&nbspClasses</h2>
                <h3>Class Duration: ".$row['classesDuration']." Minutes</h3>
                <p>Start Date&nbsp".$row['classesStart']."&nbsp|&nbspEnd Date:&nbsp".$row['classesEnd']."</p>
                <p>Time:&nbsp".$row['classesTiming']." | Cost: $".$row['classesCost']."</p>
                <p>Link:&nbsp".$row['classesLink']."</p>
              </div>
              <br>";
        }
      }
      else
      {
        echo "<h2 align='center'>There Are No Results</h2>";
      }
    }
  ?>
</div>

<?php
  include 'footer.php';
?>