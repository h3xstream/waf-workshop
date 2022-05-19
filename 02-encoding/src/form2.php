<?php
$title = "Register Form 2";

if(isset($_GET['viewsource'])) {
    echo highlight_file(__FILE__);
    exit();
}

function validateInput($input) {
    if(preg_match("/[<\"']/", $input)) {
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

      <h3>Profile</h3>

      <form name="profile">
      <div class="form-group">
      <label for="registered_name">Registered Name</label>

      <?php if (isset($out)) {
          echo "<input class='form-control' type='text' name='registered_name' value='".$out."'>"; 
      } ?>
      </div>

      </form>


      <div id="welcome"></div>

       <br/>
       <hr/>
       <br/>

<pre>
function validateInput($input) {
    if(preg_match("/[<\"']/", $input)) {
        die("XSS detected.");
    }
}
</pre>
        <a href="?viewsource">View Full Source</a>


        <br/>
        <hr/>
        <br/>

        
        <a href="/">Previous Form</a> | <a href="/form3.php">Next Form</a>


    </div>

    <script type="text/javascript">
      if(document.profile.registered_name.value) {
        document.getElementById("welcome").innerHTML = "Welcome "+document.profile.registered_name.value;
      }
      
    </script>
  </body>
</html>