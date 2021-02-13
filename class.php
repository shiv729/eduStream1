<?php
  include 'header.php';
  include '../loginincludes/dbh.inc.php';
?>

<div>
  <?php
    if (isset($_GET['search']))
    {
      $randomKey=mysqli_real_escape_string($conn, $_GET['search']);
      $sql="SELECT * FROM classes WHERE classesKey='$randomKey'";
      $result=mysqli_query($conn, $sql);
      $queryResult=mysqli_num_rows($result);
      while ($row=mysqli_fetch_assoc($result))
      {
        echo "<div>
                <h2>".$row['classesId']."</h2>
                <h3>By: ".$row['classesSubject']."</h3>
/*                <p>".$row['blogDate']."&nbsp|&nbsp".$row['blogViews']." Views</p>
                <p>".$row['blogDescription']."</p>
                <hr>
                <p>".$row['blogBody']."</p>
 */             </div>";
      }
    }
    else
    {
      header("location: blogpage.php");
    }
  ?>
</div>
<br>
<?php
  include 'footer.php';
?>