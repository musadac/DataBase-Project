<html lang="en">
<head>
  <title>FITME-USER</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
  <link rel="stylesheet" href="user.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <?php
       if (isset($_POST["B"])){
        $_SESSION["userid"] = "";
        header("Location: http://localhost/mainlanding.php", true, 301);
        exit();
       }
      session_start();
        $userid = $_SESSION["userid"];
        echo ' <li class="nav-item active"><a class="nav-link" href="#">Welcome '.$userid.'<span class="sr-only">(current)</span></a></li>';
      ?>
     
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="B">LOGOUT</button>
    </form>
   
  </div>
</nav>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="/progress.php">PROGRESS LOG</a>
  <a href="/reports.php">REPORTS</a>
  <a href="/createworkout.php">CREATE WORKOUT PLAN</a>
</div>

<?php
      $db_sid = 
      "(DESCRIPTION =
      (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
      (CONNECT_DATA =
        (SERVER = DEDICATED)
        (SERVICE_NAME = musadac)
      )
    )";           

      $db_user = "scott";   // Oracle username e.g "scott"
      $db_pass = "tiger";    // Password for user e.g "1234"
      $con = oci_connect($db_user,$db_pass,$db_sid); 
      $query = "SELECT * FROM EXERCISE, WORKOUT_PLAN";
      $query_id = oci_parse($con, $query); 		
      $r = oci_execute($query_id); 
      $x=0;
      while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
      { 
        $y = $x%12;
        $x = $x+1;
        echo '<div class="container">    
        <div class="row">
          <div class="col-sm-8">
            <div class="panel panel-primary">
              <div class="panel-heading">'.$row['TYPE'].' WORKOUT</div>
              <div class="panel-body"><img src="images/e'.$y.'.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
              <div class="panel-footer">Exercise Name:'.$row['EX_NAME'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
                  <button>ACTIVATE</button>
              </div>
            </div>
          </div>
        </div>
      </div>';
      }
      

    ?>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>

</html>
