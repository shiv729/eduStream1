<!doctype html>
<html lang="en">
  <head>
    <?php
      $qNum=0;
      $survey="";
    ?>
    <meta charset="utf-8">
    <title>Survey Maker</title>
  </head>

  <body>
    <div>
      <form method="post">
        <button type="submit" name="showSurvey">Show Survey</button>
        <button type="submit" name="startSurvey">Start Survey</button>
        <button type="submit" name="endSurvey">End Survey</button>
        <button type="submit" name="newQuestion">New Question</button>
        <button type="submit" name="endQuestion">End Question</button>
        <button  type="submit" name="textBox">Text Box</button>
      </form>
    </div>

    <?php
      if (isset($_POST['showSurvey']))
      {
        echo "<h1>The Survey So Far:</h1>";
        echo "$survey";
      }

      if (isset($_POST['startSurvey']))
      {
        $survey=$survey."<section><form method='post'>";
      }

      if (isset($_POST['endSurvey']))
      {
        $survey=$survey."</form></section>";
      }

      if (isset($_POST['newQuestion']))
      {
        $qNum=$qNum+1;
        $survey=$survey."<div><h2>Question&nbsp".$qNum."";
      }

      if (isset($_POST['endQuestion']))
      {
        $survey=$survey."</div>";
      }

      if (isset($_POST['textBox']))
      {
        $survey=$survey."<input type='text' name='question".$qNum."'>";
      }
    ?>

  </body>
</html>