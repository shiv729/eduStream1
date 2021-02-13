<?php
  include 'header.php';
  include '..\loginincludes\dbh.inc.php';
?> 

<h1 align="center">All Classes:</h1>

<div>
  <?php
    $sql="SELECT * FROM classes";
    $result=mysqli_query($conn, $sql);
    $queryResults=mysqli_num_rows($result);

    if ($queryResults>0)
    {
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
  ?>
</div>

<?php
  include 'footer.php';
?>