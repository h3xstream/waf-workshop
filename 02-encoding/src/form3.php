<?php
$title = "Register Form 3";

if(isset($_GET['viewsource'])) {
    echo highlight_file(__FILE__);
    exit();
}

function validateInput($params) {

  foreach ($params as $input) {
    if(preg_match("/[<\"']/", $input)) {
      die("XSS detected.");
    }
  }
}

if (isset($_REQUEST['fullname']) && $_REQUEST['fullname'] !== "") {

    validateInput($_GET);
    $out = $_REQUEST['fullname'];
}
?>
<html lang="en">
  <head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <h3><?php echo $title; ?></h3>

      <form method="GET" action="">
        <div class="form-group">
          <label for="fullname">Name</label>
          <input name="fullname" class="form-control" id="fullname"/>

        </div>


        <button type="submit" class="btn btn-primary">Register</button>
      </form>

      <!-- Output -->

      <?php if (isset($out)) {
          echo "Welcome ".$out; 
      } ?>


      <br/>
      <hr/>
      <br/>

<pre>
function validateInput($params) {

  foreach ($params as $input) {
    if(preg_match("/[<\"']/", $input)) {
      die("XSS detected.");
    }
  }
}

if (isset($_REQUEST['fullname']) && $_REQUEST['fullname'] !== "") {

  validateInput($_GET);
  $out = $_REQUEST['fullname'];
}
</pre>
        <a href="?viewsource">View Full Source</a>


        <br/>
        <hr/>
        <br/>

        <a href="/form2.php">Previous Form</a>


    </div>

    <script type="text/javascript">
      if(document.profile.registered_name.value) {
        document.getElementById("welcome").innerHTML = "Welcome "+document.profile.registered_name.value;
      }
      
    </script>
  </body>
</html>