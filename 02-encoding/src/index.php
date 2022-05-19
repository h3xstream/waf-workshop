<?php
$title = "Register Form 1";

if(isset($_GET['viewsource'])) {
    echo highlight_file(__FILE__);
    exit();
}

function validateInput($input) {
    if(preg_match("/<[a-z]/", $input)) {
        die("XSS detected.");
    }
}

if (isset($_GET['fullname']) && $_GET['fullname'] !== "") {

    validateInput($_GET['fullname']);
    $out = $_GET['fullname'];
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
          <label for="fullname">Name</label> <input name="fullname" class="form-control" id="fullname"/>

        </div>

        <button type="submit" class="btn btn-primary">Register</button>
      </form>

      <?php if (isset($out)) {
          echo "Welcome ".$out; 
      } ?>


       <br/>
       <hr/>
       <br/>

<pre>
function validateInput($input) {
    if(preg_match("/<[a-z]/", $input)) {
        die("XSS detected.");
    }
}
</pre>
        <a href="?viewsource">View Full Source</a>


        <br/>
        <hr/>
        <br/>

        <a href="/form2.php">Next Form</a>


    </div>
  </body>
</html>